@extends('admin.layout');

@section('page_title','customer ')
@section('customer','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
              
              <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">All customer </h3>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                   <div class="row"> 
                    <div class=" col-md-12 table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>
                                        @if($customer->image)
                                        <div style="max-width:70px; max-height:70px; over-flow:hidden;">
                                            <img src="{{ asset($customer->image) }}" class="img-fluid">
                                        </div>
                                        @endif
                                    </td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->city }}</td>
                                    
                                    <td class="d-flex">
                                        <a href="{{ route('customer.show', [$customer->id]) }}" class="btn btn-primary mr-2"> 
                                            <i class="fas fa-eye"></i> </a>
                                        </a>
                                        @if(($customer->status) == 1)
                                            <a href="{{ route('customer.status', [$customer->id,'0']) }}" class="btn btn-success mr-2"> 
                                                <i class="fas fa-unlock"></i> </a>
                                            </a>

                                        @elseif(($customer->status) == 0)
                                            <a href="{{ route('customer.status', [$customer->id,'1']) }}" class="btn btn-warning mr-2"> 
                                                <i class="fas fa-lock"></i> </a>
                                            </a>
                                        @endif
                                        <a href="{{ route('customer.delete', [$customer->id]) }}" class="btn btn-danger "> 
                                                <i class="fas fa-trash"></i> </a>
                                            </a>
                                    </td>
                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
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
        
    </style>
@endsection
@section('action')
@section('input')
<input class="au-input au-input--xl form-control typeahead" id="search_customer" type="text" autocomplete="off" name="search" placeholder="Search for datas &amp; reports...">
@csrf
<button class="au-btn--submit" type="submit">
    <i class="zmdi zmdi-search"></i>
</button>
@endsection
@section('script')
{{-- <script src="typehead.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<
{{-- <script>
    $(document).ready(function(){
        var _token = "{{ csrf_token() }}";
        $('#search_customer').typeahead({
            source: function(terms, process)
            {
                $.ajax({
                    url:"{{ route('customer.search') }}",
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
{{-- <script>
    var path = "{{ route('customer.search') }}";
    $('#search_customer').typeahead({
        source:function(terms,process){
            return $.get(path,{terms:terms},function(data){
            return process(data);
        });
        }
    });
</script> --}}
@endsection