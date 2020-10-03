@extends('layouts.app_new')

@section('content')

<center><label style='color:red'>{{Session::get("message")}}</label></center>

<a href="{{asset('customers/list')}}" class='btn btn-primary' style="float:right;">All Customers</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>EDIT CUSTOMER DETAILS</b> </p>
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

<form method="post" action="{{asset('customer/edit_data')}}" enctype="multipart/form-data" role="form">

<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="id" value="{{$customer->id}}">

          <div class="form-row">
            <div class="col-md-4 form-group">
			<label><b>Name</b></label>
              <input type="text" name="name" class="form-control" style="border-radius:0px" id="name" placeholder="Enter Student Name" value="{{$customer->name}}">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
			<label><b>Email</b></label>
              <input type="email" class="form-control" name="email" id="email" style="border-radius:0px" placeholder="Student Email" data-rule="email" data-msg="Please enter a valid email" value="{{$customer->email}}">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
			<label><b>Mobile Number</b></label>
              <input type="tel" class="form-control" name="phone" id="phone" style="border-radius:0px" placeholder="Student Phone Number" data-rule="maxlen:10" data-msg="Please enter 10 digits mobile number" maxlength="10" value="{{$customer->phone}}" onkeypress="return isNumber(event)">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-row">
            
			
			
			<div class="col-sm-4"><label><b>Upload Image</b></label><input type="file" name="upload_file" class="form-control" style="border-radius:0px"><img src="{{asset('customers')}}/{{$customer->profile_pic}}" width="100" style="margin-top:10px;"></div>
			
			
			<div class="col-md-8 form-group">
			<label><b>Address</b></label>
              <textarea type="text" name="address" value="{{old('address')}}" class="form-control" style="border-radius:0px" id="address" placeholder="address" autocomplete="off">{{$customer->address}}</textarea>
              <div class="validate"></div>
            </div>
			
          </div>
        <div class="form-row">    
            <div class="col-md-4 form-group">
              <p><b>Gender</b> : &nbsp;&nbsp;</p>
				 <input type="radio" name="gender" value=1 @if($customer->gender==1) checked @endif > male <br>
				 <input type="radio" name="gender" value=2 @if($customer->gender==2) checked @endif > female
            </div>
			
			<div class="col-md-4 form-group">
              <p><b>Hobbies</b> : &nbsp;&nbsp;</p>
				 <input type="checkbox" name="hobbies[]" value="music" @if(in_array("music", explode(",",$customer->hobbies) )) checked @endif > Music<br>
				 <input type="checkbox" name="hobbies[]" value="books" @if(in_array("book", explode(",",$customer->hobbies) )) checked @endif > Reading Books
            </div>
			
		
			<div class="col-md-4 form-group">
			<label><b>State</b></label>
              <select name="state" class="form-control" style="border-radius:0px" id="state1" onchange="cityList1()">
				<option value=""> Select State</option>
				<option value="1" @if($customer->state==1) selected  @endif > Thamilnadu</option>
				<option value="2" @if($customer->state==2) selected  @endif > Telanagana</option>
			  </select>
              <div class="validate"></div>
            </div>
			
          </div>
<input type="hidden" class="cityID" value="{{$customer->city_id}}">
<input type="hidden" class="stateID" value="{{$customer->state}}">
          <div class="row">
			<div class="col-md-4 form-group">
			<label><b>City</b></label>
              <select name="city_id" class="form-control" style="border-radius:0px" id="city1">
			  <option value="">Select City</option>
			  @foreach($city as $scity)
			  <option value="{{$scity->id}}" selected>{{$scity->name}}</option>
			  @endforeach
			  </select>
              <div class="validate"></div>
            </div>
		  </div>
          
		  
		  <input type="submit" style="margin-left:0px;" name="submit" value="Edit Student" class="btn btn-primary" style="border-radius:0px">
		  
		  
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

function cityList1(){
	alert();
	var sid = $("#state1").val();
	if(sid==''){
		sid = $(".stateID").val();
	}
	var data = {'sid':sid,"_token":"{{csrf_token()}}"};
	var cid = $(".cityID").val();
	$("#city1").empty();
	$.post("{{asset('customer/city_list')}}",data,function(response){
		var opt = '<option value=""> Select City</option>';
		$.each(response.data,function(k,v){
			if(cid == v.id){
				var s = 'selected';
			}else{
				var s = '';
			}
			opt +="<option value="+v.id+" "+s+" >"+v.name+"</option>";
		});
		$("#city1").html(opt);
	});
}

</script>		

@endsection
