@extends('layout')


@section('content')
    <div>
        <div class="container">
        	<table class="table">
        		<thead>
        			<tr>
        				<th scope="col">Name</th>
        				<th scope="col">Email</th>
        				<th scope="col">Action</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($user as $users)
        				<tr>
        					<td><a href="{{route('user.blog'  , ['id' => $users->id])}}">{{$users->name}}</a></td>
        					<td>{{$users->email}}</td>
        					<td>
        						<form method="POST" action="user/delete">
        						@csrf
        						<input style="display: none;" name="id" value="{{$users->id}}">
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