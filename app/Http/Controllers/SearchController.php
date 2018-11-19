<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('q');
        $products = Product::with('brand')->where('name', 'like', "%{$query}%")->limit(15)->get();
        $products = $products->map(function($product) {
            $product->link = route('add-to-cart', $product);
            return $product;
        });

        return response()->json([
            'auth' => Auth::check(),
            'result' => $products
        ]);
    }
}
