<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view("posts",["posts"=>Post::with("category","author")->paginate(),
            "headerPosts"=>PostRepository::getHeader()
            ]);
    }
    public function post(Post $post)
    {
        $post->view+=1;
        $post->update();
        return view("post",["post"=>$post/*->load(["category","author"])*/]);
    }

    public function search(Request $request)
    {
        $q=$request->input("q");
        return view("category",["posts"=>PostRepository::search($q),"title"=>"Search:$q"]);
    }
}
