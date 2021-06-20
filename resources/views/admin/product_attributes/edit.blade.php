@extends('admin.layout');
@section('page_title','Add product_attribute')
@section('product_attribute_select','active')
@section('container')
<!-- Main content -->
<div class="row">
<div class="col-lg-12">
<div class="card">
   <div class="card-header mt-3">
      <div class=" d-flex justify-content-between align-item-center ">
         <h3 class="card-title">Update product_attribute </h3>
         <a href="{{ route('attribute.index') }}" class="btn btn-primary"> Back To product_attribute</a>
      </div>
   </div>
   <!-- /.card-header -->
   <div class="card-body p-0">
      <div class="card card-primary">
         <!-- form start -->
         <form role="form" action="{{ route('attribute.update') }}" id="create_product_attribute" method="post"   enctype= multipart/form-data >
            @csrf
            <div class="row d-flex justify-content-center">
               <div class="col-12 col-lg-10 col-md-8">
                  <div class="add-attribute" id="product_attribute_attr_box">
                     <div class="card-body attribute_box mb-4 mt-3" >
                        <div class="card-header mb-3" id="product_attribute_attr_1">
                           {{-- <h4>Add New product_attribute Attributes</h4> --}}
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="mrp">MRP</label>
                                 <input type="text" name="mrp" value="{{ $productAtt->mrp }}" class="form-control" id="mrp" placeholder="Enter mrp" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="price">Price</label>
                                 <input type="text" name="price" value="{{ $productAtt->price }}" class="form-control" id="price" placeholder="Enter price" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="quantity">Quantity</label>
                                 <input type="text" name="quantity" value="{{ $productAtt->quantity }}" class="form-control" id="quantity" placeholder="Enter quantity" required>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="color_id">Color</label>
                                 <select name="color_id" id="color_id" class="form-control" required >
                        
                                    @foreach ($colors as $color)
                                    @if(($productAtt->color_id) == ($color->id))
                                    <option value="{{ $color->id }}" style="display: none" selected >{{ $color->color }}</option>
                                    @else
                                    <option value="{{ $color->id }}">{{ $color->color }}</option>
                                    @endif
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="size_id">size</label>
                                 <select name="size_id" id="size_id" class="form-control" required >
                                    @foreach ($sizes as $size)
                                    @if(($productAtt->size_id) == ($size->id))
                                    <option value="{{ $size->id }}" style="display: none" selected >{{ $size->size }}</option>
                                    @else
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                    @endif
                                    @endforeach

                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="product">product</label>
                                 <select name="product" id="product" class="form-control" required>
   
                                    @foreach ($products as $product)
                                    @if(($productAtt->product_id) == ($product->id))
                                    <option value="{{ $product->id }}" style="display: none" selected >{{ $size->size }}</option>
                                    @else
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endif
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="product_attributeImage">Image</label>
                                 <div class="input-group">
                                    <div class="custom-file">
                                       <input type="file" name="image_attribute" class="custom-file-input" id="product_attributeImage">
                                       <label class="custom-file-label" for="product_attributeImage">Choose Image</label>
                                    </div>
                                    <div class="input-group-append">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div style="max-width:200px; max-height:200px; over-flow:hidden; margin-center:auto">
                              <img src="{{ asset($productAtt->image_attribute) }}" class="img-fluid">
                          </div>  
                        </div>
                     
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <input type="hidden" name="id", value="{{ $productAtt->id }}" id="id" />
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
@endsection
@section('script')
// copy css file and js file and past public directory 
<script>

   // if font have not show then change the font path. go js file find(/font) replace(../font/)
   // add more atttributs function


</script>
@endsection
