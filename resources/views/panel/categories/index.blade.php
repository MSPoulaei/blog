@extends("layouts.panel")

@section("content")
    <div class="page-header">
        <h3 class="page-title"> Categories </h3>

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
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td><a href="/categories/{{$category->slug}}">{{$category->name}}</a></td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a href="/panel/categories/{{$category->slug}}/edit">
                                                    <button type="button"
                                                            class="btn btn-outline-secondary btn-icon-text"><i
                                                            class="mdi mdi-file-check btn-icon-append"></i> Edit
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col-lg-4 ">
                                                <form action="/panel/categories/{{$category->slug}}" method="post">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit"
                                                            class="btn btn-outline-danger btn-icon-text">
                                                        <i class="mdi mdi-delete btn-icon-prepend"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-4">
                            {{$categories->appends(request()->except('page'))->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
