<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function delivery()
    {
        return $this->belongsTo('App\Delivery');
    }

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }
}
