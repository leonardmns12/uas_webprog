@extends('layout')

@section('content')
    <div>
        <div class="m-3 p-3">
            <h2 class="mx-3">{{$article->title}}</h2>
            <img class="img-fluid mx-3" width="250" height="250" src="{{route('storage.image' , ['filepath' => $article->image])}}" />
            <div class="col-md-5 my-3">
                {{$article->description}}
            </div>
            <a href="{{route('home')}}" class="btn border rounded mx-3">Back</a>
        </div>
    </div>
@endsection
