<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable = ['title', 'code', 'amount', 'status', 'start_date', 'end_date', 'product_id', 'discount_type',
        'min_spent', 'max_spent'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
}
