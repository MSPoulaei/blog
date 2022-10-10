<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$title ?? "Biz News"}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/style.css" rel="stylesheet">
    <style>
        /* The alert message box */
        .alert {
            position: fixed;
            right: 1rem;
            bottom: 1.5rem;
            padding: 20px;
            background-color: #f44336; /* Red */
            color: white;
            margin-bottom: 15px;
            opacity: 1;
            transition: opacity 0.6s; /* 600ms to fade out */
            z-index: 100;
        }

        .alert.success {
            background-color: #04AA6D;
        }

        /* The close button */
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        /* When moving the mouse over the close button */
        .closebtn:hover {
            color: black;
        }
    </style>

</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small">{{ $date->format("l, F j, Y") }}</a>
                        {{--                        Monday, January 1, 2045--}}
                    </li>
{{--                    <li class="nav-item border-right border-secondary">--}}
{{--                        <a class="nav-link text-body small" href="#">Advertise</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item border-right border-secondary">--}}
{{--                        <a class="nav-link text-body small" href="#">Contact</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link text-body small" href="#">Login</a>--}}
{{--                    </li>--}}
                </ul>
            </nav>
        </div>
        <div class="col-lg-3 text-right d-none d-md-block">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-auto mr-n2">
                    <div class=" ml-auto mr-3 d-lg-flex" style="gap:1rem; align-items: center">
                        @auth
                            <div style="display: flex; gap: 1rem; align-items: center; flex-shrink: 1">
                                <span>Hello {{auth()->user()->name}}!</span>
                                @if(auth()->user()->user_role===\App\Models\Enums\UserRole::ADMIN)
                                    <a href="/panel/dashboard">Dashboard</a>
                                @endif
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="btn btn-link" type="submit">Logout</button>
                                </form>
                            </div>
                        @else
                            <a href="/login">Login</a>
                            <a href="/register">Register</a>
                        @endauth
                    </div>
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>--}}
                    {{--                    </li>--}}
                </ul>
            </nav>
        </div>
    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="/" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-4 text-uppercase text-primary">MSP<span
                        class="text-secondary font-weight-normal">News</span></h1>
            </a>
        </div>
        {{--        <div class="col-lg-8 text-center text-lg-right">--}}
        {{--            <a href="https://htmlcodex.com"><img class="img-fluid" src="/img/ads-728x90.png" alt=""></a>--}}
        {{--        </div>--}}
    </div>
</div>
<!-- Topbar End -->
{{--@php(ddd(request()))--}}


<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="/" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">MSP<span
                    class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="/" class="nav-item nav-link {{request()->getRequestUri()==="/" ? "active":""}}">Home</a>
                {{--                <a href="category.html" class="nav-item nav-link">Category</a>--}}
                {{--                <a href="single.html" class="nav-item nav-link">Single News</a>--}}

                <div class="nav-item dropdown">
                    <a href="/" class="nav-link dropdown-toggle {{request()->route()->named("category") ? "active":""}}"
                       data-toggle="dropdown">Categories</a>
                    <div class="dropdown-menu rounded-0 m-0" style="height: 200px;overflow: scroll">

                        @foreach($categories as $category)
                            <a href="/categories/{{$category->slug}}"
                               class="dropdown-item {{request()->getRequestUri() ==="/categories/$category->slug" ? "active":""}}">{{$category->name}}</a>
                        @endforeach
                        {{--                        <a href="#" class="dropdown-item">Menu item 2</a>--}}
                        {{--                        <a href="#" class="dropdown-item">Menu item 3</a>--}}
                    </div>
                </div>
                <a href="/contact" class="nav-item nav-link {{request()->getRequestUri()==="/contact" ? "active":""}}">Contact</a>
            </div>
            {{--            <div class=" ml-auto mr-3 d-lg-flex gap" style="gap:1rem;">--}}
            {{--                @auth--}}
            {{--                    <div style="display: flex; gap: 1rem; align-items: center; flex-shrink: 1">--}}
            {{--                        <span>Hello {{auth()->user()->name}}!</span>--}}
            {{--                        <a href="/dashboard">Dashboard</a>--}}
            {{--                        <form action="/logout" method="post">--}}
            {{--                            @csrf--}}
            {{--                            <button class="btn btn-link" type="submit">Logout</button>--}}
            {{--                        </form>--}}
            {{--                    </div>--}}
            {{--                @else--}}
            {{--                    <a href="/login">Login</a>--}}
            {{--                    <a href="/register">Register</a>--}}
            {{--                @endauth--}}
            {{--            </div>--}}
            <form action="/search" method="get">
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input name="q" type="text" class="form-control border-0" placeholder="Keyword">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
</div>
<!-- Navbar End -->

@yield("top-header")



<!-- News With Sidebar Start -->
<div class="container-fluid mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @yield("content")
            </div>

            <div class="col-lg-4">
                <!-- Social Follow Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3"
                           style="background: #39569E;">
                            <i class="fab fa-facebook-f text-center py-4 mr-3"
                               style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Fans</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3"
                           style="background: #52AAF4;">
                            <i class="fab fa-twitter text-center py-4 mr-3"
                               style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Followers</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3"
                           style="background: #0185AE;">
                            <i class="fab fa-linkedin-in text-center py-4 mr-3"
                               style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Connects</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3"
                           style="background: #C8359D;">
                            <i class="fab fa-instagram text-center py-4 mr-3"
                               style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Followers</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3"
                           style="background: #DC472E;">
                            <i class="fab fa-youtube text-center py-4 mr-3"
                               style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Subscribers</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                            <i class="fab fa-vimeo-v text-center py-4 mr-3"
                               style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium">12,345 Followers</span>
                        </a>
                    </div>
                </div>
                <!-- Social Follow End -->

                <!-- Ads Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                        <a href=""><img class="img-fluid" src="/img/news-800x500-2.jpg" alt=""></a>
                    </div>
                </div>
                <!-- Ads End -->

                <!-- Popular News Start -->
                {{--                <div class="mb-3">--}}
                {{--                    <div class="section-title mb-0">--}}
                {{--                        <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>--}}
                {{--                    </div>--}}
                {{--                    <div class="bg-white border border-top-0 p-3">--}}
                {{--                        @foreach($trandingPosts as $post)--}}
                {{--                            <x-tranding-post-card :post=$post />--}}
                {{--                        @endforeach--}}

                {{--                    </div>--}}
                {{--                </div>--}}
                <!-- Popular News End -->

                <!-- Newsletter Start -->
                <form action="/newsletter" method="post">
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                            <div class="input-group mb-2" style="width: 100%;">
                                @csrf
                                <input type="text" name="email" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                </div>
                            </div>
                                @error("email")
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            <small>Lorem ipsum dolor sit amet elit</small>
                        </div>
                    </div>
                </form>
                <!-- Newsletter End -->

{{--                <!-- Tags Start -->--}}
{{--                <div class="mb-3">--}}
{{--                    <div class="section-title mb-0">--}}
{{--                        <h4 class="m-0 text-uppercase font-weight-bold">Tags</h4>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white border border-top-0 p-3">--}}
{{--                        <div class="d-flex flex-wrap m-n1">--}}
{{--                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>--}}
{{--                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>--}}
{{--                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>--}}
{{--                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>--}}
{{--                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>--}}
{{--                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>--}}
{{--                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>--}}
{{--                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>--}}
{{--                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>--}}
{{--                            <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Tags End -->--}}
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->


<!-- Footer Start -->
<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
    <div class="row py-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
            @foreach($popularPosts as $post)
                <x-popular-post-card :post=$post/>
            @endforeach
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
            <div class="m-n1">
                @foreach($categories as $category)
                    <a href="/categories/{{$category->slug}}"
                       class="btn btn-sm btn-secondary m-1 {{ request()->getRequestUri()==="/categories/$category->slug" ?"active":""}}">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
            <div class="row">
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="/img/news-110x110-1.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="/img/news-110x110-2.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="/img/news-110x110-3.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="/img/news-110x110-4.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="/img/news-110x110-5.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="/img/news-110x110-1.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Design by <a href="https://htmlcodex.com">HTML Codex</a></p>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

<!-- Flash Message -->
@if(request()->session()->has("success"))
    <x-flash-message class="success">{{request()->session()->get("success")}}</x-flash-message>
@endif

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="/js/main.js"></script>
@yield("script")
</body>

</html>
