<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordered_products extends Model
{
    protected $table = 'ordered_products';

    protected $fillable = ['order_id', 'product_id', 'quantity', 'total'];

}
