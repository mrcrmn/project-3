<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cart()
    {
        return $this->belongsToMany('App\Product', 'cart');
    }

    public function getCartTotal()
    {
        $total = $this->cart->sum('price');

        return number_format($total / 100, 2, ',', '.') . ' €';
    }

    public function getNumberOfItems()
    {
        return $this->cart->count() . ' Items';
    }
}
