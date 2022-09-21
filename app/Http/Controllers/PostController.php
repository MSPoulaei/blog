<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view("posts",["posts"=>Post::with("category","author")->get(),
            "headerPosts"=>PostRepository::getHeader()
            ]);
    }
    public function post(Post $post)
    {
        return view("post",["post"=>$post/*->load(["category","author"])*/]);
    }

    public function search(string $q)
    {
//        return view("category",["posts"=>Post::query()-> get()])
    }
}
