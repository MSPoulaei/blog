<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\PostRepository;
use Carbon\Carbon;
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
        return view("post",["post"=>$post->load(["category","author","comments"])]);
    }

    public function search(Request $request)
    {
        $q=$request->input("q");
        return view("category",["posts"=>PostRepository::search($q),"title"=>"Search:$q"]);
    }



    //admin
    public function show()
    {
        return view("panel.posts.index",["posts"=>Post::with("category","author")->paginate()]);
    }
    public function create()
    {
        return view("panel.posts.create",["categories"=>Category::all()]);
    }

    public function store()
    {
        $attributes= request()->validate([
            "title"=>"required|min:3|max:255",
            "slug"=>"required|min:3|max:255|unique:posts,slug",
            "description"=>"max:255",
            "body"=>"required|min:3",
            "category_id"=>"required|exists:categories,id",
        ]);
        $attributes["user_id"]=auth()->user()->id;
        $attributes["published_at"]=Carbon::now();

        $post=Post::create($attributes);
        return redirect("/panel/posts")->with("success","Post $post->id created successfully!");
    }
}
