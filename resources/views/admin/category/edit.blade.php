@extends('admin.layout');

@section('container')
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
                            <form role="form" action="#" id="update_category">
                                @csrf
                                @method('put')
                                <div class="alert alert-success success_alt mt-3 hide" role="alert" id="s_message">
                                    Your Data has been submit successfully!
                                </div>
                                <input type="hidden" name="id", value="{{ $category->id }}" id="cid">
                                <div class="card-body">                                                                       
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input type="name" name="name" class="form-control" id="name" value="{{ $category->name }}" placeholder="Enter name" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->               
                                <div class="card-footer">
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
    $(document).ready(function(e) {   

        $("#update_category").submit(function(e){
            e.preventDefault();

            let id = $("#cid").val();
            let name = $("#name").val();
            let _token = "{{ csrf_token() }}";

            $.ajax({
                url: "{{ route('category.update') }}",
                type:"PUT",
                data:{
                    id:id,
                    name:name,
                    _token:_token
                },
                success:function(response){  
                    $('#s_message').removeClass('hide');
                    setTimeout(function(){  
                        $('#s_message').fadeOut("Slow");  
                    }, 5000);  
                    setTimeout(function(){  
                        $('#s_message').fadeIn("Slow");  
                    }, 1000);  
                }  
            });
            
        }); 
    });
    // $("create_category").trigger("reset");
    // toastr.success('Successfully');
</script>
@endsection
