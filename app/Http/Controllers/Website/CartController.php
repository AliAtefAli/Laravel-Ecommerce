<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $carts = Cart::where('user_id', $user->id)->get();

        $total = 0;
        foreach ($carts as $cart){

            $total += $cart->product->price;
        }

        return view('website.cart.index', compact('carts', 'total'));
    }

    public function add(Product $product)
    {
        $user = auth()->user();
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'quantity' => 1
        ]);

        return back();
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return back();
    }
}
