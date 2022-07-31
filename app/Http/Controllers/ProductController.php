<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\Category;
use Session;
use DB;

class ProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){


         $product=DB::table('products')

             ->join('categories','products.cat_id','=','categories.id')

             ->join('suppliers','products.sup_id','=','suppliers.id')
            
            
            ->select('products.*','categories.cat_name','suppliers.name')
             
           

    	->get();

    	return view('admin.product.index',compact('product'));
    }


    public function create(){


    	return view('admin.product.create');
    }


    public function store(Request $request){


    	$data=array();
    	$data['product_name']=$request->product_name;
    	$data['cat_id']=$request->cat_id;
    	$data['sup_id']=$request->sup_id;
    	$data['product_code']=$request->product_code;
    	$data['product_garage']=$request->product_garage;
    	$data['product_route']=$request->product_route;
    	$data['buy_date']=$request->buy_date;
    	$data['expire_date']=$request->expire_date;
    	$data['buying_price']=$request->buying_price;
    	$data['selling_price']=$request->selling_price;


		if($request->hasFile('image')){

    		$file=$request->file('image');
    		$name=rand(11111,99999).'.'.$file->getClientOriginalExtension();

    		$data['image']=$request->file('image')->move("storage/images",$name);	

    	}

    	DB::table('products')->insert($data);
    	 Session::put('msg','<div class="alert alert-success">
			  <strong>Success!</strong> product Data Insert Successfully compalte.
			</div>');
		return redirect()->back();



    }


    public function edit($id){

         $product=Product::find($id);

         return view('admin.product.edit',compact('product'));



    }


    public function update(Request $request,$id){


        $data=array();
        $data['product_name']=$request->product_name;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_code']=$request->product_code;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;


        if($request->hasFile('image')){

            $file=$request->file('image');
            $name=rand(11111,99999).'.'.$file->getClientOriginalExtension();

            $data['image']=$request->file('image')->move("storage/images",$name);   

        }

        DB::table('products')
        ->where('id',$id)
        ->update($data);
         Session::put('msg','<div class="alert alert-success">
              <strong>Success!</strong> product Update  Successfully compalte.
            </div>');
        return redirect()->back();
    }

    public function destroy($id){

          $product=Product::find($id);
        $image=$product->image;

        if(!is_null($product)){
            
            $product->delete();

        }



            unlink($image);

        return redirect()->route('all.product');



    }
}
