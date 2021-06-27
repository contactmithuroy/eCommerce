@extends('admin.layout');
@section('page_title','Add Category')
@section('category_select','active')
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
                            <form role="form" action="#" id="create_category" method="post">
                                @csrf
                                @method('post')
                                <div class="alert alert-success success_alt mt-3 hide" role="alert" id="s_message">
                                    Your Data has been submit successfully!
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Category Name</label>
                                            <input type="name" name="name" class="form-control" id="name" placeholder="Enter name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                           <label for="parent_category_id">Parant Category</label>
                                            <select name="parent_category_id" id="parent_category_id" class="form-control" required>
                                               <option value="" style="display: none" selected >Please select</option>
                                               <option value="0" style="background-color: #e74c3c; color:#fff" >Main Category</option>
                                                @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
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
                                                 {{-- <span class="input-group-text" id="">Upload</span> --}}
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                    <div class="col-md-8">
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

$("#create_category").submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    // formData.append('image',image[0]); // image file have to send must//not neccerry
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });    
    
    $.ajax({
        url:"{{ route('category.store') }}",
        type:"post",
        data:formData,
        contentType:false,
        processData:false,
        success:function(response){  
            $("#create_category")[0].reset();
            $('#s_message').removeClass('hide');
            $('#s_message').removeAttr('checked');
            setTimeout(function(){  
                $('#s_message').fadeOut("Slow");  
            }, 5000);  
            setTimeout(function(){  
                $('#s_message').fadeIn("Slow");  
            }, 1000);  
        }  

    })
}); 
});
</script>
@endsection
