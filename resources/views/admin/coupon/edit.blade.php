@extends('admin.layout');
@section('page_title','Update coupon')
@section('coupon_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
                
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">Create Coupon</h3>
                    <a href="{{ route('coupon.index') }}" class="btn btn-primary"> Back To Coupon</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-8 offset-lg-3 offset-md-2">
                            <!-- form start -->
                            <form role="form" action="{{route('coupon.update',[$coupon->id])}}" id="update_coupon">
                                @csrf
                                @method('put')
                                <div class="alert alert-success success_alt mt-3 hide" role="alert" id="s_message">
                                    Your Data has been submit successfully!
                                </div>

                                <input type="hidden" name="id", value="{{ $coupon->id }}" id="cid">

                                <div class="card-body">                                                                       
                                    <div class="form-group">
                                        <label for="title">Coupon Name</label>
                                        <input type="text" name="title" value="{{ $coupon->title }}" class="form-control" id="title" placeholder="Enter title" required>
                                    </div>
                                </div>
                                <div class="card-body">                                                                       
                                    <div class="form-group">
                                        <label for="code">Coupon Code</label>
                                        <input type="text" name="code" value="{{ $coupon->code }}" class="form-control" id="code" placeholder="Enter code" required>
                                    </div>
                                </div>
                                <div class="card-body">                                                                       
                                    <div class="form-group">
                                        <label for="value">Couponvalue</label>
                                        <input type="text" name="value" value="{{ $coupon->value }}" class="form-control" id="value" placeholder="Enter value" required>
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

        $("#update_coupon").submit(function(e){
            e.preventDefault();

            let id = $("#cid").val();
            let title = $("#title").val();
            let code = $("#code").val();
            let value = $("#value").val();
            let _token = "{{ csrf_token() }}";
            console.log(id);
            console.log(title);
            console.log(code);
            console.log(value);
            $.ajax({
                url: $(this).attr('action'), //this form attributes action
                type:"PUT",
                data:{
                    id:id,
                    title:title,
                    code:code,
                    value:value,
                    _token:_token
                },
                success:function(response){  
                    $('input').val('');
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
    // $("create_Coupon").trigger("reset");
    // toastr.success('Successfully');
</script>
@endsection
