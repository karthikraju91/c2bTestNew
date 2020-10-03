<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use DB;

class CustomerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){
		$customers = User::where("role",2)->get();
		return view("customers.list",compact(["customers"]));
	}	

	public function add(){
		return view("customers.add");
	}

	public function store(Request $request)
    {
        //echo "<pre>"; print_r($request->all()); exit;

        $messages = [
          'name.required' => '*Please enter name',
          'email.required' => '*Please enter email address',
          'phone.required' => '*Please enter valid mobile number',
          'gender.required' => '*Please select gender',
          'hobbies.required' => '*Please check hobbies',
          'state.required' => '*Please select state',
          'city.required' => '*Please select city',
          'address.required'=>'*Please ener address'
        ];
        $validate = $this->validate($request, [
                'name' => 'required |unique:customers',
                'email' => 'required|unique:customers',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:customers',
                'gender' => 'required',
                'hobbies' => 'required',
                'state' => 'required',
                'city' => 'required',
                'address' => 'required'
            ],$messages);

        $customer = new Customer;
        
        $customer->name      =   $request->name;
        $customer->email     =   $request->email;
        $customer->phone =   $request->phone;
        $customer->gender    =   $request->gender;
        $customer->user_id   =   \Auth::user()->id;

        $customer->address    =   $request->address;
        $customer->state    =   $request->state;
        $customer->city_id    =   $request->city;
        $customer->hobbies    =   implode(",",$request->hobbies);
        $customer->created_at = date("Y-m-d H:i:s");

        $customer->save();
        $insert = $customer->id;
        if(!empty($request->file("upload_file"))){
            $s_profile = $request->file("upload_file");
            
            $folderPath = public_path('customers');
            if(!file_exists ( $folderPath )){$folderPath = mkdir($folderPath);}
            $s_profile->move($folderPath,$insert.".".$s_profile->getClientOriginalExtension());
            Customer::where("id",$insert)->update(["profile_pic"=>$insert.".".$s_profile->getClientOriginalExtension()]);
        }

        if($insert){
            return Redirect("/customers/list")->with(['message'=>"*Customer added Sucessfully"]);
        }else{
            return Redirect("customer/add")->with(['message'=>"*Unable to create customer."]);
        }

    }



    public function edit(Request $request, $id){
    	$details = Customer::find($id);
    	$city = DB::table("city")->where("id",$details->city_id)->get();
    	return view("customers.edit",["customer"=>$details,"city"=>$city]);
    }


    public function update(Request $request)
    {
        //echo "<pre>"; print_r($request->all()); exit;

        $messages = [
          'name.required' => '*Please enter name',
          'email.required' => '*Please enter email address',
          'phone.required' => '*Please enter valid mobile number',
          'gender.required' => '*Please select gender',
          'hobbies.required' => '*Please check hobbies',
          'state.required' => '*Please select state',
          'city_id.required' => '*Please select city',
          'address.required'=>'*Please ener address'
        ];
        $validate = $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'gender' => 'required',
                'hobbies' => 'required',
                'state' => 'required',
                'city_id' => 'required',
                'address' => 'required'
            ],$messages);

        $customer = Customer::find($request->id);

        $customer->name      =   $request->name;
        $customer->email     =   $request->email;
        $customer->phone =   $request->phone;
        $customer->gender    =   $request->gender;
        $customer->user_id   =   \Auth::user()->id;

        $customer->address    =   $request->address;
        $customer->state    =   $request->state;
        $customer->city_id    =   $request->city_id;
        $customer->hobbies    =   implode(",",$request->hobbies);

        $customer->save();

        if(!empty($request->file("upload_file"))){
            $s_profile = $request->file("upload_file");
           
            $folderPath = public_path('customers');
            if(!file_exists ( $folderPath )){$folderPath = mkdir($folderPath);}
            $s_profile->move($folderPath,$request->id.".".$s_profile->getClientOriginalExtension());
            Customer::where("id",$request->id)->update(["profile_pic"=>$request->id.".".$s_profile->getClientOriginalExtension()]);
        }

        return Redirect("customer/edit/".$request->id)->with(["message"=>"Data is updated"]);

    }

    public function customer_view($id){
    	$data = Customer::find($id);
    	$city = DB::table("city")->where("id",$data->city_id)->first();
    	return view("customers.view",["data"=>$data,"city"=>$city]);
    }


    public function cityList(Request $request){
        $id = $request->sid;
        $data = DB::table("city")->where("state_id",$id)->get();
        return response()->json(['message'=>1,"data"=>$data]);
    }

    public function delete($id)
    {
        $customer = Customer::where('id', $id)->first();
        $customer->delete();
        return Redirect("customers/list")->with(["message"=>"Customer is deleted"]);
    }


}
