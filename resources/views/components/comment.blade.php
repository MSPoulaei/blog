@props(["comment","isSub"])
<div {{$attributes->merge(["class"=>"media mb-4"])}} id="{{$comment->id}}">
    <img src="/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1"
         style="width: 45px;">
    <div class="media-body">
        <h6><a class="text-secondary font-weight-bold" href="/users/{{$comment->author->username}}">{{$comment->author->name}}</a>
            <small><i>{{$comment->created_at->format("l, F j, Y h:m")}}</i></small></h6>
        <p>{{$comment->body}}</p>
        @if(!$isSub)
            <button class="btn btn-sm btn-outline-secondary" onclick="clickReply({{$comment->id}},'{{$comment->author->name}}')">Reply</button>
            @foreach($comment->subComments as $subComment)
                <x-comment :comment=$subComment :isSub=true class="mt-4"/>
            @endforeach
        @endif
    </div>
</div>
