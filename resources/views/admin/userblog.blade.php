@extends('layout')


@section('content')
	<div>
		<div class="container">
			<table class="table">
				<thead>
					<tr>
        				<th scope="col">Title</th>
        				<th scope="col">Action</th>
        			</tr>
				</thead>
				<tbody>
					@foreach($article as $articles)
						<tr>
        					<td><a href="#">{{$articles->title}}</a></td>
        					<td>
        						<form method="POST" action="blog/delete">
        						@csrf
        						<input style="display: none;" name="id" value="{{$articles->id}}">
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