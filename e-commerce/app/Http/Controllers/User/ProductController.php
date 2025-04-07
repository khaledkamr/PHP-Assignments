<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Container\Attributes\Auth;
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
                    "price" => $product->price * $qty,
                    "image" => $product->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else {
            if(isset($cart[$id])) {
                $cart[$id]['qty'] += $qty;
                $cart[$id]['price'] = $product->price * $cart[$id]['qty'];
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
            $cart[$id] = [
                "name" => $product->name,
                "qty" => $qty,
                "price" => $product->price * $qty,
                "image" => $product->image
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
         
        }
    }

    public function showCart() {
        $cart = session()->get('cart');
        return view('user.products.cart', compact('cart'));
    }

    public function updateCart(Request $request, $id) {
        $cart = session()->get('cart');
        $product = Product::findOrFail($id);
        
        if(isset($cart[$id])) {
            $cart[$id]['qty'] = $request->qty;
            $cart[$id]['price'] = $product->price * $request->qty;
            
            if($cart[$id]['qty'] <= 0) {
                unset($cart[$id]);
            }
            
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated successfully!');
        }
        return redirect()->back()->with('error', 'Product not found in cart!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
        return redirect()->back()->with('error', 'Product not found in cart!');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }

    public function makeOrder(Request $request) {
        $cart = session()->get('cart');
        $user_id = auth()->user()->id;
        $order = Order::create([
            'user_id' => $user_id,
            'requiredDate' => $request->requiredDate
        ]);

        foreach($cart as $id => $product) {
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $product['qty'],
                'price' => $product['price']
            ]);
        }

        session()->forget('cart');
        return redirect()->back()->with('success', 'Order created successfully!');
    }

}
