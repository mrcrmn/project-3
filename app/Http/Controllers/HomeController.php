<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brand')->paginate(24);

        return view('home', [
            'products' => $products
        ]);
    }

    public function checkout()
    {
        $items = Auth::user()->cart;

        $cart = [];

        foreach ($items as $item) {
            if (array_key_exists($item->id, $cart)) {
                $cart[$item->id]['quantity'] += 1;
            } else {
                $cart[$item->id] = $item;
                $cart[$item->id]['quantity'] = 1;
            }
        }
        
        return view('checkout', [
            'cart' => $cart
        ]);
    }
}
