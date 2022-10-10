<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function posts(Category $category)
    {
        return view("category",["posts"=>$category->posts()->with(["category","author"])->withCount("comments")->orderby('published_at','DESC')->paginate(),"title"=>$category->name]);
    }




    //admin
    public function show()
    {
        return view("panel.categories.index", ["categories" => Category::query()->orderBy("updated_at", "DESC")->paginate()]);
    }

    public function create()
    {
        return view("panel.categories.create");
    }

    public function edit(Category $category)
    {
        return view("panel.categories.edit", ["category" => $category]);
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->back()->with("success", "The category $category->name deleted successfully!");
    }

    public function store()
    {
        $attributes = request()->validate([
            "name" => "required|min:3|max:255",
            "slug" => "required|min:3|max:255|unique:categories,slug",
        ]);

        $category = Category::create($attributes);
        return redirect("/panel/categories")->with("success", "Category $category->name created successfully!");
    }

    public function update($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $attributes = request()->validate([
            "name" => "required|min:3|max:255",
            "slug" => ["required","min:3","max:255",Rule::unique("categories","slug")->ignore($category->id)],
        ]);
        $category->update($attributes);

        return redirect("/panel/categories")->with("success", "Category $category->name updated successfully!");
    }
}
