<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\PostRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view("posts", ["posts" => Post::with("category", "author")->orderby('published_at', 'DESC')->paginate(),
            "headerPosts" => PostRepository::getHeader()
        ]);
    }

    public function post(Post $post)
    {
        $post->view += 1;
        $post->update();
        return view("post", ["post" => $post->load(["category", "author", "comments"])]);
    }

    public function search(Request $request)
    {
        $q = $request->input("q");
        return view("category", ["posts" => PostRepository::search($q), "title" => "Search:$q"]);
    }


    //admin
    public function show()
    {
        return view("panel.posts.index", ["posts" => Post::withTrashed()->with("category", "author")->orderBy("published_at", "DESC")->paginate()]);
    }

    public function create()
    {
        return view("panel.posts.create", ["categories" => Category::all()]);
    }

    public function edit(Post $post)
    {
        return view("panel.posts.edit", ["post" => $post, "categories" => Category::all()]);
    }

    public function restore($slug)
    {
        Post::withTrashed()->where("slug", $slug)->first()->restore();
        $title = Post::where('slug', $slug)->first()->title;
        return redirect()->back()->with("success", "The post $title restored successfully!");
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->back()->with("success", "The post $post->title deleted successfully!");
    }

    public function store()
    {
        $attributes = request()->validate([
            "title" => "required|min:3|max:255",
            "slug" => "required|min:3|max:255|unique:posts,slug",
            "thumbnail"=>isset($attributes["thumbnail"])? "image":"",
            "description" => "max:255",
            "body" => "required|min:3",
            "category_id" => "required|exists:categories,id",
        ]);
        if(isset($attributes["thumbnail"])){
            $attributes["thumbnail"]=request()->file("thumbnail")->store("thumbnails");
        }
        $attributes["user_id"] = auth()->user()->id;
        $attributes["published_at"] = Carbon::now();

        $post = Post::create($attributes);
        return redirect("/panel/posts")->with("success", "Post $post->title created successfully!");
    }

    public function update($slug)
    {
        $post = Post::withTrashed()->where("slug", $slug)->first();
        $attributes = request()->validate([
            "title" => "required|min:3|max:255",
            "slug" => ["required","min:3","max:255",Rule::unique("posts","slug")->ignore($post->id)],
            "thumbnail"=>isset($attributes["thumbnail"])? "image":"",
            "description" => "max:255",
            "body" => "required|min:3",
            "category_id" => "required|exists:categories,id",
        ]);
        if(isset($attributes["thumbnail"])){
            $attributes["thumbnail"]=request()->file("thumbnail")->store("thumbnails");
        }
        $post->update($attributes);

        return redirect("/panel/posts")->with("success", "Post $post->title updated successfully!");
    }
}
