@extends('layout')

@section('content')
<div class="container px-5 py-2">
    <div class="login d-flex flex-column w-50">
        <form method="POST" action="/register">
        @csrf
            <div class="mb-3">
            <label class="fw-bold">Name</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Name" aria-label="Username" name="name" aria-describedby="basic-addon1">
            </div>
            @if($errors->any('name'))
            <span class="text-danger">{{$errors->first('name')}}</span>
            @endif
            </div>
            <div class="mb-3">
            <label class="fw-bold">Phone</label>
            <div class="input-group">
                <input type="numeric" class="form-control" placeholder="Phone number" aria-label="Username" name="phone" aria-describedby="basic-addon1">
            </div>
            @if($errors->any('phone'))
            <span class="text-danger">{{$errors->first('phone')}}</span>
            @endif
            </div>
            <div class="mb-3">
            <label class="fw-bold">Email</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Email" aria-label="Username" name="email" aria-describedby="basic-addon1">
            </div>
            @if($errors->any('email'))
            <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
            </div>
            <div class="mb-3">
            <label class="fw-bold">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" placeholder="Password" aria-label="Username" name="password" aria-describedby="basic-addon1">
            </div>
            @if($errors->any('password'))
            <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
            </div>
            <div class="mb-3">
            <label class="fw-bold">Password Confirmation</label>
            <div class="input-group">
                <input type="password" class="form-control" placeholder="Password Confirm" aria-label="Username" name="password_confirm" aria-describedby="basic-addon1">
            </div>
            @if($errors->any('password_confirm'))
            <span class="text-danger">{{$errors->first('password_confirm')}}</span>
            @endif
            </div>
            <div style="display:relative">
                <button type="submit" class="btn border">Submit</button>
            </div>
            @if(Session::has('success'))
            <div>
                {{Session::get('success')}}
            </div>
            @endif
        </form>
    </div>
</div>
@endsection