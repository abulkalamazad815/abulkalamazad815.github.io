@extends('frontEnd.master')

@section('title')
CHECKOUT LOGIN
@endsection

@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">You have to login to complete your valuable order. If you are not registered then please Sign Up first.</div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
     <div class="col-lg-6">
        <h3 class="text-center">Login Form Here</h3>
        <hr/>
        <div class="well box box-primary">
            {!! Form::open(['url'=>'/checkout/login', 'method'=>'POST',]) !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" name="cuemailAddress" class="form-control" placeholder="Email Address" required="">
                    <span class="text-danger">{{$errors->has('cuemailAddress')? $errors->first('cuemailAddress'):''}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="cupassword" class="form-control" placeholder="Password" required="">
                    <span class="text-danger">{{$errors->has('cupassword')? $errors->first('cupassword'):''}}</span>
                </div>
                <div class="forgot-password1" style="margin-bottom: 20px;">
                    <label class="inline2">
                        <input type="checkbox" name="rememberme7">
                        Remember me! <em>*</em>
                    </label>
                    <a class="forgot-password" style="float: right;" href="#">Forgot Your password?</a>
                </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-warning btn-block">Login</button>
            </div>
        </div>
        {!! Form::close() !!}

        </div>
    </div>
    <div class="col-lg-6">
        <h3 class="text-center">SignUp Form Here</h3>
        <hr/>
        <div class="SignUp">
            <a href="{{ url('/checkoutRegistration') }}" type="button">Go To SignUp</a>
        </div>
        <div class="tb-info-login ">
            <h5 class="tb-title4" style="font-size: 22px;margin-bottom: 10px;">SignUp today and you'll be able to:</h5>
            <ol>
                <li>Speed your way through the checkout.</li>
                <li>Track your orders easily.</li>
                <li>Keep a record of all your purchases.</li>
            </ol>
        </div>
    </div>
</div>
<style type="text/css">
    .SignUp {
        text-align: center;
    }
    .SignUp a {
        border: 1px solid;
        position: relative;
        padding: 13px 21px;
        background: #fda30c;
        color: #fff;
        text-decoration: none;
        font-size: 22px;
    }
    .tb-info-login {
            margin-top: 54px;
            margin-left: 87px;
            font-size: 18px;
        }
</style>
@endsection