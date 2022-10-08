@extends("layouts.panel")

@section("content")
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Post: {{$post->title}}</h4>
                {{--                <p class="card-description"> Basic form elements </p>--}}
                <form class="forms-sample" method="post" action="/panel/posts/{{$post->slug}}" enctype="multipart/form-data">
                    @csrf
                    @method("patch")
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" value="{{old('title',$post->title)}}" class="form-control" id="title" name="title" placeholder="Title">
                    @error("title")
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" value="{{old('slug',$post->slug)}}" class="form-control" id="slug" name="slug" placeholder="Slug">
                    @error("slug")
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" value="{{old('description',$post->description)}}" class="form-control" id="description" name="description" placeholder="Description">
                    @error("description")
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" id="body" name="body" rows="8" placeholder="Body">{{old('body',$post->body)}}</textarea>
                    @error("body")
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" DISABLED
                                   placeholder="Upload Image">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                    @error("thumbnail")
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="category">Category</label>
                        <select id="category" name="category_id" class="js-example-basic-single" style="width:100%">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{($category->id==old('category_id',$post->category_id)?"selected":"")}}>{{ucfirst($category->name)}}</option>
                            @endforeach
                        </select>
                    @error("category_id")
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <a href="/panel/posts"><button type="button" class="btn btn-dark">Go Back</button></a>
                </form>
            </div>
        </div>
    </div>


@endsection
