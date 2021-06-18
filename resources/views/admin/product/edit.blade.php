@extends('admin.layout');
@section('page_title','Update Product')
@section('product_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">              
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">Update Product </h3>
                    <a href="{{ route('product.index') }}" class="btn btn-primary"> Back To Product</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                     <!-- form start -->
                    <form action="{{ route('product.update',[$product->id]) }}" method="post" enctype="multipart/form-data"> 
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 col-lg-10 col-md-8">  
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="alert alert-success success_alt mt-3 hide" role="alert" id="s_message">
                                        Your Data has been submit successfully!
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Product Name</label>
                                                <input type="text" name="name" value="{{ $product->name }}"  class="form-control" id="name" placeholder="Enter name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="brand"> Brand</label>
                                                <input type="text" name="brand" value="{{ $product->brand }}" class="form-control" id="brand" placeholder="Enter brand" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="model"> Model</label>
                                                <input type="text" name="model" value="{{ $product->model }}" class="form-control" id="model" placeholder="Enter model" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user">User</label>
                                                <input type="text" name="user" value="{{ $product->user }}" class="form-control" id="user" placeholder="Enter user" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="warranty">Warranty	status</label>
                                                <input type="text" name="warranty" value="{{ $product->warranty }}" class="form-control" id="warranty" placeholder="Enter warranty" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category_id">Category</label>
                                                <select name="category_id" id="category_id" class="form-control" required>

                                                    {{-- <option value="" style="display: none" selected >Please select</option> --}}
                                                    @foreach ($categories as $category)
                                                        @if(($category->id) == ($product->category_id) )
                                                        <option value="{{ $category->id }}" style="display: none" selected >{{ $category->name }}</option>
                                                        @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endif
                                                    @endforeach
                        
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="keywords">Keywords</label>
                                                <input type="text" name="keywords" value="{{ $product->keywords }}" class="form-control" id="keywords" placeholder="Enter keywords" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="productImage">Image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                    <input type="file" name="product_image" class="custom-file-input" id="productImage">
                                                    <label class="custom-file-label" for="productImage">Choose Image</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                    {{-- <span class="input-group-text" id="">Upload</span> --}}
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-5 mt-3">
                                            <div style="max-width:200px; max-height:200px; over-flow:hidden;">
                                                <img src="{{ asset($product->image) }}" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="from-group">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="technical_specification">Technical_specification</label>
                                                <textarea name="technical_specification" id="technical_specification" rows="4" class="form-control" placeholder="Enter your technical_specification">
                                                    {{ ("$product->technical_specification") }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="short_description">Short_description</label>
                                                <textarea name="short_description" id="short_description" rows="4" class="form-control" placeholder="Enter your short_description">
                                                    {!! ("$product->short_description") !!}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description"  id="summernote" rows="4" class="form-control" placeholder="Enter your description">
                                                    {!! ("$product->description") !!}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                    <!-- /.card-body -->                                  
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ">
                            <div class="col-12 col-lg-10 col-md-8">  
                                {{-- product attribute --}}
                                <div class="add-attribute" id="product_attr_box">
                                    <div class="card-body attribute_box mb-4" >
                                        <div class="card-header mb-3" id="product_attr_1">
                                            <h4>Product attributes</h4>
                                        </div>
                                        <div class="row">
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sku">SKU</label>
                                                    <input type="text" name="sku[]" class="form-control" id="sku" placeholder="Enter sku" required>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mrp">MRP</label>
                                                    <input type="text" name="mrp[]" class="form-control" id="mrp" placeholder="Enter mrp" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="text" name="price[]" class="form-control" id="price" placeholder="Enter price" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="quantity">Quantity</label>
                                                    <input type="text" name="quantity[]" class="form-control" id="quantity" placeholder="Enter quantity" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="color_id">Color</label>
                                                    <select name="color_id[]" id="color_id" class="form-control" >

                                                        <option value="" style="display: none" selected >Please select</option>
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color->id }}">{{ $color->color }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="size_id">size</label>
                                                    <select name="size_id[]" id="size_id" class="form-control" >

                                                        <option value="" style="display: none" selected >Please select</option>
                                                        @foreach ($sizes as $size)
                                                            <option value="{{ $size->id }}">{{ $size->size }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="productImage">Image</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                        <input type="file" name="image_attribute[]" class="custom-file-input" id="productImage">
                                                        <label class="custom-file-label" for="productImage">Choose Image</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="add-button">
                                            <button type="button" onclick="add_more()" class="btn btn-outline-primary">
                                                <i class="fa fa-plus"></i>&nbsp; Add attribute</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- end product atribute --}}
                        <div class="card-footer">
                            <input type="hidden" name="id", value="{{ $product->id }}" id="id" />
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
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
        .attribute_box{
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
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
    // add more atttributs function
    var loop_count = 1;
    function add_more() {
        loop_count++;
        var html = '<div class="card-body attribute_box mb-4" id="product_attr_'+loop_count+'" >';
            html += '<div class="card-header mb-3"><h4>Product attributes</h4></div>';
            html += ' <div class="row">';
            // html += '<div class="col-md-6"><div class="form-group"><label for="sku">SKU</label><input type="text" name="sku[]" class="form-control" id="sku" placeholder="Enter sku" required></div></div>';
            html += '<div class="col-md-6"><div class="form-group"><label for="mrp">MRP</label><input type="text" name="mrp[]" class="form-control" id="mrp" placeholder="Enter mrp" required></div></div>';
            
            html +='<div class="col-md-6"><div class="form-group"><label for="price">Price</label><input type="text" name="price[]" class="form-control" id="price" placeholder="Enter price" required></div></div>';

            html +='<div class="col-md-6"><div class="form-group"><label for="quantity">Quantity</label><input type="text" name="quantity[]" class="form-control" id="quantity" placeholder="Enter quantity" required></div></div>';

            html +='<div class="col-md-6"><div class="form-group"><label for="color_id">Color</label><select name="color_id[]" id="color_id" class="form-control" >';
            html +='<option value="" style="display: none" selected >Please select</option>@foreach ($colors as $color)<option value="{{ $color->id }}">{{ $color->color }}</option>@endforeach';
            html += '</select></div></div>';

            html +='<div class="col-md-6"><div class="form-group"><label for="size_id">size</label><select name="size_id[]" id="size_id" class="form-control" >';                                            
            html +='<option value="" style="display: none" selected >Please select</option>@foreach ($sizes as $size)<option value="{{ $size->id }}">{{ $size->size }}</option>@endforeach</select></div></div>';

            html += '<div class="col-md-6"><div class="form-group"><label for="productImage">Image</label>';
            html +='<div class="input-group"><div class="custom-file"><input type="file" name="image_attribute[]" class="custom-file-input" id="productImage"><label class="custom-file-label" for="productImage">Choose Image</label>';                  
            html +='</div><div class="input-group-append"></div></div></div></div>';
            
            html += '</div>';  
            html +='<div class="add-button"><button type="button" onclick="remove_more("'+loop_count+'")" class="btn btn-outline-danger"><i class="fa fa-minus"></i>&nbsp; Remove</button></div>';   
            html += '</div>';     

        jQuery('#product_attr_box').append(html);
    }

function remove_more(loop_count) {
    jQuery('#product_attr_'+loop_count).remove();
}
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
