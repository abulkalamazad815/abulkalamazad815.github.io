@extends('frontEnd.master')

@section('title')
HOME
@endsection

@section('mainContent')
$customerId = Session::get('em');
@endsection


