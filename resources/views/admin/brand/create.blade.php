@extends('admin.layout');
@section('page_title','Add Brand')
@section('brand_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
                
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">Create Brand </h3>
                    <a href="{{ route('brand.index') }}" class="btn btn-primary"> Back To Brand</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
                            <!-- form start -->
                            <form role="form" action="{{ route('brand.store') }}" method="POST" enctype= "multipart/form-data" id="create_brand">
                                @csrf
                                <div class="alert alert-success success_alt mt-3 hide" role="alert" id="s_message">
                                    Your Data has been submit successfully!
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-body">                                                                       
                                    <div class="col-md-10">
                                        <div class="form-group">
                                           <label for="brand">Brand Name</label>
                                           <input type="text" name="brand" class="form-control" id="brand" placeholder="Enter brand" required>
                                        </div>
                                     </div>
                                     <div class="col-md-10">
                                        <div class="form-group">
                                           <label for="Image">Image</label>
                                           <div class="input-group">
                                              <div class="custom-file">
                                                 <input type="file" name="image" class="custom-file-input" id="Image">
                                                 <label class="custom-file-label" for="Image">Choose Image</label>
                                              </div>
                                              <div class="input-group-append">
                                                 {{-- <span class="input-group-text" id="">Upload</span> --}}
                                              </div>
                                           </div>
                                        </div>
                                     </div>

                                     <div class="col-md-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="home" type="checkbox" id="home" checked>
                                            <label class="form-check-label" for="home">Is show your home page?</label>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->               
                                <div class="card-footer">
                                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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

@endsection
@section('style')
    <style>
        .hide{
            display: none;
        }
    </style>
@endsection
@section('script')
<script>
    $(document).ready(function(e) {   

    });
</script>
@endsection
