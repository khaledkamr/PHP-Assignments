<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all() {
        $products = Product::paginate(9);
        return view('admin.home', compact('products'));
    }
}
