<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = ['formattedPrice'];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function getPrice()
    {
        return number_format($this->price / 100, 2, ',', '.') . ' €';
    }

    public function getFormattedPriceAttribute()
    {
        return $this->getPrice();
    }
}
