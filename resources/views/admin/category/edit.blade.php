@extends('admin.layout');
@section('page_title','Update Category')
@section('category_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
                
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">Create Category </h3>
                    <a href="{{ route('category.create') }}" class="btn btn-primary"> Back To Category</a>
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
                                @method('post')
                                <div class="alert alert-success success_alt mt-3 hide" role="alert" id="s_message">
                                    Your Data has been submit successfully!
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Category Name</label>
                                            <input type="name" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="Enter name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                           <label for="parent_category_id">Parant Category</label>
                                            <select name="parent_category_id" id="parent_category_id" class="form-control" required>
                                               <option value="" style="display: none" selected >Please select</option>
                                               <option value="0" style="background-color: #e74c3c; color:#fff" >Main Category</option>
                                                @foreach ($categories as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                    @if($category->image)
                                    <div class="col-md-4 mb-5 mt-3">
                                        <div style="max-width:200px; max-height:200px; over-flow:hidden;">
                                            <img src="{{ asset($category->image) }}" class="img-fluid">
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="col-md-8">
                                        <div class="form-check form-switch">
                                            @if($category->home == 1)
                                            <input class="form-check-input" name="home" type="checkbox" id="home" checked>
                                            @else
                                            <input class="form-check-input" name="home"  type="checkbox" id="home">
                                            @endif
                                            <label class="form-check-label" for="home">Is show your home page?</label>
                                        </div>
                                    </div>
                                </div>
                                      <!-- /.card-body -->     
                                <div class="card-footer">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" value="{{ $category->id }}", name="id">
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
            var formData = new FormData(this);
            // formData.append('image',image[0]); // image file have to send must//not neccerry
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });    
            
            $.ajax({
                url:"{{ route('category.update') }}",
                type:"post",
                data:formData,
                contentType:false,
                processData:false,
                success:function(response){  
                    $("#update_category")[0].reset();
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
{{--
// $("create_category").trigger("reset");
// toastr.success('Successfully');

$('option').attr('selected', false); 
document.getElementById('myform').reset();
$('#formID')[0].reset(); // Reset all form fields
$('form#search-form').reset();
$('.all_fields').val('');
--}}
{{-- <script>
    $(document).ready(function(){
        var _token = "{{ csrf_token() }}";
        $('#search_category').typeahead({
            source: function(terms, process)
            {
                $.ajax({
                    url:"{{ route('category.search') }}",
                    method:"POST",
                    data:{terms:terms,_token:_token},
                    dataType:"json",
                    success:function(data)
                    {
                        process($.map(data, function(item){
                        return item;
                        }));
                    }
                })
            }
        });
    });
</script> --}}
