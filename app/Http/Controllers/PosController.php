<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;
use Session;

class PosController extends Controller
{
    



    public function index(){


    	  $product=DB::table('products')
            ->join('categories','products.cat_id','=','categories.id') 
            ->select('products.*','categories.cat_name')
            ->get();
            $customer=DB::table('customers')->get();
            $category=DB::table('categories')->get();
             
    		return view('admin.pos.index',compact('product','customer','category'));
    }
}
