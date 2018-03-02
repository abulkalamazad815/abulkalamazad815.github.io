@extends('admin.master')

@section('content')
<hr/>
<h3 class="text-center text-success">{{Session::get('message')}}</h3>
<hr/>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>IMAGE</th>
                            <th>DESCRIPTION</th>
                            <th>PUBLICATION STATUS</th>
                            <th>CREATED DATE</th>
                            <th>UPDATED DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($sliderSecondarys as $sliderSecondary)
                        <tr class="odd gradeX">
                            <td>{{$sliderSecondary->id}}</td>
                            <td>{{$sliderSecondary->slider2Image}}</td>
                            <td>{{$sliderSecondary->sliderDescription}}</td>
                            <td>{{$sliderSecondary->publicationStatus ==1 ? 'Published':'Unpublished'}}</td>
                            <td class="center">{{$sliderSecondary->created_at}}</td>
                            <td class="center">{{$sliderSecondary->updated_at}}</td>
                            <td>
                                <a href="{{url('/slider2/edit/'.$sliderSecondary->id)}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a> 
                                <a href="{{url('/slider2/delete/'.$sliderSecondary->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This');">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a> 
                            </td>
                        </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection