<?php

namespace App\Http\Controllers\Website;

use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Order;
use App\Models\Ordered_products;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('website.cart.checkout');

    }

    public function store(StoreCheckoutRequest $request)
    {
        if (!isset(auth()->user()->address)) {
            $user = User::find(auth()->user()->id);
            $user->address = $request->address;
            $user->save();
        }
        if (!isset(auth()->user()->phone)) {
            $user = User::find(auth()->user()->id);
            $user->phone = $request->phone;
            $user->save();
        }

        foreach (Cart::content() as $cart) {
            if ($cart->qty > Product::find($cart->id)->quantity) {
                return back()->with('error', 'Please check the Quantity');
            } else {
                continue;
            }
        }

        foreach (Cart::content() as $cart) {
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'billing_phone' => $request->phone,
                'billing_address' => $request->address,
                'billing_total' => $cart->total,
                'product_id' => $cart->id,
            ]);
            $product = Product::find($cart->id);
            $product->quantity -= $cart->qty;
            $product->save();

            $admin = User::where('role', 'admin')->first();
            $admin->notify(new NewOrderNotification($order));

            $this->make_event($order, $cart->total);

            $order->products()->attach($order->id, ['quantity' => $cart->qty, 'total' => $cart->total]);
            Cart::remove($cart->rowId);
        }

        return view('website.cart.order-success');
    }

    protected function make_event($order, $total)
    {
        $data = [
            'order' => $order,
            'total' => $total
        ];
        event(new NotificationEvent($data));
    }

}
