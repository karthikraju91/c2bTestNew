@extends('layouts.app_new')

@section('content')

<div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">CUSTOMERS</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

<div class="card">

<!--<a href="{{asset('customer/add')}}" class="btn btn-primary"><b>Add Customers</b></a>-->


	<div class="card-body">
		<h5 class="card-title">USERS LIST</h5>
		<div class="table-responsive">
			<table id="zero_config" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
		@foreach($customers as $customer)	
			<tr>
				<td>{{$customer->name}}</td>
				<td>{{$customer->email}}</td>
			</tr>
		@endforeach	
			</tbody>
			</table>
		</div>
	</div>
</div>	


@endsection
