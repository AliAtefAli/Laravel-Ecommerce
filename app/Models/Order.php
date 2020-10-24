<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['user_id', 'billing_phone', 'billing_address', 'payment_method', 'payment_status', 'product_id', 'order_status'];

//    public function products()
//    {
//        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id');
//    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

}
