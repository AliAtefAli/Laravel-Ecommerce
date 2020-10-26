<?php

namespace App\Http\Controllers\website;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::content();

        return view('website.cart.index', compact('carts'));
    }

    public function add(Product $product)
    {
        Cart::add($product->id, $product->name, 1, $product->price)
            ->associate('App\Models\Product');

        return response()->json(['success' => trans('home.Item was added to your cart!'), 'quantity' => Cart::count()]);
    }

    public function destroy($row)
    {
        Cart::remove($row);

        return back();
    }
}
