@extends('admin.layout');

@section('page_title','product ')
@section('product_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">           
              <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">All product </h3>
                    <a href="{{ route('product.create') }}" class="btn btn-primary"> Add product</a>
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
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Warranty</th>
                                        <th>Category</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            <div style="max-width:70px; max-height:70px; over-flow:hidden">
                                                <img src="{{ asset($product->image) }}" class="img-fluid">
                                            </div>    
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ $product->model }}</td>
                                        <td>{{ $product->warranty }}</td>
                                        <td>{{ $product->category->name }}</td>
                                  
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn-primary mr-2"> 
                                                <i class="fas fa-edit"></i> </a>
                                            </a>
                                            <a href="{{ route('product.show', [$product->id]) }}" class="btn btn-primary mr-2"> 
                                                <i class="fas fa-eye"></i> </a>
                                            </a>
                                            <! status button !>
                                            @if(($product->status) == 1)
                                                <a href="{{ route('product.status', [$product->id,'0']) }}" class="btn btn-success mr-2"> 
                                                    <i class="fas fa-unlock"></i> </a>
                                                </a>

                                            @elseif(($product->status) == 0)
                                                <a href="{{ route('product.status', [$product->id,'1']) }}" class="btn btn-warning mr-2"> 
                                                    <i class="fas fa-lock"></i> </a>
                                                </a>
                                            @endif
                                            <form action="{{ route('product.delete',[$product->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> </button>                                                
                                            </form>
                                            {{-- <a href="{{ route('product.destroy', [$product->id]) }}" class="btn btn-danger "> 
                                                <i class="fas fa-trash"></i> </a>
                                            </a> --}}
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
