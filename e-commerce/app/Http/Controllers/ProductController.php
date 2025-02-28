<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function all() {
        $products = Product::paginate(9);
        return view('admin.home', compact('products'));
    }

    public function create() {
        return view('admin.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'quantity' => 'required|numeric'
        ]);

        $data['image'] = Storage::putFile('products', $request->image);
        Product::create($data);
        session()->flash('success', 'product inserted successfully!');
        return view('admin.create');
    }

    Public function delete($id) {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        session()->flash("success", "product deleted successfully!");
        return redirect(route('allProducts'));
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    public function update($id, Request $request) {
        $product = Product::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpg,png,jpeg',
            'quantity' => 'required|numeric'
        ]);

        if($request->hasFile('image')) {
            Storage::delete($product->image);
            $data['image'] = Storage::putFile('products', $request->image);
        }
        $product->update($data);
        session()->flash('success', 'product updated successfully!');
        return redirect(route('allProducts'));
    }
}
