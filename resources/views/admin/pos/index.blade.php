@extends('admin_layouts')

@section('title','Point of order')
@section('admin_content')


<div id="page-wrapper">
            <br>
                 <p class="alert-success"><?php
                            $msg=Session::get('msg');
                        if($msg){
                            echo $msg;
                            Session::put('msg',null);
                        }else{

                        }
                        ?>
            <div class="row">
                <div class="col-sm-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                             
                                <div class="col-xs-9 text-left">
                                    <div class="huge">Point of sele</div>
                                    <div>{{ date("l-F-Y") }}</div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                
            </div>



        {{-- worl start --}}
            @foreach($category as $row)
 

                <button class="btn btn-warning"> <a href=""> {{ $row->cat_name }} </a></button>

                @endforeach
              
                <br>
                <br>

                              <button class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                Add New customer
                            </button>

                            <br>
                            <br>
                
        <div class="row">


        <div class="col-lg-6">

                    <div class="panel panel-warning">


                         
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                        </div>
                                        <div class="modal-body">


                                       <form role="form" action="{{route('store.customer') }}" method="post" enctype="multipart/form-data">
                                        @csrf


                                       <div class="form-group">
                                            <label>Customer name</label>
                                            <input class="form-control" name="name">
                                          
                                        </div> 


                                         <div class="form-group">
                                            <label>Customer email</label>
                                            <input class="form-control" type="email" name="email">
                                          
                                        </div>


                                 <div class="form-group">
                                            <label>phone Number</label>
                                            <input class="form-control" name="phone">
                                          
                                        </div>

                                         <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" name="Address">
                                          
                                        </div>

                                         <div class="form-group">
                                            <label>Shop name</label>
                                            <input class="form-control" name="shopname">
                                          
                                        </div>


                                        

                                        <div class="form-group">
                                            <label>photo</label>
                                            <input type="file" name="photo">
                                        </div>

                                         <div class="form-group">
                                            <label>Account holder</label>
                                            <input class="form-control" name="account_holder">
                                          
                                        </div>

                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input class="form-control" name="account_number">
                                          
                                        </div>


                                         <div class="form-group">
                                            <label>Bank name</label>
                                            <input class="form-control" name="bank_name">
                                          
                                        </div>

                                         <div class="form-group">
                                            <label>Bank branch</label>
                                            <input class="form-control" name="bank_branch">
                                          
                                        </div>

                                        

                                       
                                        <button type="submit" class="btn btn-danger">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>

                                        </div>
                                     
                                    </div>
                                   
                                </div>
                               
                            </div>
                   
                  

                         <div class="panel-heading">
                         
                        </div>




            <div class="panel-body">
                <table class="table" border="1px danger">
                    <thead class="bg-info">
                        <tr class="text-white">
                          <th>Name</th>
                          <th>Qty</th>
                          <th>Single price</th>
                          <th>Sub total</th>
                          <th> Action</th>
                          </tr>
                      </thead>
                      @php
                      $cart_product=Cart::content();
                      @endphp
                      <tbody>
                        @foreach($cart_product as $add_pro)
                          <tr>
                              <td>{{ $add_pro->name }}</td>
                              <td>
                                <form action="{{ route('update.cart',$add_pro->rowId) }}" method="post">
                                    @csrf
                                  <input type="Number" name="qty" value="{{ $add_pro->qty }}" style="width: 50px;">
                                  <button type="submit" class="btn btn-sm btn-success" style="margin-top:0px 20px 10px 5px">update</button>
                                  </form>
                              </td>
                              <td>{{ $add_pro->price }}</td>
                              <td>{{ $add_pro->price*$add_pro->qty}}</td>
                              
                            

                                <td><a href="{{ route('remove.cart',$add_pro->rowId) }}"><i class="glyphicon glyphicon-trash icon-white"></i></a></button></td>

                            </button>

                          </tr>
                          @endforeach
                      </tbody>
                  </table>


                    <div class="panel panel-info">
                        <div class="panel-heading">
                      <h4>Quentity: {{ Cart::count() }}</h4>
                      <h4>Subtotal: {{ Cart::subtotal() }}Tk</h4>
                      <h4>15% Vat:  {{ Cart::tax() }}Tk</h4>
                    
                      <hr style="height:1px; border:none; color:#000; background-color:#000; width:100%; text-align:center; margin: 0 auto;">

                      <h3>Total = {{ Cart::total() }} Tk</h3>
                      <br>
                                

                      <form action="{{ route('create.invoice') }}" method="post">
                        @csrf

              


                           
                               <br>
                                  <br>
                             @php
                             $customer=DB::table('customers')->get();
                             @endphp
                                            <select class="form-control" name="cus_id">
                                                <option>Select Customer</option>
                                              
                                               
        
                                                @foreach($customer as $cus)
                                                
                                                <option value="{{$cus->id}}">{{$cus->name}}</option>
                                              @endforeach
                                            </select>


                            <br>
                            <br>

                    
                      <button class="btn btn-success">Create Invoice</button>
                        
                        </form>
                        </div>
                        <a href="#">
                       
                        </a>
                    
                </div>

            
                            
                        </div>

                       
                        <!-- <div class="panel-footer">
                            Panel Footer
                        </div> -->
                    </div>
                    <!-- /.col-lg-4 -->
                </div>




    

        <div class="col-lg-6">
                    <div class="panel panel-green">
                      {{--   <div class="panel-heading">

                        </div> --}}
                        <div class="panel-body">

   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                  
               
                    <th>Image</th>
                    <th>Product name</th>
                    <th>Category Name</th>
                    <th>Add to Cart</th>
                </tr>
            </thead>

            <tbody>
                @foreach($product as $row)
                <form action="{{route ('add.cart') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$row->id}}">
                    <input type="hidden" name="name" value="{{$row->product_name}}">
                    <input type="hidden" name="qty" value="1">
                    <input type="hidden" name="price" value="{{$row->selling_price}}">
                
                    <tr class="odd gradeX">
                        <td>
                          
                            <img src="{{ asset($row->image)}}"style="width:100px;height:100px;"> 
                        </td>
                        <td>{{$row->product_name}}</td>
                        <td>{{$row->cat_name}}</td>
                        <td><button type="submit" class="btn btn-info btn-sm" style="font-size: 20px" title="Add your Cart"><i class="glyphicon-plus "></i></button></td>
                        
                    </tr>

                    </form>

                @endforeach
                
            </tbody>
    </table>
                        </div>
                        <div class="panel-footer">
                            

                        </div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                
            </div>


                </div>

        </div>

@endsection