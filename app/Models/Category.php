<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Category extends Model implements TranslatableContract
{
    protected $table = 'category';
    use Translatable;
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['image'];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
