<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Session;
class CartController extends Controller
{
    public function add_cart(Request $request){


    	$data=array();
    	$data['id']=$request->id;
    	$data['name']=$request->name;
    	$data['qty']=$request->qty;
    	$data['price']=$request->price;
    	$data['weight']=[0][0];

    	// print_r($data);

    	Cart::add($data);

    	Session::put('msg','<div class="alert alert-danger">
			  <strong>Error!</strong> .Cart data insert
			</div>');
    	return redirect()->back();

    }


    public function update_cart(Request $request,$rowId){

    	$qty=$request->qty;
    	$update=Cart::update($rowId,$qty);
    	Session::put('msg','<div class="alert alert-danger">
			  <strong>Error!</strong> Cart Update successfully.
			</div>');
    	return redirect()->back();

     }


     public function remove_cart($rowId){

     	$cart_remove=Cart::remove($rowId);
     	Session::put('msg','<div class="alert alert-danger">
			  <strong>Error!</strong> Delete  successfully.
			</div>');
    	return redirect()->back();

     }

     public function create_invoice(Request $request){

		
     	$cus_id=$request->cus_id;
			$cus=DB::table('customers')->where('id',$cus_id)->first();
			$contents=Cart::content();
     	return view('admin.pos.invoice',compact('cus','contents'));
			 
     }


     public function invoice(Request $request){

     	$data=array();

     	$data['customer_id']=$request->customer_id;
     	$data['order_date']=$request->order_date;
     	$data['order_status']=$request->order_status;
     	$data['total_products']=$request->total_products;
     	$data['sub_total']=$request->sub_total;
     	$data['vat']=$request->vat;
     	$data['total']=$request->total;
     	$data['payment_status']=$request->payment_status;
     	$data['pay']=$request->pay;
     	$data['due']=$request->due;

     	$order_id=DB::table('orders')->insertGetId($data);
     	$contents=Cart::content();
     	$odata=array();

     	foreach($contents as $content){
     		$odata['order_id']=$order_id;
     		$odata['product_id']=$content->id;
     		$odata['quantity']=$content->qty;
     		$odata['unitcost']=$content->price;
     		$odata['total']=$content->total;

     		$insert=DB::table('orderdetails')->insert($odata);
     		Cart::destroy();
     		Session::put('msg','<div class="alert alert-danger">
			  <strong>successfully !</strong>Order successfully .
			</div>');
    	return redirect()->route('pos');



     	}


     }
}
