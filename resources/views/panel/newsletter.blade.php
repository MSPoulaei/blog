@extends("layouts.panel")

@section("content")
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create New Post</h4>
                {{--                <p class="card-description"> Basic form elements </p>--}}
                <form class="forms-sample" method="post" action="/panel/newsletter">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" value="{{old('title')}}" class="form-control" id="title" name="title" placeholder="Title">
                    @error("title")
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" id="body" name="body" rows="8" placeholder="Body">{{old("body")}}</textarea>
                    @error("body")
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-success me-2">Post</button>
{{--                    <a href="/panel/das"><button type="button" class="btn btn-dark">Go Back</button></a>--}}
                </form>
            </div>
        </div>
    </div>


@endsection
