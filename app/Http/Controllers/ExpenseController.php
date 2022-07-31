<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use DB;
use Session;

class ExpenseController extends Controller
{
    



    public function index(){

    	$expense=Expense::get();
    	return view('admin.expense.index',compact('expense'));
    }


    public function create(){

    	return view('admin.expense.create');
    }

    public function store(Request $request ){


    	$data=array();

    	$data['details']=$request->details;
    	$data['amount']=$request->amount;
    	$data['month']=$request->month;
    	$data['date']=$request->date;
    	$data['year']=$request->year;

    	DB::table('expenses')->insert($data);


    	 Session::put('msg','<div class="alert alert-success">
			  <strong>Success!</strong> Expense Data Insert Successfully compalte.
			</div>');
		return redirect()->back();

    }



    public function todayexpense(){


    	$date=date("d/m/y");
    	$today=DB::table('expenses')->where('date',$date)->get();
  

    	return view('admin.expense.today',compact('today'));
    }

    public function monthlyexpense(){


    	$month=date("F");
    	$month=DB::table('expenses')->where('month',$month)->get();
    	return view('admin.expense.month',compact('month'));
    }


    public function yearlyexpense(){

    	$year=date("Y");
    	$year=DB::table('expenses')->where('year',$year)->get();
    	return view('admin.expense.year',compact('year'));
    }
}
