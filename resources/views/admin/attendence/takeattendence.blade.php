@extends('admin_layouts')
@section('title','Attendence')
@section('admin_content')



<div id="page-wrapper">

 {{-- <button type="button"  class="btn btn-outline btn-danger" ><a href="{{ ('add.employee') }}"> + Add New Category </a></button> --}}
        <br>
        <br>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Take Attendence {{ date("l") }}
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
                                        <th>Photo</th>
                                        <th>phone</th>
                                        <th>Attendence</th>
                                      


                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('insert.attendence') }}" method="post">
                                        @csrf
                                    @foreach($employee as $row)


                                    <tr class="odd gradeX">
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
                                       
                                       
                                        
                                       
                                     
                                        
                                         <td><img src="{{ asset($row->photo)}}"style="width:100px;height:50px;"></td>
                                         <td>{{$row->phone}}</td>
                                         <input type="hidden" name="user_id[]" value="{{ $row->id }}">
                                         
                                        <td>
                                            
                                            <input type="radio" name="attendence[{{ $row->id }}]" value="present">Present
                                            <input type="radio" name="attendence[{{ $row->id }}]" value="Absence">Absence


                                        </td>

                                         <input type="hidden" name="att_date" value="{{ date("d/m/y") }}">

                                         <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                         <input type="hidden" name="month" value="{{ date("F") }}">
                                            

                                        
                                        
                                        
                                    </tr>

                                    @endforeach

                                    
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-info pull-right">Take Attendence</button>

                            </form>
                            <!-- /.table-responsive -->
                      
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>

            @endsection
