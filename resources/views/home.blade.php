@extends('layout')

@section('content')
    <div class="bg-white m-3">
    Welcome {{Auth::user()->name}} 

    <div class="container py-3">
        <div class="row">
            @foreach($article as $articles)
            <div class="col-md-4 mb-3" style="">
                <h3>{{$articles->title}}</h3>
                <div id="description-box" class="fs-5" style="width:100%;height:140px; overflow:hidden; text-overflow: ellipsis;">{{$articles->description}}</div>
            </div>
            @endforeach
        </div>
    </div>   
    </div>
    <script>
    function wrapText(text) {
        var wordArray = text.innerHTML.split(' ');
        while(text.scrollHeight > text.offsetHeight) {
            wordArray.pop();
            text.innerHTML = wordArray.join(' ') + '<a href="#"> ...full story</a>';
        }
    }

    var arr = document.getElementsByClassName('fs-5');
    for(let i = 0; i < arr.length; i++) {
        wrapText(arr[i]);
    }
</script>
@endsection
