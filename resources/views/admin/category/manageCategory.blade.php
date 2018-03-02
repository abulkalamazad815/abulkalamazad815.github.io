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
                            <th>NAME</th>
                            <!-- <th>IMAGE</th> -->
                            <th>DESCREPTION</th>
                            <th>PUBLICATION STATUS</th>
                            <th>CREATED DATE</th>
                            <th>UPDATED DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($categories as $category)
                        <tr class="odd gradeX">
                            <td>{{$category->id}}</td>
                            <td>{{$category->categoryName}}</td>
                            <!-- <td>{{$category->categoryImage}}</td> -->
                            <td>{{$category->categoryDescription}}</td>
                            <td>{{$category->publicationStatus ==1 ? 'Published':'Unpublished'}}</td>
                            <td class="center">{{$category->created_at}}</td>
                            <td class="center">{{$category->updated_at}}</td>
                            <td>
                                <a href="{{url('/category/edit/'.$category->id)}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a> 
                                <a href="{{url('/category/delete/'.$category->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This');">
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