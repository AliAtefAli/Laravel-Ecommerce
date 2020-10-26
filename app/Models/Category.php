<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    use SoftDeletes;

    protected $table = 'category';
    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['image'];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
