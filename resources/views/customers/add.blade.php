@extends('layouts.app_new')

@section('content')

<style>
.error{
	color:red;
}
</style>

<center><label>{{Session::get("message")}}</label></center>

<a href="{{asset('customers/list')}}" class='btn btn-primary' style="float:right;">All Customers</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>ADD CUSTOMER DETAILS</b> </p>
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

<form method="post" action="{{asset('customer/save_data')}}" enctype="multipart/form-data" role="form">

<input type="hidden" name="_token" value="{{csrf_token()}}">

          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Name</b></label>
              <input type="text" name="name" class="form-control" style="border-radius:0px" id="name" placeholder="Enter Customer Name" value="{{old('name')}}">
@if($errors->has('name'))
    <div class="error">{{ $errors->first('name') }}</div>
@endif
            </div>
            <div class="col-md-4 form-group">
			<label><b>Email</b></label>
              <input type="email" class="form-control" name="email" id="email" style="border-radius:0px" placeholder="Customer Email" data-rule="email" data-msg="Please enter a valid email" value="{{old('email')}}">
@if($errors->has('email'))
    <div class="error">{{ $errors->first('email') }}</div>
@endif
            </div>
            <div class="col-md-4 form-group">
			<label><b>Mobile Number</b></label>
              <input type="tel" class="form-control" name="phone" id="phone" style="border-radius:0px" placeholder="Customer Phone Number" data-rule="maxlen:10" data-msg="Please enter 10 digits mobile number" maxlength="10" value="{{old('phone')}}" onkeypress="return isNumber(event)">
@if($errors->has('phone'))
    <div class="error">{{ $errors->first('phone') }}</div>
@endif
            </div>
          </div>
          <div class="form-row">
            			
			<div class="col-sm-4"><label><b>Upload Image</b></label><input type="file" name="upload_file" class="form-control" style="border-radius:0px"></div>
			
			<div class="col-md-8 form-group">
			<label><b>Address</b></label>
              <textarea type="text" name="address" value="{{old('address')}}" class="form-control" style="border-radius:0px" id="address" placeholder="address" autocomplete="off">{{old('address')}}</textarea>
@if($errors->has('address'))
    <div class="error">{{ $errors->first('address') }}</div>
@endif
            </div>
			
          </div>
        <div class="form-row">    
            <div class="col-md-4 form-group">
              <p><b>Gender</b> : &nbsp;&nbsp; </p>
				 <input type="radio" name="gender" value=1 @if(old('gender')==1) checked @endif> male<br>
				 <input type="radio" name="gender" value=2 @if(old('gender')==2) checked @endif> female<br>
@if($errors->has('gender'))
    <div class="error">{{ $errors->first('gender') }}</div>
@endif
            </div>
			
			<div class="col-md-4 form-group">
              <p><b>Hobbies</b> : &nbsp;&nbsp;</p>
				 <input type="checkbox" name="hobbies[]" value="music" @if(old('hobbies') != null) @if(in_array("music",old('hobbies') )) checked @endif @endif> Music<br>
				 <input type="checkbox" name="hobbies[]" value="books" @if(old('hobbies') != null) @if(in_array("books",old('hobbies') )) checked @endif @endif> Reading Books<br>
@if($errors->has('hobbies'))
    <div class="error">{{ $errors->first('hobbies') }}</div>
@endif				 
            </div>
			
			<div class="col-md-4 form-group">
			<label><b>State</b></label>
              <select name="state" class="form-control" style="border-radius:0px" id="state" onchange="cityList()">
				<option value=""> Select State</option>
				<option @if(old('state')==1) selected @endif  value="1"> Thamilnadu</option>
				<option value="2" @if(old('state')==2) selected @endif > Telanagana</option>
			  </select>
@if($errors->has('state'))
    <div class="error">{{ $errors->first('state') }}</div>
@endif
            </div>

          </div>
		  
		  <div class="row">
			<div class="col-md-4 form-group">
			<label><b>City</b></label>
              <select name="city" class="form-control" style="border-radius:0px" id="city">
			  <option value="">Select City</option>
			  </select>
@if($errors->has('city'))
    <div class="error">{{ $errors->first('city') }}</div>
@endif
            </div>
		  </div>

          
          
		  
		  <input type="submit" style="margin-left:0px;" name="submit" value="Add Student" class="btn btn-primary" style="border-radius:0px">
		  
		  
        </form>

</div>
</div>

<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

</script>

		
@endsection
