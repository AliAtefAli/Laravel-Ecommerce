<?php

namespace App\Http\Controllers\website;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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

    public function update(Request $request, $row)
    {

        $product = Product::find($request->productId);


        if ($product->quantity < $request->quantity) {
            return response()->json(['error' => 'Sorry! this is quantity not available']);
        }

        Cart::update($row, ['qty' => $request->quantity]);

        return response()->json(['success' => 'Quantity was updated successfully!']);
    }

    public function destroy($row)
    {
        if (!Cart::remove($row)) {
            return response()->json(['success' => 'Item was removed successfully!']);
        }
        return response()->json(['error' => 'Sorry! There are an error']);





        return back();
    }
}
