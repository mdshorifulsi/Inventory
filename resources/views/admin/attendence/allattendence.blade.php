@extends('admin_layouts')
@section('title','All Attendence')
@section('admin_content')



<div id="page-wrapper">


        <br>
        <br>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        ALl Attendence
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
                                   
                                        <th>Name</th>
                                      
                                        <th>Action</th>

                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sl=1;
                                    @endphp
                                    @foreach($all_att as $row)


                                    <tr class="odd gradeX">
                                        <td>{{$sl++}}</td>
                                       <td>{{$row->edit_date}}</td>
                                   
                                             

                                        <td>

                    

                                    
                                    <a class="btn btn-warning" href="{{ route('edit.attendence',$row->edit_date) }}">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                     
                                    </a>

                                   {{--  <a class="btn btn-danger" href="">
                                                                        
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
