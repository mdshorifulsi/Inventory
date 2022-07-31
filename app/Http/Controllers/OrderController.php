<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;


class OrderController extends Controller
{
    public function pendingorder(){

    	$pending=DB::table('orders')
    			->join('customers','orders.customer_id','customers.id')
    			->select('customers.name','orders.*')->where('order_status','pending')
    	->get();

    	return view('admin.order.pendingorder',compact('pending'));


    }

    public function successorder(){

    	$success=DB::table('orders')
    			->join('customers','orders.customer_id','customers.id')
    			->select('customers.name','orders.*')->where('order_status','success')
    	->get();

    	return view('admin.order.successorder',compact('success'));

    }


    public function allorder(){


    	$allorder=DB::table('orders')
    			->join('customers','orders.customer_id','customers.id')
    			->select('customers.name','orders.*')
    			->get();

    	return view('admin.order.allorder',compact('allorder'));

    }


    public function approved($id){

    	 	DB::table('orders')
	->where('id',$id)
	->update(['order_status' =>'success']);

	

        return redirect()->route('all.order');
    }

}
