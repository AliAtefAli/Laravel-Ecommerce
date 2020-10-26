<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = ['user_id', 'billing_phone', 'billing_address', 'billing_total', 'payment_method', 'payment_status', 'product_id', 'order_status'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

}
