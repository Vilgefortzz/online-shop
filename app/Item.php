<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }
}
