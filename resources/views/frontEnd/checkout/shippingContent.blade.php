@extends('frontEnd.master')

@section('title')
Shipping
@endsection

@section('mainContent')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello <b>{{ $customerById->lastName }}</b>. You have to give us product shipping information to complete your valuable order. If your product billing information & shipping information are same then just press on save shipping info button
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Shipping Form </h3>
        <hr/>
        <div class="well box box-primary">
            {!! Form::open(['url'=>'/checkout/save-shipping', 'method'=>'POST', 'name'=>'shippingForm']) !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="fullName" value="{{ $customerById->firstName.' '.$customerById->lastName}}" class="form-control" placeholder="First Name">
                    <span class="text-danger">{{$errors->has('fullName')? $errors->first('fullName'):''}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" value="{{ $customerById->emailAddress }}" name="emailAddress" class="form-control" placeholder="Email Address">
                    <span class="text-danger">{{$errors->has('emailAddress')? $errors->first('emailAddress'):''}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea name="address" class="form-control" placeholder="Enter Address">{{ $customerById->address }}</textarea>
                    <span class="text-danger">{{$errors->has('address')? $errors->first('address'):''}}</span>
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="number" name="phoneNumber" value="{{ $customerById->phoneNumber }}" class="form-control" placeholder="Enter Phone Number">
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
                    <span class="text-danger">{{$errors->has('districtName')? $errors->first('districtName'):''}}</span>
                </div>
                <div id="map" style="width:1100px;height:200px">My map will go here</div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="margin-top: 30px;">
                <button type="submit" class="btn btn-success btn-block">Save Shipping Info</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
    <script>
        document.forms['shippingForm'].elements['districtName'].value ='{{ $customerById->districtName }}';

        function myMap() {
    var mapOptions = {
        center: new google.maps.LatLng(23.886003, 90.1330249),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.HYBRID
    }
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMa0RAyAbfzlxxrrQ2q38jD64DlByYIVk&callback=myMap"></script>
@endsection