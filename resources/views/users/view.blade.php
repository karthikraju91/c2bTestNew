@extends('layouts.app_new_user')

@section('content')

<style>
.table td, .table th {
     border-top: 0px; 
}
</style>

<div class="card">
	
	<div class="card-body">


<div class="col-sm-12">

<h4>VIDEO DETAILS</h4>

<div class="col-sm-12">
<iframe width="500" style="float:left;" height="300" src="{{asset('videos')}}/{{$data->video_links}}" allowfullscreen></iframe>&nbsp; &nbsp;
<img width="450" src="{{asset('videos')}}/{{$data->image}}">
</div>
<div class="col-sm-12">
<p><b>Title</b> : {{$data->title}}</p>
<p><b>Description</b> : {{$data->description}}</p>
<p><b>Date</b> : {{date("d-m-Y",strtotime($data->created_at))}}
</div>


</div>

	
</div>
</div>


@endsection
