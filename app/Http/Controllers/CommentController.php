<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        $attributes=request()->validate([
            "body"=>"required|min:3|max:255",
            "parent_id"=>"",
        ]);
        $attributes["post_id"]=$post->id;
        $attributes["user_id"]=auth()->user()->id;

        Comment::create($attributes);

        return redirect()->back()->with("success","Your comment successfully posted!");
    }
}
