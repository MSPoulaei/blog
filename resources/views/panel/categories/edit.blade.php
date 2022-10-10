@extends("layouts.panel")

@section("content")
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Category: {{$category->name}}</h4>
                <form class="forms-sample" method="post" action="/panel/categories/{{$category->slug}}">
                    @csrf
                    @method("patch")
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{old('name',$category->name)}}" class="form-control" id="name"
                               name="name" placeholder="Name">
                        @error("name")
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" value="{{old('slug',$category->slug)}}" class="form-control" id="slug"
                               name="slug" placeholder="Slug">
                        @error("slug")
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <a href="/panel/categories">
                        <button type="button" class="btn btn-dark">Go Back</button>
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
