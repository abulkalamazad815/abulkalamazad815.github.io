@extends('admin.master')

@section('content')
<hr/>

<div class="row">
    <div class="col-lg-12">
        <hr/>
        <div class="well">
            {!! Form::open(['url'=>'slider/update','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data','name'=>'editSliderForm'])!!}
            
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="slider1Image" accept="image/" multiple>
                     <input type="hidden" value="{{$sliderById->id}}" class="form-control" name="id">
                    <img src="{{asset($sliderById->slider1Image)}}" alt="" height="150" width="150">
                    <span class="text-danger">{{$errors->has('slider1Image')? $errors->first('slider1Image'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Category Description</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="sliderDescription" rows="8">{{$sliderById->sliderDescription}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Publication Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="publicationStatus">
                        <option>Select Publication Status</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="btn" class="btn btn-success btn-block" onclick="return confirm('Are You Sure To Update This');">Update Category Info</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<script>
document.forms['editSliderForm'].elements['publicationStatus'].value={{$sliderById->publicationStatus}}
</script>
@endsection
