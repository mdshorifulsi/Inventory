@extends('admin_layouts')
@section('title','All Success orders')
@section('admin_content')



<div id="page-wrapper">


<div class="row">
                <div class="col-lg-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Success orders
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
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Quentity</th>
                                        <th>Total Amount</th>
                                        <th>Payment</th>
                                        <th>order status</th>
                                  
                                    
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($success as $row)


                                    <tr class="odd gradeX">
                                        <td>{{$row->name}}</td>
                                       <td>{{$row->order_date}}</td>
                                       
                                       <td>{{$row->total_products}}</td>
                                       <td>{{$row->total}}</td>
                                       <td>{{$row->payment_status}}</td>
                                       <td>{{$row->order_status}}</td>
                                   
                                             

                                        <td>

                    

                                    
                                

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
