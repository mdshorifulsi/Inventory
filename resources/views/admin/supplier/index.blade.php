@extends('admin_layouts')
@section('title','All Supplier')
@section('admin_content')



<div id="page-wrapper">

 <button type="button"  class="btn btn-outline btn-danger" ><a href="{{route ('add.supplier') }}"> + Add New Customer </a></button>
        <br>
        <br>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        ALl Custorer
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
                                   
                                        <th>supplier Name</th>
                                        <th>Email</th>
                                        <th>phone</th>
                                        <th>Photo</th>
                                        {{-- <th>Address</th> --}} 
                                        <th>shop name</th>
                                        <th>account holder</th>
                                        <th>account number</th>
                                        <th>Bank name</th>
                                        <th>Action</th>

                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($supplier as $row)


                                    <tr class="odd gradeX">
                                        <td>{{$row->id}}</td>
                                       <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->phone}}</td>
                                      {{--   <td>{{$row->Address}}</td> --}}
                                       
                                     
                                        
                                         <td><img src="{{ asset($row->photo)}}"style="width:200px;height:100px;"></td>
                                        
                                        
                                        <td>{{$row->shopname}}</td>
                                         <td>{{$row->account_holder}} Tk</td>
                                         <td>{{$row->account_number}}</td>
                                         <td>{{$row->bank_name}}</td>
                                         {{-- <td>{{$row->bank_branch}}</td> --}}
                                            

                                             

                                        <td>

                    

                                    
                                   {{--  <a class="btn btn-warning" href="">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                     
                                    </a> --}}

                                    <button class="btn btn-danger" type="button" onclick="deletetag({{ $row->id }})">
                                         <i class="glyphicon glyphicon-trash icon-white"></i>

                                    </button>

                                    <form id="delete-form-{{$row->id}}" action="{{route('delete.supplier',$row->id)}}"  method="PUT" style="display: none ; " >
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
