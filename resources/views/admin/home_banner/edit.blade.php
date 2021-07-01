@extends('admin.layout');
@section('page_title','Update banner')
@section('banner_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
                
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">Update banner </h3>
                    <a href="{{ route('banner.create') }}" class="btn btn-primary"> Back To banner</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
                            <!-- form start -->
                            <form role="form" action="{{ route('homeBanner.update',[$banner->id]) }}" method="post" enctype= "multipart/form-data" id="update_banner">
                                @csrf
                                @method('post')
                                <div class="alert alert-success success_alt mt-3 hide" role="alert" id="s_message">
                                    Your data has been submit successfully!
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
                                           <label for="title">banner Title</label>
                                           <input type="text" name="title" value="{{ $banner->title }}" class="form-control" id="title" placeholder="Enter title" required>
                                        </div>
                                     </div>
                                     <div class="col-md-10">
                                        <div class="form-group">
                                           <label for="offer">Offer</label>
                                           <input type="text" name="offer" value="{{ $banner->offer }}" class="form-control" id="offer" placeholder="Enter offer">
                                        </div>
                                     </div>
                                     <div class="col-md-10">
                                        <div class="form-group">
                                           <label for="description">description</label>
                                           <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter your description" required>
                                            {{ $banner->description }}
                                            </textarea>
                                        </div>
                                     </div>
                                     
                                     <div class="col-md-8">
                                        <div class="form-group">
                                           <label for="image">Image</label>
                                           <div class="input-group">
                                              <div class="custom-file">
                                                 <input type="file" name="image" class="custom-file-input" id="image">
                                                 <label class="custom-file-label" for="image">Choose Image</label>
                                              </div>
                                              <div class="input-group-append">
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                </div>
                                    @if($banner->image)
                                    <div class="col-md-4 mb-5 mt-3">
                                        <div style="max-width:200px; max-height:200px; over-flow:hidden;">
                                            <img src="{{ asset($banner->image) }}" class="img-fluid">
                                        </div>
                                    </div>
                                    @endif
                                      <!-- /.card-body -->     
                                <div class="card-footer">
                                    <input type="hidden" value="{{ $banner->id }}" name="id">
                                    <button type="submit" id="submit" class="btn btn-primary">Update</button>
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
//     $(document).ready(function(e) {   

//         $("#update_banner").submit(function(e){
//             e.preventDefault();
//             var formData = new FormData(this);
//             console.log(formData);
//             var id = $("#id").attr('id').val;
//             console.log(id);
//             // formData.append('image',image[0]); // image file have to send must//not neccerry
            
//             $.ajaxSetup({
//                 headers: {
//                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                 }
//             });    
            
//             $.ajax({
//                 url:,
//                 type:"post",
//                 data:formData,
//                 contentType:false,
//                 processData:false,
//                 success:function(response){  
//                     $("#update_banner")[0].reset();
//                     $('#s_message').removeClass('hide');
//                     $('#s_message').removeAttr('checked');
//                     setTimeout(function(){  
//                         $('#s_message').fadeOut("Slow");  
//                     }, 5000);  
//                     setTimeout(function(){  
//                         $('#s_message').fadeIn("Slow");  
//                     }, 1000);  
//                 }  

//             })
//         }); 
//     });

// </script>
@endsection
