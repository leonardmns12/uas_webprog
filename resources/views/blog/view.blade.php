@extends('layout')

@section('content')
    <div>
    <div class="container p-3">
        <a href="{{route('blog.create')}}" class="btn border rounded mb-2">Create Blog</a>
        <table class="table my-3">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($article as $articles)
            <tr>
                <td><a href="{{route('blog.fullstory' , ['id' => $articles->id])}}">{{$articles->title}}</a></td>
                <td class="p-2">
                <form method="POST" action="blog/delete">
                @csrf
                <input name="id" style="display:none" value="{{$articles->id}}"/>
                <button class="btn rounded border">Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
@endsection