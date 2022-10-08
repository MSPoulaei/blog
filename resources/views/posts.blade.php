<?php
/** @var \App\Models\Post[] $posts */
?>
@extends("layouts.layout")

@section("title", $title ?? "Posts")

@section("top-header")
    <x-main-news-slider :posts=$headerPosts />

    <x-breaking-news :posts=$headerPosts />

    <x-featured-news :posts=$headerPosts />
@endsection

@section("content")
    <x-posts :posts=$posts :title='$title ?? "Posts"'/>
{{--    <div style="margin: 0 auto; display: flex; flex-direction: column;gap: 2rem">--}}
{{--        @foreach($posts as $post)--}}
{{--            <article>--}}
{{--                <h1>{{$post->title}}</h1>--}}
{{--                <div><span>By </span><a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a></div>--}}
{{--                <div><span>in </span><a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></div>--}}
{{--                <div>{{$post->published_at->diffForHumans()}}</div>--}}
{{--                <p>{{$post->description}}...</p>--}}
{{--                <a href="/posts/{{$post->slug}}">Read More</a>--}}
{{--            </article>--}}
{{--        @endforeach--}}
{{--    </div>--}}

@endsection
