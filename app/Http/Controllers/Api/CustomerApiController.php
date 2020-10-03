<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Response;

use App\Customer;

class CustomerApiController extends Controller
{
    public function customers_list(Request $request){
		
    	if(empty($request->user_id)){
    		return Response::json(["status"=>0,"message"=>"Request Params Are Empty"]);
    	}

    	$customers = Customer::where("user_id",$request->user_id)->get();

    	if(count($customers)>0){
    		return Response::json(["status"=>1,"message"=>"Data Found","customers"=>$customers]);
    	}else{
    		return Response::json(["status"=>1,"message"=>"No Data Found","customers"=>array()]);
    	}

	}
}
