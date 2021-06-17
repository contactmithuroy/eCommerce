@extends('admin.layout');
@section('page_title','Add Product')
@section('product_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">              
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">Create Product </h3>
                    <a href="{{ route('product.index') }}" class="btn btn-primary"> Back To Product</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-lg-10 col-md-8">
                            <!-- form start -->
                            <form role="form" action="{{ route('product.store') }}" id="create_product" method="POST"  enctype= multipart/form-data >
                                @csrf
                                <div class="card-body">
                                    <div class="alert alert-success success_alt mt-3 hide" role="alert" id="s_message">
                                        Your Data has been submit successfully!
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Product Name</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="brand"> Brand</label>
                                                <input type="text" name="brand" class="form-control" id="brand" placeholder="Enter brand" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="model"> Model</label>
                                                <input type="text" name="model" class="form-control" id="model" placeholder="Enter model" required>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="warranty">Warranty	status</label>
                                                <input type="text" name="warranty" class="form-control" id="warranty" placeholder="Enter warranty" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select name="category_id" id="category_id" class="form-control" required>

                                                    <option value="" style="display: none" selected >Please select</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                        
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="keywords">Keywords</label>
                                                <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Enter keywords" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="productImage">Image</label>
                                                <div class="input-group">
                                                  <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="productImage">
                                                    <label class="custom-file-label" for="productImage">Choose Image</label>
                                                  </div>
                                                  <div class="input-group-append">
                                                    {{-- <span class="input-group-text" id="">Upload</span> --}}
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="from-group">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="technical_specification">Technical_specification</label>
                                                <textarea name="technical_specification" id="technical_specification" rows="4" class="form-control" placeholder="Enter your technical_specification">
                                                    {{ old('technical_specification') }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="short_description">Short_description</label>
                                                <textarea name="short_description" id="short_description" rows="4" class="form-control" placeholder="Enter your short_description">
                                                    {{ old('short_description') }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="summernote" rows="4" class="form-control" placeholder="Enter your description">
                                                    {{ old('description') }}
                                                </textarea>
                                            </div>
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
    <link rel="stylesheet" href="{{ asset('admin/css/summernote-bs4.css') }}">
@endsection

@section('script')
    // copy css file and js file and past public directory 
    <script src="{{ asset('admin/js/summernote-bs4.js') }}"> </script>
    
    <script>
    $('#summernote').summernote({ // discription id is requered same
        placeholder: 'Write here something new...',
        tabsize: 2,
        height: 300
    });
    $('#short_description').summernote({ // discription id is requered same
        placeholder: 'Write here something new...',
        tabsize: 2,
        height: 250
    });
    // if font have not show then change the font path. go js file find(/font) replace(../font/)
    </script>
@endsection

{{-- @section('script')
<script>
    $(document).ready(function(e) {   

        $("#create_product").submit(function(e){
            e.preventDefault();

            let name = $("#name").val();
            let brand = $("#brand").val();
            let user = $("#user").val();
            let warranty = $("#warranty").val();
            let category = $("#category").val();
            let productImage = $("#productImage").val();
            let technical_specification = $("#technical_specification").val();
            let short_description = $("#short_description").val();
            let description = $("#description").val();
            let _token = "{{ csrf_token() }}";
            console.log(description);
            $.ajax({
                url: "{{ route('product.store') }}",
                type:"PUT",
                data:{
                    name:name,
                    brand:brand,
                    user:user,
                    category:category,
                    productImage:productImage,
                    technical_specification:technical_specification,
                    short_description:short_description,
                    description:description,
                    _token:_token
                },
                success:function(response){  
                    $("#create_product")[0].reset();
                    $('#s_message').removeClass('hide');
                    setTimeout(function(){  
                        $('#s_message').fadeOut("Slow");  
                    }, 10000);  
                    setTimeout(function(){  
                        $('#s_message').fadeIn("Slow");  
                    }, 1000);  
                } 
            });
            
        }); 
    });
</script>
@endsection --}}
