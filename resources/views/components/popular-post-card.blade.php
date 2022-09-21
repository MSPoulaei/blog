@props(["post"])
<div class="mb-3">
    <div class="mb-2">
        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="{{$post->category->slug}}">{{$post->category->name}}</a>
        <a class="text-body" href=""><small>{{$post->published_at->format("M d, Y")}}</small></a>
    </div>
    <a class="small text-body text-uppercase font-weight-medium" href="/posts/{{$post->title}}">{{$post->title}}</a>
</div>
