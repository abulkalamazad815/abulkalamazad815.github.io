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
                            <th>USER ID</th>
                            <th>USER NAME</th>
                            <th>EMAIL</th>
                            <th>ADDRESS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                <a href="{{url('/user/edit/'.$user->id)}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                 <a href="{{url('/user/delete/'.$user->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This');">
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

