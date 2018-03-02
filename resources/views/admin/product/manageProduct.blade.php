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
                        <thead style="font-size: 12px;">
                        <tr>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Subcategory Name</th>
                            <th>Manufacturer Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Publication Status</th>
                            <th>MORE IMG</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 12px;">
                        @foreach($products as $product)
                            <tr class="odd gradeX">
                                <td>{{$product->productName}}</td>
                                <td>{{$product->categoryName}}</td>
                                <td>{{$product->subcategoryName}}</td>
                                <td>{{$product->manufacturerName}}</td>
                                <td>TK:{{$product->productPrice}}</td>
                                <td>{{$product->productQuantity}}</td>
                                <td>{{$product->publicationStatus ==1 ? 'Published':'Unpublished'}}</td>
                                <td>
                                    <a href="{{url('/product/moreimage/'.$product->id)}}" class="btn btn-success" title="Add Product Image">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                </td>

                                <td>
                                    <a href="{{url('/product/view/'.$product->id)}}" class="btn btn-info" title="Product View">
                                        <span class="glyphicon glyphicon-info-sign"></span>
                                    </a>
                                    <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-success" title="Product Edit">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-danger" title="Product Delete" onclick="return confirm('Are You Sure To Delete This');">
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