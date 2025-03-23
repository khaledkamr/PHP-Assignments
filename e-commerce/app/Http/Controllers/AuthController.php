<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirect() {
        if(Auth::user()->role == 'admin') {
            $products = Product::paginate(9);
            return view('admin.home', compact('products'));
        }
        else {
            $products = Product::all();
            $cart = session()->get('cart');
            return view('user.home', compact('products', 'cart'));
        }
    }
}
