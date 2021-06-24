@extends('admin.layout');

@section('page_title','Category ')
@section('category_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
              
              <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">Category with Child</h3>
                    <a href="{{ route('category.create') }}" class="btn btn-primary"> Add Category</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                   <div class="row"> 
                       @foreach ($mainCategory as $mainCategories)
                       <div class=" col-md-12 table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <h3 class="heddingbox">{{ strtoupper($mainCategories->name) }}</h3>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                @if(($mainCategories->id ) == ($category->parent_category_id))
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>
                                            @if($category->image)
                                            <div style="max-width:70px; max-height:70px; over-flow:hidden;">
                                                <img src="{{ asset($category->image) }}" class="img-fluid">
                                            </div>
                                            @endif
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if($category->parent_category_id == 0)
                                            <span class="badge badge-primary">Parrent</span>
                                            @else
                                            <span class="badge badge-warning">Child</span>
                                            @endif
                                        </td>
                                        <td id="slug">{{ $category->created_at->format('d M, Y') }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-primary mr-2"> 
                                                <i class="fas fa-edit"></i> </a>
                                            </a>
                                            @if(($category->status) == 1)
                                                <a href="{{ route('category.status', [$category->id,'0']) }}" class="btn btn-success mr-2"> 
                                                    <i class="fas fa-unlock"></i> </a>
                                                </a>

                                            @elseif(($category->status) == 0)
                                                <a href="{{ route('category.status', [$category->id,'1']) }}" class="btn btn-warning mr-2"> 
                                                    <i class="fas fa-lock"></i> </a>
                                                </a>
                                            @endif
                                            <form action="{{ route('category.destroy',[$category->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> </button>                                                
                                            </form>
                                        </td>
                                        </tr>
                                    @endif
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                       @endforeach
                        
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
        .heddingbox{
            padding: 10px 10px ;
        }
    </style>
@endsection
@section('action')
@section('input')
<input class="au-input au-input--xl form-control typeahead" id="search_category" type="text" autocomplete="off" name="search" placeholder="Search for datas &amp; reports...">
@csrf
<button class="au-btn--submit" type="submit">
    <i class="zmdi zmdi-search"></i>
</button>
@endsection
@section('script')
{{-- <script src="typehead.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<
<script>
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
</script>
{{-- <script>
    var path = "{{ route('category.search') }}";
    $('#search_category').typeahead({
        source:function(terms,process){
            return $.get(path,{terms:terms},function(data){
            return process(data);
        });
        }
    });
</script> --}}
@endsection