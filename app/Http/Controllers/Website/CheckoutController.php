<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Notifications\NewOrderNotification;
use App\Http\Requests\StoreCheckoutRequest;

class CheckoutController extends Controller
{

    public function index()
    {
        return view('website.cart.checkout');
    }

    public function store(StoreCheckoutRequest $request)
    {
        User::updateUser($request);

        Product::checkProductQuantity();

        $order = Order::insertOrderDetails($request);

        Order::notifyNewOrder($order);

        Cart::destroy();

        return view('website.cart.order-success');
    }
}
