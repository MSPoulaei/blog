@props(["posts"])

<!-- Featured News Slider Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            @foreach($posts->take(5) as $post)
            <div class="position-relative overflow-hidden" style="height: 300px;">
                <a href="/posts/{{$post->slug}}"><img class="img-fluid h-100" src="{{$post->thumbnail ? asset("storage/" . $post->thumbnail) : '/img/news-700x435-1.jpg'}}" style="object-fit: cover;"></a>
                <div class="overlay">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                           href="/categories/{{$post->category->slug}}">{{ucwords($post->category->name)}}</a>
                        <a class="text-white"><small>{{$post->published_at->format("M d, Y")}}</small></a>
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="/posts/{{$post->slug}}">{{mb_strimwidth($post->title,0,20,'...')}}</a>
                </div>
            </div>
            @endforeach
{{--            <div class="position-relative overflow-hidden" style="height: 300px;">--}}
{{--                <img class="img-fluid h-100" src="/img/news-700x435-2.jpg" style="object-fit: cover;">--}}
{{--                <div class="overlay">--}}
{{--                    <div class="mb-2">--}}
{{--                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"--}}
{{--                           href="">Business</a>--}}
{{--                        <a class="text-white" href=""><small>Jan 01, 2045</small></a>--}}
{{--                    </div>--}}
{{--                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit...</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="position-relative overflow-hidden" style="height: 300px;">--}}
{{--                <img class="img-fluid h-100" src="/img/news-700x435-3.jpg" style="object-fit: cover;">--}}
{{--                <div class="overlay">--}}
{{--                    <div class="mb-2">--}}
{{--                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"--}}
{{--                           href="">Business</a>--}}
{{--                        <a class="text-white" href=""><small>Jan 01, 2045</small></a>--}}
{{--                    </div>--}}
{{--                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit...</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="position-relative overflow-hidden" style="height: 300px;">--}}
{{--                <img class="img-fluid h-100" src="/img/news-700x435-4.jpg" style="object-fit: cover;">--}}
{{--                <div class="overlay">--}}
{{--                    <div class="mb-2">--}}
{{--                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"--}}
{{--                           href="">Business</a>--}}
{{--                        <a class="text-white" href=""><small>Jan 01, 2045</small></a>--}}
{{--                    </div>--}}
{{--                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit...</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="position-relative overflow-hidden" style="height: 300px;">--}}
{{--                <img class="img-fluid h-100" src="/img/news-700x435-5.jpg" style="object-fit: cover;">--}}
{{--                <div class="overlay">--}}
{{--                    <div class="mb-2">--}}
{{--                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"--}}
{{--                           href="">Business</a>--}}
{{--                        <a class="text-white" href=""><small>Jan 01, 2045</small></a>--}}
{{--                    </div>--}}
{{--                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">Lorem ipsum dolor sit amet elit...</a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<!-- Featured News Slider End -->
