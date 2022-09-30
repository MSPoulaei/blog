<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function posts(Category $category)
    {
        return view("category",["posts"=>$category->posts()->with("category")->paginate(),"title"=>$category->name]);
    }
}
