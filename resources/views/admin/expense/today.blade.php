@extends('admin_layouts')
@section('title','To Day Expense ')
@section('admin_content')



<div id="page-wrapper">


        <br>
<div class="row">
                <div class="col-lg-12">
                    @php 
                        $date=date("d/m/y");
                        $todayexpense=DB::table('expenses')->where('date',$date)->sum('amount');

                    @endphp
                      <h4 align="center">To Day Total = {{ $todayexpense }}Tk</h4>
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        {{ date("d-m-y") }}  ALl Expense  
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
                                   
                                        <th>Details</th>
                                        <th>Amount</th>
                                      
                                        <th>Action</th>

                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($today as $row)


                                    <tr class="odd gradeX">
                                        <td>{{$row->id}}</td>
                                       <td>{{$row->details}}</td>
                                       <td>{{$row->amount}}</td>
                                      
                                   
                                             

                                        <td>

                    

                                    
                                    <a class="btn btn-warning" href="">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                     
                                    </a>

                                    <a class="btn btn-danger" href="">
                                                                        
                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                       

                                    </a>
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
