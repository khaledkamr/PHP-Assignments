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

    public function addToWishlist(Request $request, $id) {
        $product = Product::findOrFail($id);
        $wishlist = session()->get('wishlist');

        if(!$wishlist) {
            $wishlist = [
                $id => [
                    "name" => $product->name,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Product added to wishlist successfully!');
        } 
        else {
            if(isset($wishlist[$id])) {
                return redirect()->back()->with('error', 'Product already in wishlist!');
            }
            $wishlist[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image
            ];
            session()->put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Product added to wishlist successfully!');
        }
    }

    public function wishlist() {
        $wishlist = session()->get('wishlist');
        return view('user.products.wishlist', compact('wishlist'));
    }
}
