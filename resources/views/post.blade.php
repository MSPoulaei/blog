<?php
/** @var \App\Models\Post $post */
?>
@extends("layouts.layout")

@section("title",$post->title)

@section("top-header")
    <x-tranding-news/>
@endsection

@section("content")

    <!-- News Detail Start -->
    <div class="position-relative mb-3">
        <img class="img-fluid w-100" src="/img/news-700x435-1.jpg" style="object-fit: cover;">
        <div class="bg-white border border-top-0 p-4">
            <div class="mb-3">
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                   href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                <a class="text-body">{{$post->published_at->diffForHumans()}}</a>
            </div>
            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold">{{$post->title}}</h1>
            <p>{{$post->body}}</p>
        </div>
        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
            <a href="/authors/{{$post->author->username}}">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle mr-2" src="/img/user.jpg" width="25" height="25" alt="">
                    <span>{{$post->author->name}}</span>
                </div>
            </a>
            <div class="d-flex align-items-center">
                <span class="ml-3"><i class="far fa-eye mr-2"></i>{{$post->view}}</span>
                <span class="ml-3"><i class="far fa-comment mr-2"></i>123</span>
            </div>
        </div>
    </div>
    <!-- News Detail End -->

    <!-- Comment List Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">3 Comments</h4>
        </div>
        <div class="bg-white border border-top-0 p-4">
            @foreach($post->comments->where('parent_id','NULL')->load("author","subComments") as $comment)
                <x-comment :comment=$comment :isSub=false/>
            @endforeach
        </div>
    </div>
    <!-- Comment List End -->


    <!-- Comment Form Start -->
    <div class="mb-3" id="commentSection">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
        </div>
        <div class="bg-white border border-top-0 p-4" >
            @auth
                <form method="post" action="/posts/{{$post->slug}}/comments/">
                    @csrf
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="body" cols="30" rows="5" class="form-control"></textarea>
                        <input type="hidden" name="parent_id" id="parentIdInput">
                    </div>
                    @error("body")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group mb-0">
                        <input type="submit" value="Leave a comment"
                               class="btn btn-primary font-weight-semi-bold py-2 px-3">
                    </div>
                </form>
            @else
                <p>Please <a href="/login">Login</a> to post a comment.</p>
            @endauth
        </div>
    </div>
    <!-- Comment Form End -->


    {{--        <div style="margin: 0 auto;display: flex;flex-direction: column;padding: 0 2rem">--}}
    {{--            <h1>{{$post->title}}</h1>--}}
    {{--            <div><span>By </span><a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a></div>--}}
    {{--            <div><span>in </span><a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></div>--}}
    {{--            <div>{{$post->published_at->diffForHumans()}}</div>--}}

    {{--            <a style="color: blue" href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>--}}
    {{--            <p>{{$post->body}}</p>--}}
    {{--            <a style="color: blue" href="/posts/">Go Back</a>--}}
    {{--        </div>--}}

@endsection

@auth
    @section("script")
        <script>
            var parentIdInput= document.getElementById("parentIdInput");
            var messageTextarea= document.getElementById("message");
            var commentSection= document.getElementById("commentSection");
            function clickReply(id,name) {
                parentIdInput.value=id;
                messageTextarea.placeholder="Replying to "+name;
                commentSection.scrollIntoView({
                    behavior:"smooth"
                });
            }
        </script>
    @endsection
@endauth
