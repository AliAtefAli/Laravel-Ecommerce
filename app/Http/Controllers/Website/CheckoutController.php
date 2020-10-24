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
//        $user = auth()->user();
//        $carts = Order::where('user_id', $user->id)->get();
//
//        $total = 0;
//        foreach ($carts as $cart){
//            dd($cart->products);
//            $total += $cart->products->first()->price;
//        }

//        return view('website.cart.index', compact('carts', 'total'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $user = auth()->user();
        $carts = Order::where('user_id', $user->id)->get();

        foreach ($carts as $cart) {
            $carts['quantity'] = $request[$cart->id . '_quantity'];
        }
        return view('website.cart.checkout', compact('carts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'billing_phone' => $request->phone,
                'billing_address' => $request->address,
                'product_id' => $cart->id,
            ]);

            $admin = User::where('role', 'admin')->first();
            $admin->notify(new NewOrderNotification($order));

            $this->make_event($order, $cart->total);

            $order->products()->attach($order->id, ['quantity' => $cart->qty, 'total' => $cart->total]);
            Cart::remove($cart->rowId);
        }

        return redirect()->route('product.index');
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
