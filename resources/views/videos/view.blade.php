@extends('layouts.app_new')

@section('content')

<style>
.table td, .table th {
     border-top: 0px; 
}
</style>

<div class="card">
	
	<div class="card-body">

<center><label>{{Session::get("message")}}</label></center>

<a href="{{asset('videos/list')}}" class='btn btn-primary' style="float:right;">BACK</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>VIDEO DETAILS</b> </p>


<table class="table">
<tr><th><b>Title</b></th></tr>
<tr><td>{{$video->title}}</td></tr>
<tr><th><b>Description</b></th></tr>
<tr><td>{{$video->description}}</td></tr>
</table>

<p>Image</p>
<image width="150" src="{{asset('videos')}}/{{$video->image}}">
<a href="{{asset('videos')}}/{{$video->image}}">click Here to full view</a>
	<br>
<p>VIDEO PREVIEW</p>
<iframe width="220" height="115" src="{{asset('videos')}}/{{$video->video_links}}" allowfullscreen></iframe>

	
</div>
</div>


@endsection
