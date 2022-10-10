@extends("layouts.panel")

@section("content")

        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{\App\Models\Post::count()}}</h3>
{{--                                    <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>--}}
                                </div>
                            </div>
{{--                            <div class="col-3">--}}
{{--                                <div class="icon icon-box-success ">--}}
{{--                                    <span class="mdi mdi-arrow-top-right icon-item"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <h6 class="text-muted font-weight-normal">No of Posts</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{\App\Models\Post::all()->sum("view")}}</h3>
{{--                                    <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p>--}}
                                </div>
                            </div>
{{--                            <div class="col-3">--}}
{{--                                <div class="icon icon-box-success">--}}
{{--                                    <span class="mdi mdi-arrow-top-right icon-item"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Views</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{\App\Models\Comment::count()}}</h3>
{{--                                    <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p>--}}
                                </div>
                            </div>
{{--                            <div class="col-3">--}}
{{--                                <div class="icon icon-box-danger">--}}
{{--                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <h6 class="text-muted font-weight-normal">No of Comments</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{\App\Models\User::count()}}</h3>
{{--                                    <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>--}}
                                </div>
                            </div>
{{--                            <div class="col-3">--}}
{{--                                <div class="icon icon-box-success ">--}}
{{--                                    <span class="mdi mdi-arrow-top-right icon-item"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                        <h6 class="text-muted font-weight-normal">No of Users</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Users</h4>
{{--                        <canvas id="transaction-history" class="transaction-chart"></canvas>--}}
                        @foreach($uss as $us)
                            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                <div class="text-md-center text-xl-left">
                                    <h6 class="mb-1">{{$us->name}}</h6>
                                    <p class="text-muted mb-0">{{$us->created_at}}</p>
                                </div>
                                <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                    <h6 class="font-weight-bold mb-0"><img class="img-xs rounded-circle" src="/assets/images/faces/face15.jpg" alt=""></h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                            <h4 class="card-title mb-1">Recent Comments</h4>
{{--                            <p class="text-muted mb-1">Your data status</p>--}}
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="preview-list">
                                    @foreach($comments as $comment)

                                    <div class="preview-item border-bottom">
{{--                                        <div class="preview-thumbnail">--}}
{{--                                            <div class="preview-icon bg-primary">--}}
{{--                                                <i class="mdi mdi-file-document"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="preview-item-content d-sm-flex flex-grow">
                                            <div class="flex-grow">
                                                <h6 class="preview-subject">{{$comment->author->name}}</h6>
                                                <p class="text-muted mb-0">{{mb_strimwidth($comment->body,0,10,"...")}}</p>
                                            </div>
                                            <div class="me-auto text-sm-right pt-2 pt-sm-0">
                                                <p class="text-muted">{{$comment->created_at->diffForHumans()}}</p>
                                                <p class="text-muted mb-0">On Post: <a href="/posts/{{$comment->post->slug}}">{{mb_strimwidth($comment->post->title,0,10,"...")}}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-sm-4 grid-margin">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5>Revenue</h5>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-8 col-sm-12 col-xl-8 my-auto">--}}
{{--                                <div class="d-flex d-sm-block d-md-flex align-items-center">--}}
{{--                                    <h2 class="mb-0">$32123</h2>--}}
{{--                                    <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>--}}
{{--                                </div>--}}
{{--                                <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>--}}
{{--                            </div>--}}
{{--                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">--}}
{{--                                <i class="icon-lg mdi mdi-codepen text-primary ms-auto"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-4 grid-margin">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5>Sales</h5>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-8 col-sm-12 col-xl-8 my-auto">--}}
{{--                                <div class="d-flex d-sm-block d-md-flex align-items-center">--}}
{{--                                    <h2 class="mb-0">$45850</h2>--}}
{{--                                    <p class="text-success ms-2 mb-0 font-weight-medium">+8.3%</p>--}}
{{--                                </div>--}}
{{--                                <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>--}}
{{--                            </div>--}}
{{--                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">--}}
{{--                                <i class="icon-lg mdi mdi-wallet-travel text-danger ms-auto"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-4 grid-margin">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <h5>Purchase</h5>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-8 col-sm-12 col-xl-8 my-auto">--}}
{{--                                <div class="d-flex d-sm-block d-md-flex align-items-center">--}}
{{--                                    <h2 class="mb-0">$2039</h2>--}}
{{--                                    <p class="text-danger ms-2 mb-0 font-weight-medium">-2.1% </p>--}}
{{--                                </div>--}}
{{--                                <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>--}}
{{--                            </div>--}}
{{--                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">--}}
{{--                                <i class="icon-lg mdi mdi-monitor text-success ms-auto"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


@endsection
