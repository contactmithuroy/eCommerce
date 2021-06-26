@extends('admin.layout');
@section('page_title','Add Tax')
@section('tax','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
                
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">Create tax </h3>
                    <a href="{{ route('tax.index') }}" class="btn btn-primary"> Back To tax</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
                            <!-- form start -->
                            <form role="form" action="#" id="create_tax">
                                @csrf
                                <div class="alert alert-success success_alt mt-3 success_hide" role="alert" id="s_message">
                                    Your Data has been submit successfully!
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tax_description">Tax Description</label>
                                            <input type="text" name="tax_description" class="form-control" id="tax_description" placeholder="Enter tax description" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tax_value">Tax Value</label>
                                            <input type="text" name="tax_value" class="form-control" id="tax_value" placeholder="Enter tax_value" required>
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
        .success_hide{
            display: none;
        }
        .danger_hide{
            display: none;
        }
    </style>
@endsection
@section('script')
<script>
    $(document).ready(function(e) {   
    
        $("#create_tax").submit(function(e){
            e.preventDefault();
            
            $.ajax({
                url: "{{ route('tax.store') }}",
                type:"POST",
                data:$("#create_tax").serialize(),
                success:function(response){  
                    $("#create_tax")[0].reset();
                    $('#s_message').removeClass('success_hide');
                    setTimeout(function(){  
                        $('#s_hide').fadeOut("Slow");  
                    }, 5000);  
                    setTimeout(function(){  
                        $('#s_hide').fadeIn("Slow");  
                    }, 1000);  
                }   
            });



        }); 
    });
</script>
@endsection
