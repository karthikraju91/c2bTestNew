@extends('layouts.app_new_user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <p><h4 style="font-size:18px">User Details</h4></p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
					
					<p>Name : {{\Auth::user()->name}}</p>
				
					<p>Email : {{\Auth::user()->email}}</p>
					
                    <p>{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
