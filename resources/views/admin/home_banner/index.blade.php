@extends('admin.layout');

@section('page_title','Banner')
@section('banner','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
              
              <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">All Banner </h3>
                    <a href="{{ route('banner.create') }}" class="btn btn-primary"> Add Banner</a>
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
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Offer</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banners as $banner)
                                    <tr>
                                        <td>{{ $banner->id }}</td>
                                        <td>
                                            <div style="max-width:70px; max-height:70px; over-flow:hidden">
                                                <img src="{{ asset($banner->image) }}" class="img-fluid">
                                            </div> 
                                        </td>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->offer }}</td>
                                        <td>{{ $banner->description }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('banner.edit', [$banner->id]) }}" class="btn btn-primary mr-2"> 
                                                <i class="fas fa-edit"></i> </a>
                                            </a>
                                            <! status button !>
                                            @if(($banner->status) == 1)
                                                <a href="{{ route('banner.status', [$banner->id,'0']) }}" class="btn btn-success mr-2"> 
                                                    <i class="fas fa-unlock"></i> </a>
                                                </a>

                                            @elseif(($banner->status) == 0)
                                                <a href="{{ route('banner.status', [$banner->id,'1']) }}" class="btn btn-warning mr-2"> 
                                                    <i class="fas fa-lock"></i> </a>
                                                </a>
                                            @endif
                                            <a href="{{ route('banner.delete',[$banner->id]) }}" class="btn btn-danger mr-2"> 
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
