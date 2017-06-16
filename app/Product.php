<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function images()
    {
        return $this->belongsToMany('App\Image', 'products_images');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
}
