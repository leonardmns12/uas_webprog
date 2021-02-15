@extends('admin')

@section('content')
<div>
        <div class="container">
        	<table class="table">
        		<thead>
        			<tr>
        				<th scope="col">Title</th>
                        <th scope="col">Author</th>
        				<th scope="col">Action</th>
        			</tr>
        		</thead>
        		<tbody>
        			@foreach($article as $articles)
        				<tr>
        					<td><a href="{{route('blog.fullstory',['id' => $articles->id])}}">{{$articles->title}}</a></td>
                            <td><a class="text-decoration-none text-dark">{{$articles->users->name}}</a></td>
        					<td>
        						<form method="POST" action="blog/delete">
        						@csrf
								<input name="id" value="{{$articles->id}}" type="text" style="display:none" />
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