<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Category extends Model implements TranslatableContract
{
    use Translatable, SoftDeletes;

    protected $table = 'category';
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['image'];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
