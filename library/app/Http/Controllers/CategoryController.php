<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all() {
        $categories = Category::all();
        return view("Categories.all", compact("categories"));
    }

    public function show($id) {
        $category = Category::findOrFail($id);
        return view("Categories.show", compact("category"));
    }

    public function create() {
        return view("Categories.create");
    }

    public function store(Request $request) {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string"
        ]);

        category::create($data);

        $categories = Category::all();
        return view("Categories.all", ["categories" => $categories]);
    }
}
