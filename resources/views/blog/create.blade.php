@extends('layout')

@section('content')
    <div>
        <div class="container p-3">
            <h2>New Blog</h2>
            <div>
            <form method="POST" action="/blog/create" enctype="multipart/form-data">
            @csrf
                <label style="font-weight:bold;">Title:</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Name" aria-label="Username" name="title" aria-describedby="basic-addon1">
                </div>

                <label style="font-weight:bold;">Category:</label>
                <div class="input-group mb-2">
                <select name="category_id" class="custom-select custom-select-lg">
                    @foreach($category as $categories)
                    <option value="{{$categories->id}}">{{$categories->name}}</option>
                    @endforeach
                </select>
                </div>

                <label style="font-weight:bold;">Photo  :</label>
                <div class="input-group mb-2">
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile02">
                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                </div>
                @if($errors->any('image'))
                    <br/>
                    <span class="text-danger">{{$errors->first('image')}}</span>
                @endif
                </div>

                <label style="font-weight:bold;">Story:</label>
                <div class="input-group mb-2">
                    <textarea type="text" class="form-control" aria-label="Username" style="min-height:200px;" value="{{Auth::user()->name}}" name="description" aria-describedby="basic-addon1"></textarea>
                </div>

                <div style="display:relative">
                    <button class="btn rounded border">Create</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection