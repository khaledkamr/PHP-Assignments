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

    public function addToWishlist($id) {
        $product = Product::findOrFail($id);
        $wishlist = session()->get('wishlist', []);
        
        if(!isset($wishlist[$id])) {
            $wishlist[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image
            ];
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Product added to wishlist successfully!');
        }
        return redirect()->back()->with('error', 'Product already in wishlist!');
    }

    public function removeFromWishlist($id) {
        $wishlist = session()->get('wishlist', []);
        if(isset($wishlist[$id])) {
            unset($wishlist[$id]);
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Product removed from wishlist successfully!');
        }
        return redirect()->back()->with('error', 'Product not found in wishlist!');
    }

    public function clearWishlist() {
        session()->forget('wishlist');
        return redirect()->back()->with('success', 'Wishlist cleared successfully!');
    }

    public function wishlist() {
        $wishlist = session()->get('wishlist', []);
        return view('user.products.wishlist', compact('wishlist'));
    }
}
