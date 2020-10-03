@extends('layouts.app_new')

@section('content')

<div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">CUSTOMERS</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Videos</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

<center><span style="color:red;"><b>{{Session::get("message")}}</b></span></center>
<div class="card">

<a href="{{asset('videos/add')}}" class="btn btn-primary"><b>Add New Video</b></a>


	<div class="card-body">
		<h5 class="card-title">VIDEOS LIST</h5>
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
				<td><a href="{{asset('videos/view')}}/{{$video->id}}">View</a> &nbsp; &nbsp; <a href="{{asset('videos/edit')}}/{{$video->id}}">Edit</a> &nbsp;&nbsp; <a onclick="return confirm('Are you sure?')" href="{{asset('videos/delete')}}/{{$video->id}}">Delete</a></td>
			</tr>
		@endforeach	
			</tbody>
			</table>
		</div>
	</div>
</div>	


@endsection
