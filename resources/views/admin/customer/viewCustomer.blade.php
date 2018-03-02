@extends('admin.master')

@section('content')
    <hr/>

    <table class="table table-bordered table-hover">
        <tr>
            <th>CUSTOMER ID</th>
            <th>{{$customer->id}}</th>
        </tr>
        <tr>
            <th>CUSTOMER FirstName</th>
            <th>{{$customer->firstName}}</th>
        </tr>
        <tr>
            <th>CUSTOMER LastName</th>
            <th>{{$customer->lastName}}</th>
        </tr>
        <tr>
            <th>CUSTOMER EMAIL</th>
            <th>{{$customer->emailAddress}}</th>
        </tr>
       
    </table>
@endsection