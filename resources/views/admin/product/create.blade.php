@extends('admin_layouts')
@section('title','add Product')
@section('admin_content')



<div id="page-wrapper">

    
 <div class="row">
                {{-- <div class="col-lg-12">
                    <h1 class="page-header">Employee</h1>
                </div> --}}
                <!-- /.col-lg-12 -->
            </div>
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4> Add Product</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <p class="alert-success">
                                    	<?php
                            $msg=Session::get('msg');
                        if($msg){
                            echo $msg;
                            Session::put('msg',null);
                        }else{

                        }

                        ?>
                        </p>

                                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                                     <form role="form" action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                                        @csrf


                                       <div class="form-group">
                                            <label>Product name</label>
                                            <input class="form-control" name="product_name">
                                          
                                        </div> 

                                         <div class="form-group">
                                            <label>Category Name</label>
                                            <select class="form-control" name="cat_id">
                                                <option>Category Name</option>
                                                @php 
                                                	$category=App\Category::get();

                                                @endphp
                                               
		
                                                @foreach($category as $row)
                                                
                                                <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                              @endforeach
                                            </select>
                                        </div>

                                         <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image">
                                        </div>

                                         <div class="form-group">
                                            <label>Supplier Name</label>
                                            <select class="form-control" name="sup_id">
                                                <option>Supplier Name</option>
                                                @php 
                                                	$supplier=App\Supplier::get();

                                                @endphp
                                               
		
                                                @foreach($supplier as $row)
                                                
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                              @endforeach
                                            </select>
                                        </div>





                                        <div class="form-group">
                                            <label>product code</label>
                                            <input class="form-control" name="product_code">
                                          
                                        </div> 

                                         <div class="form-group">
                                            <label>Product garage</label>
                                            <input class="form-control" name="product_garage">
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Product Route</label>
                                            <input class="form-control" name="product_route">
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Buy date</label>
                                            <input class="form-control" name="buy_date" class="date" type="date">
                                          
                                        </div> 

                                         <div class="form-group">
                                            <label>Expire date</label>
                                            <input class="form-control" name="expire_date" type="date">
                                          
                                        </div> 


                                        <div class="form-group">
                                            <label>Buying price</label>
                                            <input class="form-control" name="buying_price">
                                          
                                        </div> 
                                        
                                          <div class="form-group">
                                            <label>Selling price</label>
                                            <input class="form-control" name="selling_price">
                                          
                                        </div> 



                                        


                                        

                                       
                                        <button type="submit" class="btn btn-danger">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>


                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

        
        </div>
  @endsection