<div {{ $attributes->merge(["class"=>"alert"]) }}>
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    {{$slot}}
</div>
