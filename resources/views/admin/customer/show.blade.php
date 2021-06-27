@extends('admin.layout');
@section('page_title','Show Customer')
@section('customer','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">              
                <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title"> Customer Details</h3>
                    <a href="{{ route('customer.index') }}" class="btn btn-primary"> Back To Customer</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-bordered ">
                    <tbody>
                        <tr>
                            <th style="width: 200px">Image</th>
                            <td>
                                <div style="max-width:300px; max-height:300px; over-flow:hidden; margin-center:auto">
                                    <img src="{{ asset($customer->image) }}" class="img-fluid">
                                </div>    
                            </td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $customer->name }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $customer->email }}</td>
                        </tr>

                        <tr>
                            <th>Adress</th>
                            <td>{{ $customer->address }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $customer->city }}</td>
                        </tr>
                    
                        <tr>
                            <th>State</th>
                            <td>{{ $customer->state }}</td>
                        </tr>
                        <tr>
                            <th>ZIP</th>
                            <td>{{ $customer->zip }}</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>{{ $customer->company }}</td>
                        </tr>
                        <tr>
                            <th>GSTIN</th>
                            <td>{{ $customer->gstin }}</td>
                        </tr>
                        <tr>
                            <th>Create Date</th>
                            <td>{{ $customer->created_at->format('d M, Y') }}</td>
                        </tr>
                        <tr>
                            <th>Update Date</th>
                            <td>{{ $customer->updated_at->format('d M, Y') }}</td>
                        </tr>
            
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
