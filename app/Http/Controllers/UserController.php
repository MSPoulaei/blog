<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function authorPosts(User $author)
    {
        return view("category",["posts"=>$author->posts->load(["author","category"]),"title"=>$author->name]);
    }
}
