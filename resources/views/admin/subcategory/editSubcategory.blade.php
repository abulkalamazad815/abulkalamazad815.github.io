@extends('admin.master')

@section('content')
<hr/>

<div class="row">
    <div class="col-lg-12">
        <hr/>
        <div class="well">
            {!! Form::open(['url'=>'subcategory/update','method'=>'POST','class'=>'form-horizontal','name'=>'editSubcategoryForm'])!!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Subcategory Name</label>
                <div class="col-sm-10">
                    <input type="text" value="{{$subcategoryById->subcategoryName}}" class="form-control" name="subcategoryName">
                    <input type="hidden" value="{{$subcategoryById->id}}" class="form-control" name="id">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="categoryId">
                        <option>Select Category Name</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->categoryName}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Subcategory Description</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="subcategoryDescription" rows="8">{{$subcategoryById->subcategoryDescription}}</textarea>
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
                    <button type="submit" name="btn" class="btn btn-success btn-block" onclick="return confirm('Are You Sure To Update This');">Update Subcategory Info</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<script>
document.forms['editSubcategoryForm'].elements['publicationStatus'].value={{$subcategoryById->publicationStatus}}
 document.forms['editSubcategoryForm'].elements['categoryId'].value = {{$subcategoryById -> categoryId}}
</script>
@endsection
