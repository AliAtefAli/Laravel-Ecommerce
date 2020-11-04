<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Product extends Model implements TranslatableContract
{
    use Translatable, SoftDeletes;

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
        return $this->hasOne('App\Models\Coupon');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public static function checkProductQuantity()
    {
        foreach (Cart::content() as $cart) {
            if ($cart->qty > Product::find($cart->id)->quantity) {
                return back()->with('error', 'Please check the Quantity');
            } else {
                continue;
            }
        }
    }

}
