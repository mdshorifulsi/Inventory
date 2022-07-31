<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Supplier;

class SupplierController extends Controller
{
    public function index(){


    		$supplier=DB::table('suppliers')->get();

    	return view('admin.supplier.index',compact('supplier'));

    }


    public function create(){

    	return view('admin.supplier.create');
    }

    public function store(Request $request){

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
		$data['type']=$request->type;
		


		if($request->hasFile('photo')){

    		$file=$request->file('photo');
    		$name=rand(11111,99999).'.'.$file->getClientOriginalExtension();

    		$data['photo']=$request->file('photo')->move("storage/images",$name);	

    	}

    	DB::table('suppliers')->insert($data);
    	 Session::put('msg','<div class="alert alert-success">
			  <strong>Success!</strong> suppliers Data Insert Successfully compalte.
			</div>');
		return redirect()->back();
    }


     public function destroy($id){

        $supplier=Supplier::find($id);
        $photo=$supplier->photo;

        if(!is_null($supplier)){
            
            $supplier->delete();

        }



            unlink($photo);

        return redirect()->route('all.supplier');


    }


}
