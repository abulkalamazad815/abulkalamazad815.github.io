
@extends('admin.master')

@section('content')
<hr/>

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        <hr/>
        <div class="well">
            {!! Form::open(['url'=>'user/update','method'=>'POST','class'=>'form-horizontal','name'=>'editUserForm'])!!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$userById->name}}" class="form-control" name="name">
                    <input type="hidden" value="{{$userById->id}}" class="form-control" name="id">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">User Email</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$userById->email}}" class="form-control" name="email" rows="8">
                    <span class="text-danger">{{$errors->has('email')? $errors->first('email'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">User address</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="address" rows="4">{{$userById->address}}</textarea>
                    <span class="text-danger">{{$errors->has('address')? $errors->first('address'):''}}</span>
                </div>
            </div>
             <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">User password</label>
                <div class="col-sm-10">
                    <input type="password" value="{{$userById->password}}" class="form-control" name="password" rows="8">
                    <span class="text-danger">{{$errors->has('password')? $errors->first('password'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Confirm password</label>
                <div class="col-sm-10">
                    <input type="password" value="{{$userById->copassword}}" class="form-control" name="copassword" rows="8" >
                    <span class="text-danger">{{$errors->has('copassword')? $errors->first('copassword'):''}}</span>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btn" class="btn btn-success btn-block">Update User Info</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<script>
document.forms['editUserForm'].elements['email'].elements['address'].elements['password'].elements['copassword'].value={{$userById->email,$userById->address,$userById->password,$userById->copassword}}
</script>
@endsection



