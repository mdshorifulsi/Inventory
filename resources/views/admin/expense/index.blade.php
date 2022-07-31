@extends('admin_layouts')
@section('title','All Expense')
@section('admin_content')



<div id="page-wrapper">
	<br>
<button type="button"  class="btn btn btn-warning " ><a href="{{route ('add.expense') }}"> + Add New Expense </a></button>

                       	
      <button class="btn btn-success text-center"><a href="{{ route('today.expense') }}">To Day</a></button>

      <button class="btn btn-light  text-center"><a href="{{ route('monthly.expense') }}">This Month</a></button>

      <button class="btn btn-danger text-center"><a href="{{ route('yearly.expense') }}">This Year</a></button>
   
    
        <br>
        <br>
         
       
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        ALl Expense 
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
                                   
                                        <th>Expense Details</th>
                                        <th>Amount</th>  
                                        <th>Date</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        
                                      
                                     

                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expense as $row)


                                    <tr class="odd gradeX">
                                        <td>{{$row->id}}</td>
                                       <td>{{$row->details}}</td>
                                        <td>{{$row->amount}}</td>
                                        <td>{{$row->date}}</td>
                                        <td>{{$row->month}}</td> 
                                        
                                        <td>{{$row->year}}</td>
                                         

                                        <td>

                    

                                  {{--   
                                    <a class="btn btn-warning" href="">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                     
                                    </a>

                                    <a class="btn btn-danger" href="">
                                                                        
                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                       

                                    </a> --}}
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
