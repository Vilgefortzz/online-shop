<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
