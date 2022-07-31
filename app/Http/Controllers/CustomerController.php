<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Customer;

class CustomerController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
    }



    public function index(){

    	$customer=DB::table('customers')->get();
    	return view('admin.customer.index',compact('customer'));


    }

    public function create(){

    	return view('admin.customer.create');
    }


public function store(Request $request){



     $validatedData=$request->validate([

        'name' => 'required|max:300|min:2',
        'email' => 'required|unique:employees|max:255',
        'phone' => 'required|max:100|min:5',
        'Address' => 'required|max:300|min:2',
        'shopname' => 'required|max:300|min:2',
        'account_holder' => 'required|max:100|min:2',
        'account_number' => 'required|max:100|min:2',
        'bank_name' => 'required|max:100|min:2',
        'bank_branch' => 'required|max:100|min:2',
       
        ]);


		$data=array();
		$data['name']=$request->name;
		$data['email']=$request->email;
		$data['phone']=$request->phone;
		$data['Address']=$request->Address;
		$data['shopname']=$request->shopname;
		$data['account_holder']=$request->account_holder;
		$data['account_number']=$request->account_number;
		$data['bank_name']=$request->bank_name;
		$data['bank_branch']=$request->bank_branch;


		if($request->hasFile('photo')){

    		$file=$request->file('photo');
    		$name=rand(11111,99999).'.'.$file->getClientOriginalExtension();

    		$data['photo']=$request->file('photo')->move("storage/images",$name);	

    	}

    	DB::table('customers')->insert($data);
    	 Session::put('msg','<div class="alert alert-success">
			  <strong>Success!</strong> Customer Data Insert Successfully compalte.
			</div>');
		return redirect()->back();

}


public function edit($id){
   $customer=Customer::find($id);

   return view('admin.customer.edit',compact('customer'));


}


public function update(Request $request,$id){

     // $customer=Customer::find($id);

    $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['Address']=$request->Address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;


        if($request->hasFile('photo')){

            $file=$request->file('photo');
            $name=rand(11111,99999).'.'.$file->getClientOriginalExtension();

            $data['photo']=$request->file('photo')->move("storage/images",$name);   

        }

        DB::table('customers')

                ->where('id',$id)
                ->update($data);
                
         Session::put('msg','<div class="alert alert-success">
              <strong>Success!</strong> Customer Data Update Successfully compalte.
            </div>');
        return redirect()->back();

}


 public function destroy($id){

        $customer=Customer::find($id);
        $photo=$customer->photo;

        if(!is_null($customer)){
            
            $customer->delete();

        }



            unlink($photo);

        return redirect()->route('all.customer');


    }
	


}
