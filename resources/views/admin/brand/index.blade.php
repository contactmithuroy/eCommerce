@extends('admin.layout');

@section('page_title','Brand ')
@section('brand_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
              
              <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">All Brand </h3>
                    <a href="{{ route('brand.create') }}" class="btn btn-primary"> Add Brand</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                   <div class="row">                            <!-- form start -->
                        <div class=" col-md-12 table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Brand Name</th>
                                        <th>Brand Image</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{ $brand->id }}</td>
                                            <td>{{ $brand->brand }}</td>
                                            <td>
                                                <div style="max-width:70px; max-height:70px; over-flow:hidden">
                                                    <img src="{{ asset($brand->image) }}" class="img-fluid">
                                                </div>       
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('brand.edit',[$brand->id]) }}" class="btn btn-primary mr-2"> 
                                                    <i class="fas fa-edit"></i> </a>
                                                </a>
                                                <! status button !>
                                                @if(($brand->status) == 1)
                                                    <a href="{{ route('brand.status', [$brand->id,'0']) }}" class="btn btn-success mr-2"> 
                                                        <i class="fas fa-unlock"></i> </a>
                                                    </a>

                                                @elseif(($brand->status) == 0)
                                                    <a href="{{ route('brand.status', [$brand->id,'1']) }}" class="btn btn-warning mr-2"> 
                                                        <i class="fas fa-lock"></i> </a>
                                                    </a>
                                                @endif
                                
                                                <a href="{{ route('brand.delete',[$brand->id]) }}" class="btn btn-danger mr-2"> 
                                                    <i class="fas fa-trash"></i> </a>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                   </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>
@endsection
