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
                            <th>CUSTOMER ID</th>
                            <th>CUSTOMER FirstName</th>
                            <th>CUSTOMER LastName</th>
                            <th>CUSTOMER EMAIL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->firstName}}</td>
                            <td>{{$customer->lastName}}</td>
                            <td>{{$customer->emailAddress}}</td>
                            <td>
                                <a href="{{url('/customer/view/'.$customer->id)}}" class="btn btn-info" title="Customer View">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </a>
                                 <a href="{{url('/customer/delete/'.$customer->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This');">
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

