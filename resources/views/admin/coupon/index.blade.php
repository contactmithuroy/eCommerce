@extends('admin.layout');

@section('page_title','Coupon ')
@section('coupon_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
              
              <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">All Coupon </h3>
                    <a href="{{ route('coupon.create') }}" class="btn btn-primary"> Add Coupon</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                   <div class="row">                            <!-- form start -->
                        <div class=" col-md-12 table-responsive table--no-card m-b-30">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Coupon Name</th>
                                        <th>Coupon Code</th>
                                        <th>Coupon Value</th>
                                        <th>Min Order Ammount</th>
                                        <th>Type</th>
                                        <th>Is One Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->id }}</td>
                                        <td>{{ $coupon->title }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->value }}Tk</td>
                                        <td>{{ $coupon->min_order_amt }}</td>
                                        <td>
                                            @if($coupon->type == 'per')
                                            <span class="badge badge-secondary">Percentage</span>
                                            @else
                                            <span class="badge badge-warning">Value</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($coupon->is_one_time == 1)
                                            <span class="badge badge-success">One Time</span>
                                            @else
                                            <span class="badge badge-danger">Multipale Time</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('coupon.edit', [$coupon->id]) }}" class="btn btn-primary mr-2"> 
                                                <i class="fas fa-edit"></i> </a>
                                            </a>
                                            <! status button !>
                                            @if(($coupon->status) == 1)
                                                <a href="{{ route('coupon.status', [$coupon->id,'0']) }}" class="btn btn-success mr-2"> 
                                                    <i class="fas fa-unlock"></i> </a>
                                                </a>

                                            @elseif(($coupon->status) == 0)
                                                <a href="{{ route('coupon.status', [$coupon->id,'1']) }}" class="btn btn-warning mr-2"> 
                                                    <i class="fas fa-lock"></i> </a>
                                                </a>
                                            @endif
                                            <form action="{{ route('coupon.delete',[$coupon->id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> </button>                                                
                                            </form>
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
