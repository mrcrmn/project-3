<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'address', 'zip', 'city', 'country'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
