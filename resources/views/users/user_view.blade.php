@extends('layouts.app_new_user')

@section('content')

<style>
.table td, .table th {
     border-top: 0px; 
}
</style>

<div class="card">
	
	<div class="card-body">

<div class="table-responsive">
			<table id="zero_config" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>S.no</th>
					<th>Title</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
		@foreach($data as $key=>$video)	
			<tr>
				<td>{{$key + 1}}</td>
				<td>{{$video->title}}</td>
				<td>{{$video->description}}</td>
				<td><a href="{{asset('users/view')}}/{{$video->id}}">View</a></td>
			</tr>
		@endforeach	
			</tbody>
			</table>
		</div>

	
</div>
</div>


@endsection
