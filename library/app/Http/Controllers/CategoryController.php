<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            "desc" => "required|string",
            "image" => "required|image|mimes:png,jpg,jpeg,gif"
        ]);
        $data["image"] = Storage::putFile("categories", $request->image);
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
            "desc" => "required|string",
            "image" => "image|mimes:png,jpeg,jpg,gif"
        ]);
        $category = Category::findOrFail($id);
        if($request->has("image")) {
            Storage::delete($category->image);
            $data["image"] = Storage::putFile("categories", $request->image);
        }
        else {
            $data["image"] = $category->image;
        }
        $category->update($data);
        session()->flash("success", "data updated successfully");
        return redirect(route("showCategory", $id));
    }

    public function delete($id) {
        $category = Category::findOrFail($id);
        Storage::delete($category->image);
        $category->delete();
        session()->flash("success", "data deleted successfully");
        return redirect(route("allCategories"));
    }
}
