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

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function getCartTotal()
    {
        $total = $this->cart->sum('price');

        return number_format($total / 100, 2, ',', '.') . ' €';
    }

    public function getNumberOfItems()
    {
        $count = $this->cart->count();
        return $count  . ' Item' . ($count !== 1 ? 's' : '');
    }

    public function getCart()
    {
        $cart = [];

        foreach ($this->cart as $item) {
            if (array_key_exists($item->id, $cart)) {
                $cart[$item->id]['quantity'] += 1;
            } else {
                $cart[$item->id] = $item;
                $cart[$item->id]['quantity'] = 1;
            }
        }

        return $cart;
    }
}
