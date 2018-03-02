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
                          @foreach($sliderPrimaris as $sliderPrimari)
                        <tr class="odd gradeX">
                            <td>{{$sliderPrimari->id}}</td>
                            <td>{{$sliderPrimari->slider1Image}}</td>
                            <td>{{$sliderPrimari->sliderDescription}}</td>
                            <td>{{$sliderPrimari->publicationStatus ==1 ? 'Published':'Unpublished'}}</td>
                            <td class="center">{{$sliderPrimari->created_at}}</td>
                            <td class="center">{{$sliderPrimari->updated_at}}</td>
                            <td>
                                <a href="{{url('/slider/edit/'.$sliderPrimari->id)}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a> 
                                <a href="{{url('/slider/delete/'.$sliderPrimari->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This');">
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