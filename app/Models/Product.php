<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use Translatable;
    protected $table = 'Products';
    public $translatedAttributes = ['name', 'description'];

    protected $fillable = ['category_id', 'coupon_id', 'production_date', 'expiration_date', 'price', 'quantity'];

    public function orders()
    {
        return $this->belongsToMany('App/Models/Order');
    }

    public function Cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }

    public function coupon()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImages');
    }

}
