@extends('admin_layouts')
@section('title','This Month')
@section('admin_content')



<div id="page-wrapper">


        <br>
<div class="row">
                <div class="col-lg-12">
                
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        {{ date("F") }}  All Expense
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
                                    @foreach($month as $row)


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
                        $month=date("F");
                    $monthexpense=DB::table('expenses')->where('month',$month)->sum('amount');

                    @endphp
                    

                    <h4 align="">{{ date("F") }} Month All Expense = {{ $monthexpense }}Taka</h4>
                       
                      
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>

            @endsection
