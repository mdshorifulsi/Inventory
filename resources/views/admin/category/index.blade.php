@extends('admin_layouts')
@section('title','All Category')
@section('admin_content')



<div id="page-wrapper">

 <button type="button"  class="btn btn-outline btn-danger" ><a href="{{route('store.category') }}"> + Add New Category </a></button>
        <br>
        <br>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        ALl Category
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
                                   
                                        <th>Category Name</th>
                                      
                                        <th>Action</th>

                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category as $row)


                                    <tr class="odd gradeX">
                                        <td>{{$row->id}}</td>
                                       <td>{{$row->cat_name}}</td>
                                   
                                             

                                        <td>

                    

                                    
                                    <a class="btn btn-warning" href="{{route ('edit.category',$row->id) }}">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                     
                                    </a>

                                     <button class="btn btn-danger" type="button" onclick="deletetag({{ $row->id }})">
                                         <i class="glyphicon glyphicon-trash icon-white"></i>

                                    </button>

                                    <form id="delete-form-{{$row->id}}" action="{{route('delete.category',$row->id)}}"  method="PUT" style="display: none ; " >
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
