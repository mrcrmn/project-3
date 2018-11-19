<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Mail\OrderSuccessMail;
use Illuminate\Support\Facades\Mail;

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
        return view('checkout', [
            'cart' => Auth::user()->getCart()
        ]);
    }

    public function createOrder(Request $request)
    {
        $order = Auth::user()->orders()->save(Order::make($request->all()));

        $mail = new OrderSuccessMail($order);

        Mail::to($request->email)->send($mail);

        return redirect()->route('home');
    }
}
