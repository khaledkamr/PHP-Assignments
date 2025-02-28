<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    public function all() {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function show($id) {
        $product = Product::find($id);
        if($product !== null) {
            return new ProductResource($product);
        }
        else {
            return response()->json([
                "msg" => "data not found"
            ], 404);
        }
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'quantity' => 'required|numeric'
        ]);

        if($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ], 301);
        }

        $image = Storage::putFile("products", $request->image);
        Product::create([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => $image
        ]);

        return response()->json([
            "msg" => "product created successfully!"
        ], 201);
    }

    public function update($id, Request $request) {
        $product = Product::find($id);
        if($product == null) {
            return response()->json([
                "msg" => "data not found"
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpg,png,jpeg',
            'quantity' => 'required|numeric'
        ]);

        if($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ], 301);
        }

        $image = $product->image;

        if($request->hasFile('image')) {
            Storage::delete($product->image);
            $image = Storage::putFile("products", $request->image);
        }

        $product->update([
            "name" => $request->name,
            "desc" => $request->desc,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "image" => $image
        ]);

        return response()->json([
            "msg" => "product updated successfully!",
            "product" => new ProductResource(($product))
        ], 201);
    }

    public function delete($id) {
        $product = Product::find($id);
        if($product == null) {
            return response()->json([
                "msg" => "data not found"
            ], 404);
        }

        if($product->image !== null) {
            Storage::delete($product->image);
        }

        $product->delete();

        return response()->json([
            "msg" => "product deleted successfully!"
        ], 201);
    }
}
