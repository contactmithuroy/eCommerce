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
                              <label for="brand">Brand</label>
                              <select name="brand" id="brand" class="form-control" required>
                                 @foreach ($brands as $brand)
                                 @if(($brand->id) == ($product->brand) )
                                 <option value="{{ $brand->id }}" style="display: none" selected >{{ $brand->brand }}</option>
                                 @else
                                 <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                 @endif
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="model"> Model</label>
                              <input type="text" name="model" value="{{ $product->model }}" class="form-control" id="model" placeholder="Enter model" required>
                           </div>
                        </div>
                        {{-- <div class="col-md-6">
                           <div class="form-group">
                              <label for="user">User</label>
                              <input type="text" name="user" value="{{ $product->user }}" class="form-control" id="user" placeholder="Enter user" required>
                           </div>
                        </div> --}}
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
                                 {{-- 
                                 <option value="" style="display: none" selected >Please select</option>
                                 --}}
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
                           <div style="max-width:150px; max-height:150px; over-flow:hidden;">
                              <img src="{{ asset($product->image) }}" class="img-fluid">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="child_images">Child Images</label>
                              <span style="color:red; font-size:10px">*You can upload multipale image.</span>
                              <div class="input-group">
                                 <div class="custom-file">
                                    <input type="file" name="child_images[]" class="custom-file-input" id="child_images" multiple >
                                    <label class="custom-file-label" for="child_images">Choose Image</label>
                                 </div>
                                 <div class="input-group-append">
                                    {{-- <span class="input-group-text" id="">Upload</span> --}}
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 mb-5 mt-3">
                           <div class="d-flex justify-content-between" style="max-width:100px; max-height:100px; over-flow:hidden; margin-center:auto">
                              @foreach ($product->productImages as $value)
                                 <img src="{{ asset($value->image) }}" class="img-fluid mr-5">
                              @endforeach
                           </div>    
                        </div>    
                     </div>

                     <hr>
                     <div class="row">
                   
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="lead_time"> Lead_time</label>
                              <input type="text" name="lead_time" value="{{ $product->lead_time }}" class="form-control" id="lead_time" placeholder="Enter lead_time">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="tax">Tax</label>
                              <select name="tax" id="tax" class="form-control" required>
                                 {{-- 
                                 <option value="" style="display: none" selected >Please select</option>
                                 --}}
                                 <option value="0">Tax Free</option>
                                 @foreach ($taxes as $tax)
                                 @if(($tax->id) == ($product->tax) )
                                 <option value="{{ $tax->id }}" style="display: none" selected >{{ $tax->tax_description }}</option>
                                 @else
                                 <option value="{{ $tax->id }}">{{ $tax->tax_description }}</option>
                                 @endif
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="is_promo">Is_promo</label>
                               <select name="is_promo" id="is_promo" class="form-control" required>
                                 @if($product->is_promo == 1)
                                 <option value="1"  selectedstyle="display: none" selected >Yes</option>
                                 <option value="0">No</option>
                                 @elseif($product->is_promo == 0)
                                 <option value="0"  selectedstyle="display: none" selected >No</option>
                                 <option value="1">Yes</option>
                                 @else
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                  @endif
                               </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="is_featured">Is_featured</label>
                               <select name="is_featured" id="is_featured" class="form-control" required>
                                 @if($product->is_featured == 1)
                                 <option value="1"  selectedstyle="display: none" selected >Yes</option>
                                 <option value="0">No</option>
                                 @elseif($product->is_featured == 0)
                                 <option value="0"  selectedstyle="display: none" selected >No</option>
                                 <option value="1">Yes</option>
                                 @else
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                  @endif
                               </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="is_discounted">Is_discounted</label>
                               <select name="is_discounted" id="is_discounted" class="form-control" required>
                                 @if($product->is_discounted == 1)
                                 <option value="1"  selectedstyle="display: none" selected >Yes</option>
                                 <option value="0">No</option>
                                 @elseif($product->is_discounted == 0)
                                 <option value="0"  selectedstyle="display: none" selected >No</option>
                                 <option value="1">Yes</option>
                                 @else
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                  @endif
                               </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="is_trending">Is_trending</label>
                               <select name="is_trending" id="is_trending" class="form-control" required>
                                 @if($product->is_trending == 1)
                                 <option value="1"  selectedstyle="display: none" selected >Yes</option>
                                 <option value="0">No</option>
                                 @elseif($product->is_trending == 0)
                                 <option value="0"  selectedstyle="display: none" selected >No</option>
                                 <option value="1">Yes</option>
                                 @else
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                  @endif
                               </select>
                           </div>
                        </div>
                     </div>
                     <hr>

                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="technical_specification">Technical_specification</label>
                              <textarea name="technical_specification" id="technical_specification" rows="4" class="form-control" placeholder="Enter your technical_specification">
                              {!! ("$product->technical_specification") !!}
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
            <div class="card-footer">
               <input type="hidden" name="id", value="{{ $product->id }}" id="id" />
               <button type="submit" id="submit" class="btn btn-primary btn-lg">Submit</button>
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
   $('#technical_specification').summernote({ // discription id is requered same
       placeholder: 'Write here something new...',
       tabsize: 2,
       height: 150
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