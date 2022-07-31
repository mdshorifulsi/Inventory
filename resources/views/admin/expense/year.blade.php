@extends('admin_layouts')
@section('title','This Year')
@section('admin_content')



<div id="page-wrapper">


        <br>
<div class="row">
                <div class="col-lg-12">
                
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        {{ date("Y") }}  All Expense
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
                                      

                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($year as $row)


                                    <tr class="odd gradeX">
                                        <td>{{$row->id}}</td>
                                       <td>{{$row->details}}</td>
                                       <td>{{$row->amount}}</td>
                                      
                                   
                                             

                                        <td>

                    


                                 
                                    </td>

                                        
                                        
                                    </tr>

                                    @endforeach
                                    
                                </tbody>
                            </table>

                               @php 
                        $year=date("Y");
                    $yearxpense=DB::table('expenses')->where('year',$year)->sum('amount');

                    @endphp
                    

                    <h3 align="">{{ date("Y") }} Year All Expense = {{ $yearxpense }}Taka</h3>
                       
                      
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>

            @endsection
