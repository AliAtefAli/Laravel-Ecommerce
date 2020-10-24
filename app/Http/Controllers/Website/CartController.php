<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::content();

        return view('website.cart.index', compact('carts'));
    }

    public function add(Product $product)
    {
        $cart = Cart::add($product->id, $product->name, 1, $product->price, 0, [], 10);

        Cart::associate($cart->rowId, 'App\Models\Product');


        return back();
    }

    public function destroy($row)
    {
        Cart::remove($row);

        return back();
    }
}
