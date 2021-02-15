@extends('layout')

<style>
    .login {
        height: 100%;
        display: flex;
    }
</style>

@section('content')
    <div>
        <div class="container px-5 py-2">
            <div class="login d-flex flex-column w-50">
                <form method="POST" action="/profile">
                @csrf
                <div class="mb-1">
                <label style="font-weight:bold;">Name:</label>
                <div class="input-group mb-2">
                    <input name="name" type="text" class="form-control" placeholder="Name" aria-label="Username" value="{{Auth::user()->name}}" name="name" aria-describedby="basic-addon1">
                </div>
                @if($errors->any('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
                </div>
                <div class="mb-1">
                <label style="font-weight:bold;">Email:</label>
                <div class="input-group mb-2">
                    <input name="email" type="email" class="form-control" placeholder="Email" aria-label="Username" value="{{Auth::user()->email}}" name="email" aria-describedby="basic-addon1">
                </div>
                @if($errors->any('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
                </div>
                <div class="mb-1">
                <label style="font-weight:bold;">Phone:</label>
                <div class="input-group mb-2">
                    <input name="phone" type="text" class="form-control" placeholder="Phone" aria-label="Username" value="{{Auth::user()->phone}}" name="email" aria-describedby="basic-addon1">
                </div>
                @if($errors->any('phone'))
                <span class="text-danger">{{$errors->first('phone')}}</span>
                @endif
                </div>
                <div style="display:relative">
                <button class="btn border rounded bg-light">Update</button>
                @if(Session::has('success'))
                    <div class="text-success my-2">
                    {{Session::get('success')}}
                    </div>
                @endif
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>

@endsection