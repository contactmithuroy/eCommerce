@extends('admin.layout');

@section('page_title','Tax')
@section('tax','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
              
              <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">All Tax </h3>
                    <a href="{{ route('tax.create') }}" class="btn btn-primary"> Add Tax</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                   <div class="row">
                        <div class=" col-md-12 table-responsive table--no-card m-b-30">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tax Description</th>
                                        <th>Tax Value</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($taxes as $tax)
                                    <tr>
                                        <td>{{ $tax->id }}</td>
                                        <td>{{ $tax->tax_description }}</td>
                                        <td>{{ $tax->tax_value }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('tax.edit', [$tax->id]) }}" class="btn btn-primary mr-2"> 
                                                <i class="fas fa-edit"></i> </a>
                                            </a>
                                            <! status button !>
                                            @if(($tax->status) == 1)
                                                <a href="{{ route('tax.status', [$tax->id,'0']) }}" class="btn btn-success mr-2"> 
                                                    <i class="fas fa-unlock"></i> </a>
                                                </a>

                                            @elseif(($tax->status) == 0)
                                                <a href="{{ route('tax.status', [$tax->id,'1']) }}" class="btn btn-warning mr-2"> 
                                                    <i class="fas fa-lock"></i> </a>
                                                </a>
                                            @endif
                                            <a href="{{ route('tax.delete',[$tax->id]) }}" class="btn btn-danger mr-2"> 
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
