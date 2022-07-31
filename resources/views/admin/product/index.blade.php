@extends('admin_layouts')
@section('title','All Product')
@section('admin_content')



<div id="page-wrapper">

 <button type="button"  class="btn btn-outline btn-danger" ><a href="{{route('add.product') }}"> + Add New Product </a></button>
        <br>
        <br>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        ALl Product
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <p class="alert-success"><?php
                            $msg=Session::get('msg');
                        if($msg){
                            echo $msg;
                            Session::put('msg',null);
                        }else{

                        }
                        ?>
                        </p>
                             <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SL no</th>
                                   
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Supplier name</th>
                                        <th> Image</th>
                                        <th>product_code</th>
                                        {{-- <th>Address</th> --}} 
                                        {{-- <th>product_garage</th>
                                        <th>product_route</th> --}}
                                        <th>Buy date</th>
                                        <th>Expire date</th>
                                        <th>Buying price</th>
                                        <th>Selling price</th>
                                        <th>Action</th>

                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $row)



                                    <tr class="odd gradeX">
                                        <td>{{$row->id}}</td>
                                       <td>{{$row->product_name}}</td>
                                       <td>{{$row->cat_name}}</td>
                                       <td>{{$row->name}}</td>
                                       <td><img src="{{ asset($row->image)}}"style="width:200px;height:100px;"></td>
                                       <td>{{$row->product_code}}</td>
                                         <td>{{$row->buy_date}}</td>
                                       <td>{{$row->expire_date}}</td>

                                       <td>{{$row->selling_price}}</td>
                                        <td>{{$row->buying_price}}</td>


                                       
                                      {{--  <td>{{$row->name}}</td> --}}
                                      
                                        
                                      {{--   <td>{{$row->Address}}</td> --}}
                                       
                                     
                                        
                                         
                                        
                                        
                                       
                                         {{-- <td>{{$row->product_garage}} Tk</td>
                                         <td>{{$row->product_route}}</td> --}}
                                       
                                         
                                         
                                         {{-- <td>{{$row->bank_branch}}</td> --}}
                                            

                                             

                                        <td>

                    

                                    
                                    <a class="btn btn-warning" href="{{route ('edit.product',$row->id) }}">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                     
                                    </a>

                                   <button class="btn btn-danger" type="button" onclick="deletetag({{ $row->id }})">
                                         <i class="glyphicon glyphicon-trash icon-white"></i>

                                    </button>

                                    <form id="delete-form-{{$row->id}}" action="{{route('delete.product',$row->id)}}"  method="PUT" style="display: none ; " >
                                        @csrf
                                        @method('DELETE')
                                        
                                    </form>

                                    </td>

                                        
                                        
                                    </tr>

                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                      
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>

            @endsection
