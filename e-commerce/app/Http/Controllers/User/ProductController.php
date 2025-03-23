<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all()
    {
        $products = Product::all();
        return view('user.home', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.products.show', compact('product'));
    }

    public function addToCart($id, Request $request) {
        $qty = $request->qty; 
        $product = Product::findOrFail($id);
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [
                $id => [
                    "name" => $product->name,
                    "qty" => $qty,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else {
            if(isset($cart[$id])) {
                $cart[$id]['qty'] += $qty;
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
            $cart[$id] = [
                "name" => $product->name,
                "qty" => $qty,
                "price" => $product->price,
                "image" => $product->image
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
         
        }
    }

    public function showCart() {
        $cart = session()->get('cart');
        // dd($cart);
        return view('user.products.cart', compact('cart'));
    }
}
