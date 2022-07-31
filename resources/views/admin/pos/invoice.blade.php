@extends('admin_layouts')
@section('title','Invoice')
@section('admin_content')


<div id="page-wrapper">


<div class="row">
    <h1>Invoce</h1>

    <div class="col-lg-6">
         <div class="panel panel-info">
               <div class="panel-footer">    
	                Name:{{ $cus->name }}<br>
	                Shop Name:{{ $cus->shopname }}<br>
	                Address:{{ $cus->Address }}<br>
	                Phone number:{{ $cus->phone }}<br>
	                Email:{{ $cus->email }}<br>
               </div>       
         </div>           
    </div>

    <div class="col-lg-6">
         <div class="panel panel-info">
              <div class="panel-footer">          
            	Order Date: {{ date("D.M.Y") }}
            	<br>Order Id:
            	<br>Order Status:
            	<br>
            	<br>
            	<br>
                  
               </div>        
         </div>
    </div>



    <div class="col-lg-10">
    	<div class="panel panel-info">
    		<div class="panel-footer">
    			<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    				<thead>
    					<tr>
	                        <th>SL no</th>
	                        <th>Item</th>
	                        <th>Quentity</th>
	                        <th>Unit Cost</th>
	                        {{-- <th>Address</th> --}} 
	                        <th>SubTotal</th>             
                        </tr>
                    </thead>
                    <tbody>

                    	@php
                    	$sl=1;
                    	@endphp
                        @foreach($contents as $contents)

                            <tr class="odd gradeX">
                                <td>{{ $sl++ }}</td>
                                <td>{{  $contents->name }}</td>
                                <td>{{  $contents->qty }}</td>
                                <td>{{  $contents->price }}</td>
                                <td>{{  $contents->price*$contents->qty}}</td>     
                            </tr>

                        @endforeach
                                    
                    </tbody>
                </table>

                     <h5 align="right">Quentity: {{ Cart::count() }}</h5>
                     <h5 align="right">Subtotal: {{ Cart::subtotal() }}Tk</h5>
                     <h5 align="right">Vat:  {{ Cart::tax() }}Tk</h5>
                     <hr>
                     <h4 align="right">Total = {{ Cart::total() }} Tk</h4>
                   
            </div>
                        
<button class="btn btn-primary hidden-print pull-right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>

<button class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">
                               submit
                            </button>


     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Invoice Of {{ $cus->name }}</h4>
                    <h4 align="right">Total = {{ Cart::total() }} Tk</h4>
                </div>
                <div class="modal-body">


               <form role="form" action="{{route ('invoice') }}" method="post" enctype="multipart/form-data">
                @csrf


<div class="form-group">
                   <label>Payment</label>
                    <select class="form-control" name="payment_status">
                        <option>Payment</option>
                      
                        <option value="handcash">Handcash</option>
                        <option value="chaquk">Chaquk</option>
                        <option value="due">Due</option>
                  
                    </select>
                </div>
   <div class="form-group">
            <label>Pay</label>
            <input class="form-control" name="pay">
          
        </div> 
 <div class="form-group">
                    <label>Due</label>
                    <input class="form-control" name="due">
                  
                </div> 

<input type="hidden" name="customer_id" value="{{ $cus->id }}">
<input type="hidden" name="order_date" value="{{ date("d.m.y")}}">
<input type="hidden" name="order_status" value="pending">
<input type="hidden" name="total_products" value="{{ Cart::count() }}">
<input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
<input type="hidden" name="total" value="{{ Cart::total()}}">
<input type="hidden" name="vat" value="{{ Cart::tax()}}">

               



                

              
                

               
                <button type="submit" class="btn btn-danger">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>
            </form>

                </div>
             
            </div>
           
        </div>
       
    </div>
            
            </div>              
        </div>
    </div>
                 
               

   


@endsection