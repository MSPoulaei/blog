@extends("layouts.panel")

@section("content")
    <div class="page-header">
        <h3 class="page-title"> Posts </h3>

    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Published At</th>
                                <th>Views</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    @if($post->deleted_at)
                                        <td>{{$post->title}}</td>
                                    @else
                                        <td><a href="/posts/{{$post->slug}}">{{$post->title}}</a></td>
                                    @endif
                                    <td>{{$post->slug}}</td>
                                    <td>{{$post->published_at->format("d M Y")}}</td>
                                    <td>{{$post->view}}</td>
                                    @if($post->deleted_at)
                                        <td><label class="badge badge-danger">Trashed</label></td>
                                    @else
                                        <td><label class="badge badge-success">Posted</label></td>
                                    @endif
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a href="/panel/posts/{{$post->slug}}/edit">
                                                    <button type="button"
                                                            class="btn btn-outline-secondary btn-icon-text"><i
                                                            class="mdi mdi-file-check btn-icon-append"></i> Edit
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col-lg-4 ">
                                                @if($post->deleted_at)
                                                    <form action="/panel/posts/{{$post->slug}}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-warning btn-icon-text">
                                                            <i class="mdi mdi-reload btn-icon-prepend"></i> Restore </button>
                                                    </form>
                                                @else

                                                    <form action="/panel/posts/{{$post->slug}}" method="post">
                                                        @csrf
                                                        @method("delete")
                                                        <button type="submit"
                                                                class="btn btn-outline-danger btn-icon-text">
                                                            <i class="mdi mdi-delete btn-icon-prepend"></i> Delete
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            {{$posts->appends(request()->except('page'))->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
