<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Models\Order;
use App\Models\Ordered_products;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $user = auth()->user();
        $carts = Order::where('user_id', $user->id)->get();

        $total = 0;
        foreach ($carts as $cart){
            dd($cart->products);
            $total += $cart->products->first()->price;
        }

        return view('website.cart.index', compact('carts', 'total'));

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

        foreach ($carts as $cart){
            $carts['quantity'] = $request[$cart->id . '_quantity'];
        }
        return view('website.cart.checkout', compact('carts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
//        $user = auth()->user();
//        $orders = Order::where('user_id', $user->id)->get();
//        return view('website.cart.checkout', compact('orders'));

        $user = auth()->user();
        $carts = Order::where('user_id', $user->id)->get();

        $total = 0;
        foreach ($carts as $cart){
             $total += $cart->products->first()->price * $request[$cart->id . '_quantity'];

            Ordered_products::create([
                'order_id' => $cart->id,
                'product_id' => $cart->products->first()->id,
                'quantity' => $quantity =  $request[$cart->id . '_quantity'],
                'total' => $cart->products->first()->price * $quantity
            ]);
        }

         return view();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
