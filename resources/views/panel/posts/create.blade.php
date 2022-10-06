@extends("layouts.panel")

@section("content")
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Post</h4>
                {{--                <p class="card-description"> Basic form elements </p>--}}
                <form class="forms-sample" method="post" action="/panel/posts/create">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    @error("title")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug">
                    </div>
                    @error("slug")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                    </div>
                    @error("slug")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" id="body" name="body" rows="8" placeholder="Body"></textarea>
                    </div>
                    @error("body")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled
                                   placeholder="Upload Image">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                    </div>
                    @error("thumbnail")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category_id" class="js-example-basic-single" style="width:100%">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error("category_id")
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="/admin/posts"><button class="btn btn-dark">Go Back</button></a>
                </form>
            </div>
        </div>
    </div>


@endsection
