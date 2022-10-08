@props([
"post",
])
<div class="col-lg-6">
    <div class="position-relative mb-3">
        <a href="/posts/{{$post->slug}}"><img class="img-fluid w-100" src="{{$post->thumbnail ? asset("storage/" . $post->thumbnail) : '/img/news-700x435-1.jpg'}}" style="object-fit: cover;"></a>
        <div class="bg-white border border-top-0 p-4">
            <div class="mb-2">
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                   href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                <a class="text-body" ><small>{{$post->published_at->diffForHumans()}}</small></a>
{{--                Jan 01, 2045--}}
            </div>
            <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="/posts/{{$post->slug}}">{{$post->title}}</a>
            <p class="m-0">{{$post->description}}</p>
        </div>
        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
            <div class="d-flex align-items-center">
                <a href="/authors/{{$post->author->username}}">
                    <img class="rounded-circle mr-2" src="/img/user.jpg" width="25" height="25" alt="">
                    <small>{{$post->author->name}}</small>
                </a>
            </div>
            <div class="d-flex align-items-center">
                <small class="ml-3"><i class="far fa-eye mr-2"></i>{{$post->view}}</small>
                <small class="ml-3"><i class="far fa-comment mr-2"></i>{{$post->comments_count}}</small>
            </div>
        </div>
    </div>
</div>


