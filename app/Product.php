<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function getPrice()
    {
        return number_format($this->price / 100, 2, ',', '.') . ' €';
    }
}
