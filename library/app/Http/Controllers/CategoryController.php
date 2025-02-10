<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all() {
        $categories = Category::paginate(4);
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
        session()->flash("success", "data inserted successfully");
        return redirect((route("allCategories")));
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view("Categories.edit")->with("category", $category);
    }

    public function update($id, Request $request) {
        $data = $request->validate([
            "name" => "required|string|max:200",
            "desc" => "required|string"
        ]);
        $category = Category::findOrFail($id);
        $category->update($data);
        session()->flash("success", "data updated successfully");
        return redirect(route("showCategory", $id));
    }

    public function delete($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash("success", "data deleted successfully");
        return redirect(route("allCategories"));
    }
}
