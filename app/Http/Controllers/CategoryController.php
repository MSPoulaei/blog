<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function posts(Category $category)
    {
        return view("category",["posts"=>$category->posts()->with(["category","author"])->withCount("comments")->orderby('published_at','DESC')->paginate(),"title"=>$category->name]);
    }
}
