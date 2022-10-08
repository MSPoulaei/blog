@props(["post"])
<div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
    <a href="/posts/{{$post->slug}}"><img class="img-fluid" src="{{$post->thumbnail ? asset("storage/" . $post->thumbnail) : '/img/news-110x110-1.jpg'}}" alt=""></a>
    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
        <div class="mb-2">
            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            <a class="text-body" ><small>{{$post->published_at->diffForHumans()}}</small></a>
        </div>
{{--        Jan 01, 2045--}}
        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="/posts/{{$post->slug}}">{{$post->title}}</a>
    </div>
</div>
