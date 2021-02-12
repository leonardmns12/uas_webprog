@extends('layout')

<style> 
     .login {
                height: 100%;
                display: flex;
            }
</style>

@section('content')
    <div class="container px-5 py-2">
        <div class="login d-flex flex-column w-50">
        <form method="POST" action="/login">
        @csrf
        <label class="fw-bold">Login as</label>
        <div class="input-group">
            <div>
            <select class="form-select" aria-label="Default select example">
                <option selected value="1">User</option>
                <option selected value="1">Admin</option>
            </select>
            </div>
        </div>
        <label class="fw-bold">Email</label>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Email" aria-label="Username" name="email" aria-describedby="basic-addon1">
        </div>
        @if($errors->any('email'))
            <span class="text-danger mb-3">{{$errors->first('email')}}</span>
            <br/>
        @endif
        <label class="fw-bold">Password</label>
        <div class="input-group">
            <input type="password" class="form-control" placeholder="Password" name="password" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        @if($errors->any('password'))
            <span class="text-danger mb-3">{{$errors->first('password')}}</span>
            <br/>
        @endif
        <div style="display:relative">
            <button type="submit" class="btn border">Submit</button>
        </div>
        @if(Session::has('invalid'))
            <div class="text-danger">{{Session::get('invalid')}}</div>
        @endif
        </div>
        </form>
    </div>
@endsection