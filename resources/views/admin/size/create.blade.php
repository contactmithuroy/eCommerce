@extends('admin.layout');
@section('page_title','Add Size')
@section('size_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
                
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">Create size </h3>
                    <a href="{{ route('size.index') }}" class="btn btn-primary"> Back To Size</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
                            <!-- form start -->
                            <form role="form" action="#" id="create_size">
                                @csrf
                                <div class="alert alert-success success_alt mt-3 hide" role="alert" id="s_message">
                                    Your Data has been submit successfully!
                                </div>
                                <div class="card-body">                                                                       
                                    <div class="form-group">
                                        <label for="size">Size Name</label>
                                        <input type="text" name="size" class="form-control" id="size" placeholder="Enter size" required>
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

        $("#create_size").submit(function(e){
            e.preventDefault();

            let size = $("#size").val();
            let _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('size.store') }}",
                type:"POST",
                data:{
                    size:size,
                    _token:_token
                },
                success:function(response){  
                    $("#create_size")[0].reset();
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
</script>
@endsection
