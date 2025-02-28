<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

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
}
