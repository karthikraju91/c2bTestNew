@extends('layouts.app_new')

@section('content')

<center><label style='color:red'>{{Session::get("message")}}</label></center>

<a href="{{asset('videos/list')}}" class='btn btn-primary' style="float:right;">All Videos</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>EDIT VIDEO DETAILS</b> </p>
@if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif

<div class="card">
	
	<div class="card-body">

<form method="post" action="{{asset('videos/edit_data')}}" enctype="multipart/form-data" role="form">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="id" value="{{$videos->id}}">

          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Title</b></label>
              <input type="text" name="title" class="form-control" style="border-radius:0px" id="title" placeholder="Enter Video Title" value="{{$videos->title}}">
              <div class="validate"></div>
            </div>
            
            
          </div>
		  
		  <div class="row">
		  
		  <div class="col-md-8 form-group">
			<label><b>Description</b></label>
              <textarea class="form-control" name="description" id="description" style="border-radius:0px" placeholder="Video Description"  value="{{$videos->description}}">{{$videos->description}}</textarea>
              <div class="validate"></div>
            </div>
		  
		  </div>
		  
		  
		  <div class="row">
			
			<div class="col-sm-4">
			<label><b>Upload Image</b></label>
				<input type="file" name="image" class="form-control">
				
			</div>
		  <img src="{{asset('videos')}}/{{$videos->image}}" width="100" style="margin-top:10px;"></div>
		  </div>
		  
		  <br>
		  
          <div class="form-row">

			<div class="col-sm-4"><label><b>Upload Image</b></label><input type="file" name="upload_file" class="form-control" style="border-radius:0px">
			<iframe src="{{asset('videos')}}/{{$videos->video_links}}" width="100" style="margin-top:10px;"></iframe></div>
			
			
          </div>
        <br>
          
		  
		  <input type="submit" style="margin-left:0px;" name="submit" value="Edit Student" class="btn btn-primary" style="border-radius:0px">
		  
		  
        </form>
		
</div>		
</div>		
		

@endsection
