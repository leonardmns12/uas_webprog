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
                <label style="font-weight:bold;">Name:</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Name" aria-label="Username" value="{{Auth::user()->name}}" name="name" aria-describedby="basic-addon1">
                </div>
                <label style="font-weight:bold;">Email:</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Email" aria-label="Username" value="{{Auth::user()->email}}" name="email" aria-describedby="basic-addon1">
                </div>
                <label style="font-weight:bold;">Phone:</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Phone" aria-label="Username" value="{{Auth::user()->phone}}" name="email" aria-describedby="basic-addon1">
                </div>
                <div style="display:relative">
                <button class="btn border rounded bg-light">Update</button>
                </div>
        </div>
            </div>
        </div>
    </div>

@endsection