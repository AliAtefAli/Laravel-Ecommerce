<?php

namespace App\Models;

use App\Events\NotificationEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Notifications\NewOrderNotification;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'billing_phone', 'billing_address', 'billing_total', 'payment_method', 'payment_status',
        'product_id', 'order_status',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public static function insertOrderDetails($request)
    {
        DB::beginTransaction();
        try {
            //create order
            $order = Order::create([
                'user_id'         => auth()->user()->id,
                'billing_phone'   => $request->phone,
                'billing_address' => $request->address,
                'billing_total'   => Cart::total(),
            ]);

            //insert order products
            foreach (Cart::content() as $cart) {
                OrderProduct::create([
                    'order_id'   => $order->id,
                    'product_id' => $cart->model->id,
                    'quantity'   => $cart->qty,
                ]);

                //decrease product quantity
                $product = Product::findOrfail($cart->model->id);
                $product->quantity -= $cart->qty;
                $product->save();

//            $order->products()->attach($order->id, ['quantity' => $cart->qty, 'total' => $cart->total]);
            }
            DB::commit();

            return $order;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public static function notifyNewOrder($order)
    {
        $admin = User::where('role', 'admin')->first();
        $admin->notify(new NewOrderNotification($order));

        Order::makeEvent($order, Cart::total());
    }

    public static function makeEvent($order, $total)
    {
        $data = [
            'order' => $order,
            'total' => $total,
        ];
        event(new NotificationEvent($data));
    }
}
