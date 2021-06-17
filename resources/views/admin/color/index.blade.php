@extends('admin.layout');

@section('page_title','Color ')
@section('color_select','active')
@section('container')
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header mt-3">
              
              <div class=" d-flex justify-content-between align-item-center ">
                    <h3 class="card-title">All Color </h3>
                    <a href="{{ route('color.create') }}" class="btn btn-primary"> Add Color</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="card card-primary">
                   <div class="row">                            <!-- form start -->
                        <div class=" col-md-12 table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Color</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($colors as $color)
                                    <tr>
                                        <td>{{ $color->id }}</td>
                                        <td>{{ $color->color }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('color.edit', [$color->id]) }}" class="btn btn-primary mr-2"> 
                                                <i class="fas fa-edit"></i> </a>
                                            </a>
                                            <! status button !>
                                            @if(($color->status) == 1)
                                                <a href="{{ route('color.status', [$color->id,'0']) }}" class="btn btn-success mr-2"> 
                                                    <i class="fas fa-unlock"></i> </a>
                                                </a>

                                            @elseif(($color->status) == 0)
                                                <a href="{{ route('color.status', [$color->id,'1']) }}" class="btn btn-warning mr-2"> 
                                                    <i class="fas fa-lock"></i> </a>
                                                </a>
                                            @endif
                                            <form action="{{ route('color.delete',[$color->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> </button>                                                
                                            </form>
                                            {{-- <a href="{{ route('color.destroy', [$color->id]) }}" class="btn btn-danger "> 
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
