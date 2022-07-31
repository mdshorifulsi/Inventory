<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Attendence;
use DB;
use Session;

class AttendenceController extends Controller
{
    public function takeattendence(){

    	$employee=Employee::get();

    	return view('admin.attendence.takeattendence',compact('employee'));
    }


    public function insertattendence(Request $request){

    	$date=$request->att_date;
    	$att_date=DB::table('attendences')->where('att_date',$date)->first();

    	if($att_date){
    		Session::put('msg','<div class="alert alert-danger">
			  <strong>Error!</strong> Today Attendence Already Taken.
			</div>');

			return redirect()->back();
    	}else{
    		foreach ($request->user_id as $id) {
    		$data[]=[

    			"user_id"=>$id,
    			"attendence"=>$request->attendence[$id],
    			"att_date"=>$request->att_date,
    			"att_year"=>$request->att_year,
    			"month"=>$request->month,
    			"edit_date"=>date("d_m_y")
 

    		];
    	}

    	
    	}

    	DB::table('attendences')->insert($data);
    	 Session::put('msg','<div class="alert alert-success">
			  <strong>Success!</strong> Attendence Insert Successfully compalte.
			</div>');
		return redirect()->back();

    }

    public function allattendence(){

    	$all_att=DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();

    	return view('admin.attendence.allattendence',compact('all_att'));


    }


    public function editattendence($edit_date){

    	$date=DB::table('attendences')->where('edit_date',$edit_date)->first();

    	$data=DB::table('attendences')->join('employees','attendences.user_id','employees.id')
    	->select('employees.name','employees.photo','attendences.*')
    	->where('edit_date',$edit_date)->get();

    	return view('admin.attendence.edit_attendence',compact('data','date'));


    }


    public function updateattendence(Request $request){


    		foreach ($request->id as $id) {

    		$data=[

    			
    			"attendence"=>$request->attendence[$id],
    			"att_date"=>$request->att_date,
    			"att_year"=>$request->att_year,
    			"month"=>$request->month
    			
 

    		];


    		$attendence=Attendence::where(['att_date'=>$request->att_date,'id'=>$id])->first();
    		$attendence->Update($data);

    		 Session::put('msg','<div class="alert alert-success">
			  <strong>Success!</strong> Attendence Update Successfully compalte.
			</div>');
		return redirect()->route('all.attendence');
    	}

    	
    }


}
