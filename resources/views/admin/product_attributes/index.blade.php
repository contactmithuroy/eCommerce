@extends('admin.layout');

@section('page_title','product_attribute ')
@section('product_attribute_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">           
              <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">All Product Attribute </h3>
                    <a href="{{ route('product_attribute.create') }}" class="btn btn-primary"> Add Product Attribute</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                   @if(isset($products[0]))
                   @foreach ($products as $key => $product)
                   
                   <div class="row mb-4 p-5">
                    
                        <div class="col-md-12 col-sm-12  table-responsive table--no-card m-b-30">
                            <h3><strong>{{ $product->name }}</strong></h3>
                            <hr>
                            <table class="table table-borderless table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>SKU</th>
                                        <th>MRP</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>size_id</th>
                                        <th>color_id</th>
                                        <th>product_id</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($product->attributes[0]))
                                    @foreach ($product->attributes as $key => $product_attribute)
                                    <tr>

                                        <td>{{ $product_attribute->id }}</td>
                                        <td>
                                            <div style="max-width:70px; max-height:70px; over-flow:hidden; margin-center:auto">
                                                <img src="{{ asset($product_attribute->image_attribute) }}" class="img-fluid">
                                            </div>  
                                        </td>
                                        <td>{{ $product_attribute->sku }}</td>
                                        <td>{{ $product_attribute->mrp }}</td>
                                        <td>{{ $product_attribute->price }}</td>
                                        <td>{{ $product_attribute->quantity }}</td>
                                        <td>{{ $product_attribute->size->size }}</td>
                                        <td>{{ $product_attribute->color->color }}</td>
                                        <td>{{ $product_attribute->product->name }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('attribute.edit', [$product_attribute->id]) }}" class="btn btn-primary mr-2"> 
                                                <i class="fas fa-edit"></i> </a>
                                            </a>
                                            <! status button !>
                                            @if(($product_attribute->status) == 1)
                                                <a href="{{ route('attribute.status', [$product_attribute->id,'0']) }}" class="btn btn-success mr-2"> 
                                                    <i class="fas fa-unlock"></i> </a>
                                                </a>

                                            @elseif(($product_attribute->status) == 0)
                                                <a href="{{ route('attribute.status', [$product_attribute->id,'1']) }}" class="btn btn-warning mr-2"> 
                                                    <i class="fas fa-lock"></i> </a>
                                                </a>
                                            @endif
                                            <form action="{{ route('attribute.delete',[$product_attribute->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> </button>                                                
                                            </form>
                                            {{-- <a href="{{ route('product_attribute.destroy', [$product_attribute->id]) }}" class="btn btn-danger "> 
                                                <i class="fas fa-trash"></i> </a>
                                            </a> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                </div>   
                   @endforeach
                   @endif
                   
                </div>
            </div>
            <!-- /.card-body -->
          </div>
    </div>
</div>
@endsection
