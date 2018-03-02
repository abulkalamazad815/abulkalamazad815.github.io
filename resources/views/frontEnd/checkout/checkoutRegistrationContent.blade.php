@extends('frontEnd.master')

@section('title')
CHECKOUT REGISTRATION
@endsection

@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">You have to login to complete your valuable order. If you are registered then please Sign In first.</div>
        </div>
    </div>
</div>
<div class="container">
	    <div class="row">
	    <div class="col-lg-6">
	        <h3 class="text-center">Registration Form Here</h3>
	        <hr/>
	        <div class="well box box-primary">
	            {!! Form::open(['url'=>'/checkout/sign-up', 'method'=>'POST',]) !!}
	            <div class="box-body">
	                <div class="form-group">
	                    <label for="exampleInputEmail1">First Name</label>
	                    <input type="text" name="firstName" class="form-control" placeholder="First Name">
	                    <span class="text-danger">{{$errors->has('firstName')? $errors->first('firstName'):''}}</span>
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Last Name</label>
	                    <input type="text" name="lastName" class="form-control" placeholder="Last Name">
	                    <span class="text-danger">{{$errors->has('lastName')? $errors->first('lastName'):''}}</span>
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputEmail1">Email Address</label>
	                    <input type="email" name="emailAddress" class="form-control" placeholder="Email Address">
	                    <span class="text-danger">{{$errors->has('emailAddress')? $errors->first('emailAddress'):''}}</span>
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Password</label>
	                    <input type="password" name="password" class="form-control" placeholder="Password">
	                    <span class="text-danger">{{$errors->has('password')? $errors->first('password'):''}}</span>
	                </div>
	                <div class="form-group">
	                    <label for="exampleInputPassword1">Confirm Password</label>
	                    <input type="password" name="confirm_password" class="form-control" placeholder="Password">
	                    <span class="text-danger">{{$errors->has('confirm_password')? $errors->first('confirm_password'):''}}</span>
	                </div>
	               <div class="sign-in">
	                     <label for="exampleInputPassword1">Captcha</label>
	                    <div class="captcha">
	                      <span>{!! captcha_img('flat') !!}</span>
	                      <button type="button" class="btn btn-success btn-refresh"><i class="fas fa-sync"></i></button>
	                    </div>
	                      <input id="captcha" type="text" placeholder="Enter Captcha" class="form-control" name="captcha">
	                    <span class="text-danger">{{$errors->has('captcha')? $errors->first('captcha'):''}}</span>
	                </div> 
	                <!-- <div class="form-group">
	                    <label for="exampleInputEmail1">Address</label>
	                    <textarea name="address" class="form-control" placeholder="Enter Address"></textarea>
	                </div>
	                 <div class="form-group">
	                    <label for="exampleInputEmail1">Phone Number</label>
	                    <input type="number" name="phoneNumber" class="form-control" placeholder="Enter Phone Number">
	                    <span class="text-danger">{{$errors->has('phoneNumber')? $errors->first('phoneNumber'):''}}</span>
	                </div>
	                <div class="form-group">
	                    <label>Dist. Name</label>
	                    <select class="form-control" name="districtName">
	                        <option>---Select District Name---</option>
	                        <option value="Dhaka">Dhaka</option>
	                        <option value="nar">Narayanganj</option>
	                        <option value="Savar">Savar</option>
	                        <option value="Barisal">Barisal</option>
	                        <option value="Gazipur">Gazipur</option>
	                        <option value="Comilla">Comilla</option>
	                    </select>
	                </div> -->
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer" style="margin-top: 20px;">
	                <button type="submit" class="btn btn-warning btn-block">SignUp</button>
	            </div>
	            {!! Form::close() !!}
	        </div>
	    </div>
	</div>
</div>
<script type="text/javascript">
      
/*refresh captcha*/
        $(".btn-refresh").click(function(){
          $.ajax({
             type:'GET',
             url:'/E_medicine_shop/refresh_captcha',
             success:function(data){
                $(".captcha span").html(data.captcha);
             }
          });
        });


/*form validation*/
 
</script>
@endsection