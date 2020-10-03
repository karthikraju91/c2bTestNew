@extends('layouts.app_new')

@section('content')

<style>
.error{
	color:red;
}
</style>

<center><label>{{Session::get("message")}}</label></center>

<a href="{{asset('videos/list')}}" class='btn btn-primary' style="float:right;">All Videos</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>ADD VIDEO DETAILS</b> </p>
<!--
@if (count($errors) > 0)
   <div class = "alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
@endif
-->

<div class="card">
	
	<div class="card-body">

<form method="post" action="{{asset('videos/save_data')}}" enctype="multipart/form-data" role="form">

<input type="hidden" name="_token" value="{{csrf_token()}}">

          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Title</b></label>
              <input type="text" name="title" class="form-control" style="border-radius:0px" id="name" placeholder="Enter Video Title" value="{{old('title')}}">
@if($errors->has('title'))
    <div class="error">{{ $errors->first('title') }}</div>
@endif
            </div>
        
          </div>
		  
		  <div class="row">
		  <div class="col-md-8 form-group">
			<label><b>Description</b></label>
              <textarea type="text" class="form-control" name="description" id="description" style="border-radius:0px" placeholder="Video description" data-rule="description">{{old('description')}}</textarea>
@if($errors->has('description'))
    <div class="error">{{ $errors->first('description') }}</div>
@endif
            </div>
		  </div>
		  
		  
		  <div class="row">
			
			<div class="col-sm-4">
			<label><b>Upload Image</b></label>
				<input type="file" name="image" class="form-control">
				@if($errors->has('image'))
    <div class="error">{{ $errors->first('image') }}</div>
@endif
			</div>
		  
		  </div>
		  
		  <br>
		  
          <div class="form-row">
            			
			<div class="col-sm-4"><label><b>Upload Video</b></label><input type="file" name="upload_file" class="form-control" style="border-radius:0px">
			@if($errors->has('upload_file'))
    <div class="error">{{ $errors->first('upload_file') }}</div>
@endif
			</div>
			
          </div>
        
		<br>
		  <input type="submit" style="margin-left:0px;" name="submit" value="Add Video" class="btn btn-primary" style="border-radius:0px">
		  
		  
        </form>

</div>
</div>



		
@endsection
