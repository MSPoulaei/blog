@props(["posts","title"])
<div class="row">
    <div class="col-12">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">{{$title ?? "Latest News"}}</h4>
            @if(!isset($title))
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            @endif
        </div>
    </div>
    @if($posts->count())
        <x-post-card-special :post=$posts[0] />

        @if($posts->count()>1)
            <x-post-card :post=$posts[1] />
        @endif

        @if($posts->count()>2)
            <x-post-card :post=$posts[2] />
        @endif

        @foreach($posts->skip(3) as $post)
            <div class="col-lg-6">
                <x-post-card-small :post="$post" />
            </div>
        @endforeach
    <div class="col-lg-12 mt-4">
        <div class="d-flex justify-content-center">
            {{$posts->appends(request()->except('page'))->links()}}
        </div>
    </div>
    @endif
</div>
