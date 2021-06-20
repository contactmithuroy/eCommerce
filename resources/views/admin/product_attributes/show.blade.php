@extends('admin.layout');
@section('page_title','Show Product')
@section('product_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">              
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title"> Product Details</h3>
                    <a href="{{ route('product.index') }}" class="btn btn-primary"> Back To Product</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-bordered ">
                    <tbody>
                        <tr>
                            <th style="width: 200px">Image</th>
                            <td>
                                <div style="max-width:300px; max-height:300px; over-flow:hidden; margin-center:auto">
                                    <img src="{{ asset($product->image) }}" class="img-fluid">
                                </div>    
                            </td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $product->name }}</td>
                        </tr>

                        <tr>
                            <th>Brand</th>
                            <td>{{ $product->brand }}</td>
                        </tr>

                        <tr>
                            <th>model</th>
                            <td>{{ $product->model }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                    
                        <tr>
                            <th>User</th>
                            <td>{{ $product->admin->name }}</td>
                        </tr>
                        <tr>
                            <th>Warranty</th>
                            <td>{{ $product->warranty }}</td>
                        </tr>
                        <tr>
                            <th>Keywords</th>
                            <td>{{ $product->keywords }}</td>
                        </tr>
                        <tr>
                            <th>Create Date</th>
                            <td>{{ $product->created_at->format('d M, Y') }}</td>
                        </tr>
                        <tr>
                            <th>Update Date</th>
                            <td>{{ $product->updated_at->format('d M, Y') }}</td>
                        </tr>
                        <tr>
                            <th>Technical Specification</th>
                            <td>{{ $product->technical_specification }}</td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                            <td>{!!$product->short_description!!}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $product->description !!}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
