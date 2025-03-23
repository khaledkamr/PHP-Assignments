<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function all() {
        $products = Product::all(); 
        return view('user.home', compact('products'));
    }
}
