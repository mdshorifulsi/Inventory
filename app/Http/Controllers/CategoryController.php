<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use DB;
class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

    	$category=Category::get();
    	return view('admin.category.index',compact('category'));
    }

    public function create(){


    	return view('admin.category.create');
    }

    public function store(Request $request){


    	$validatedData=$request->validate([

        'cat_name' => 'required|max:300|min:2',
       
        ]);



        $data=array();

        $data['cat_name']=$request->cat_name;

        DB::table('categories')->insert($data);
    	 Session::put('msg','<div class="alert alert-success">
			  <strong>Success!</strong> Category Data Insert Successfully compalte.
			</div>');
		return redirect()->back();

    }


    public function edit($id){

        $category=Category::find($id);

        return view('admin.category.edit',compact('category'));

       

    }


    public function update(Request $request,$id){


        $data=array();

        $data['cat_name']=$request->cat_name;

        DB::table('categories')->where('id',$id)->update($data);
        

         Session::put('msg','<div class="alert alert-success">
              <strong>Success!</strong> Category Update Insert Successfully compalte.
            </div>');

        return redirect()->route('all.category');
    }


  public function destroy($id){

        $category=Category::find($id);
       

        if(!is_null($category)){
            
            $category->delete();

        }



         

        return redirect()->route('all.category');


    }


}
