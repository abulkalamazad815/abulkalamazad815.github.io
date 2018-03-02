@extends('admin.master')
@section('content')
<hr/>

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        <hr/>
        <div class="well">

            {!! Form::open(['url'=>'product/addmoreimage','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data','name'=>'editProductForm'])!!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="productMultImage" accept="image/" multiple>
                    <input type="hidden" value="{{$productById->id}}" class="form-control" name="productId">
                    <span class="text-danger">{{$errors->has('productMultImage')? $errors->first('productMultImage'):''}}</span>
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
                    <button type="submit" name="btn" class="btn btn-success btn-block">Add Product More Image</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<script>
    
  
</script>
@endsection