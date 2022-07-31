<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Session;
class EmployeeController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

    	$employee=Employee::get();

    	return view('admin.employee.index',compact('employee'));
    }

    public function create(){


    	return view('admin.employee.create');
    }


    public function store(Request $request){

        $validatedData=$request->validate([

        'name' => 'required|max:300|min:2',
        'email' => 'required|unique:employees|max:255',
        'phone' => 'required|max:100|min:5',
        'Address' => 'required|max:300|min:2',
        'experience' => 'required|max:300|min:2',
        'salary' => 'required|max:100|min:2',
        'vacation' => 'required|max:100|min:2',
       
        ]);

    	$employee=new Employee;
    	$employee->name=$request->name;
    	$employee->email=$request->email;
    	$employee->phone=$request->phone;
    	$employee->Address=$request->Address;
    	$employee->experience=$request->experience;
    	$employee->salary=$request->salary;
    	$employee->vacation=$request->vacation;
    	


    		if($request->hasFile('photo')){

    		$file=$request->file('photo');
    		$name=rand(11111,99999).'.'.$file->getClientOriginalExtension();

    		$employee->photo=$request->file('photo')->move("storage/images",$name);	

    	}


    	$employee->save();
			   Session::put('msg','<div class="alert alert-success">
			  <strong>Success!</strong> Employee Data Insert Successfully compalte.
			</div>');
		return redirect()->back();
    }



    public function edit($id){

        $employee=Employee::find($id);

        return view('admin.employee.edit',compact('employee'));

    }


    public function update(Request $request,$id){
        $employee=Employee::find($id);

        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->phone=$request->phone;
        $employee->Address=$request->Address;
        $employee->experience=$request->experience;
        $employee->salary=$request->salary;
        $employee->vacation=$request->vacation;
        


            if($request->hasFile('photo')){

            $file=$request->file('photo');
            $name=rand(11111,99999).'.'.$file->getClientOriginalExtension();

            $employee->photo=$request->file('photo')->move("storage/images",$name); 

        }


        $employee->save();
               Session::put('msg','<div class="alert alert-success">
              <strong>Success!</strong> Employee Data Update Successfully compalte.
            </div>');
        return redirect()->route('all.employee');


    }


    public function destroy($id){



        $employee=Employee::find($id);
        $photo=$employee->photo;



        if(!is_null($employee)){
            
            $employee->delete();

        }



            unlink($photo);

        return redirect()->route('all.employee');


    }
}
