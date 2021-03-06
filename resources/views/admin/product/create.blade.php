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
         <!-- form start -->
         <form role="form" action="{{ route('product.store') }}" id="create_product" method="POST"  enctype= "multipart/form-data" >
            @csrf
            <div class="row d-flex justify-content-center">
               <div class="col-12 col-lg-10 col-md-8">

                  <div class="card-body">
                     <div class="alert alert-success success_alt mt-3 hide" role="alert" id="s_message">
                        Your Data has been submit successfully!
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="name">Product Name</label>
                              <input type="text" name="name"   class="form-control" id="name" placeholder="Enter name" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="brand">Brand</label>
                              <select name="brand" id="brand" class="form-control" required>
                                 <option value="" style="display: none" selected >Please select</option>
                                 @foreach ($brands as $brand)
                                 <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="model"> Model</label>
                              <input type="text" name="model"  class="form-control" id="model" placeholder="Enter model" required>
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
                               <label for="product_image">Main Image</label>
                               <div class="input-group">
                                  <div class="custom-file">
                                     <input type="file" name="product_image" class="custom-file-input" id="product_image" required>
                                     <label class="custom-file-label" for="product_image">Choose Image</label>
                                  </div>
                                  <div class="input-group-append">
                                     {{-- <span class="input-group-text" id="">Upload</span> --}}
                                  </div>
                               </div>
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
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="lead_time"> Lead_time</label>
                              <input type="text" name="lead_time"  class="form-control" id="lead_time" placeholder="Enter lead_time">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="tax">Tax</label>
                              <select name="tax" id="tax" class="form-control" required>
                                 <option value="" style="display: none" selected >Please select</option>
                                 <option value="0">Tax Free</option>
                                 @foreach ($taxes as $tax)
                                 <option value="{{ $tax->id }}">{{ $tax->tax_description }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        {{-- <div class="col-md-4">
                           <div class="form-group">
                              <label for="tax"> Tax</label>
                              <input type="text" name="tax"  class="form-control" id="tax" placeholder="Enter tax" >
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="tax_type"> Tax_type</label>
                              <input type="text" name="tax_type"  class="form-control" id="tax_type" placeholder="Enter tax_type" >
                           </div>
                        </div> --}}
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="is_promo">Is_promo</label>
                               <select name="is_promo" id="is_promo" class="form-control" required>
                                  <option value="" style="display: none" selected >Please select</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                               </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="is_featured">Is_featured</label>
                               <select name="is_featured" id="is_featured" class="form-control" required>
                                  <option value="" style="display: none" selected >Please select</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                               </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="is_discounted">Is_discounted</label>
                               <select name="is_discounted" id="is_discounted" class="form-control" required>
                                  <option value="" style="display: none" selected >Please select</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                               </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="is_trending">Is_trending</label>
                               <select name="is_trending" id="is_trending" class="form-control" required>
                                  <option value="" style="display: none" selected >Please select</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
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
               </div>
            </div>
            <div class="card-footer">
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
       height: 200
   });
   $('#technical_specification').summernote({ // discription id is requered same
       placeholder: 'Write here something new...',
       tabsize: 2,
       height: 150
   });
   // if font have not show then change the font path. go js file find(/font) replace(../font/)
   // add more atttributs function
   var loop_count = 1;
   function add_more() {
       loop_count++;
       var html = '<div class="card-body attribute_box mb-4" id="product_attr_'+loop_count+'" >';
           html += '<div class="card-header mb-3"><h4>Product attributes</h4></div>';
           html += ' <div class="row">';
           html += '<div class="col-md-6"><div class="form-group"><label for="sku">SKU</label><input type="text" name="sku[]" class="form-control" id="sku" placeholder="Enter sku" required></div></div>';
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
