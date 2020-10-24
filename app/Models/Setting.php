<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Translatable;
    public $translatedAttributes = ['name', 'description'];

    protected $fillable = ['logo', 'icon',/* 'slider',*/ 'default_language'];
}
