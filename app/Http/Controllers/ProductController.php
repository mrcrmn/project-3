<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        Auth::user()->cart()->save($product);

        return [
            'newTotal' => Auth::user()->getCartTotal(),
            'newItemsCount' => Auth::user()->getNumberOfItems()
        ];
    }
}
