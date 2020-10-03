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

<a href="{{asset('customers/list')}}" class='btn btn-primary' style="float:right;">BACK</a>

<p style="background:#3fbbc0;color:#fff;padding:7px;"> <b>CUSTOMER DETAILS</b> </p>


<table class="table">
<tr><th><b>Customer Name</b></th><th><b>Email</b></th><th></th></tr>
<tr><td>{{$data->name}}</td><td>{{$data->email}}</td><td></td>
<tr><th><b>Mobile No</b></th><th><b>Gender</b></th><th><b>Address</b></th></tr>
<tr><td>{{$data->phone}}</td><td>@if($data->gender==1) Male @else Female @endif</td><td>{{$data->address}}</td></tr>
<tr><th><b>Hobbies</b></th><th><b>state</b></th><th><b>City</b></th></tr>
<tr><td>{{$data->hobbies}}</td><td>@if($data->state==1) Thamilnadu @else Telangana @endif</td><td>{{$city->name}}</td></tr>
<tr><th>Image</th></tr>
<tr><td><img src="{{asset('customers')}}/{{$data->profile_pic}}" width="100" style="margin-top:10px;"></td></tr>
</tr>
</table>


</div>
</div>




@endsection
