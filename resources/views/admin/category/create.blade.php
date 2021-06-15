@extends('admin.layout');

@section('container')
{{-- <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('category.add') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.add') }}">Category List</a></li>
                    <li class="breadcrumb-item active">Create Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div> --}}
<!-- /.content-header -->

<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
                
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">Create Category </h3>
                    <a href="{{ route('category.index') }}" class="btn btn-primary"> Back To Category</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
                            <!-- form start -->
                            <form role="form" action="#"   method="post">
                                @csrf
                                <div class="card-body">
                                                                                
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input type="name" name="name" class="form-control" id="name" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter your description">

                                            
                                        </textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-headder d-flex justify-content-between">
                    <h2 class="title-1">Add Category </h2>
                    <a href="{{ route('category.add') }}">
                        <button class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>Add Category</button>
                    </a>
                </div>
                <div class="card-body">
                    <head>hi</head>
                </div>
            </div>

            <div class="table-responsive table--no-card m-b-30">
                
            </div>
        </div>
    </div> --}}
@endsection