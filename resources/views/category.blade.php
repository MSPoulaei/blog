@extends("layouts.layout")

@section("title",$title ?? "Category")

@section("content")
    <x-posts :posts=$posts :title='$title ?? "Posts"'/>
@endsection
