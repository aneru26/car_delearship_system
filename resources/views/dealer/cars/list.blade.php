@extends('layouts.app')  

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cars (Total : {{ $getRecord->total() }})</h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
            <a href="{{ url('dealer/cars/add')}}" class="btn btn-primary">Deal Cars</a>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
         </div>

          @include(' _message')

            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cars List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive" style="overflow:auto; " >
                <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Photo</th>
                      <th>VIN</th>
                      <th>Brands</th>
                      <th>Models</th>
                      <th>Color</th>
                      <th>Engine</th>
                      <th>Transmission</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th >Created Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                      <tr>
                        <td>{{  $value->id }}</td>
                        <td >
                          @if(!empty($value->getPhotoDirect()))
                          <img src="{{ $value->getPhotoDirect() }}" style="height: 50px; width:50px; border-radius: 100px;">
                          @endif
                        </td>
                        <td>{{  $value->vin }}</td>
                        <td>{{  $value->brands }}</td>
                        <td>{{  $value->models }}</td>
                        <td>{{  $value->color }}</td>
                        <td>{{  $value->engine }}</td>
                        <td>{{  $value->transmission }}</td>
                        <td>{{  $value->price }}</td>
                        <td>{{  $value->status }}</td>
                        <td>{{ $value->created_by_name }} {{ $value->created_by_last_name }}</td>
                          <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                        <td style="min-width: 140px;">
  <div class="btn-group">
    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Actions
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{ url('dealer/cars/edit/'.$value->id) }}">Edit</a>
      <a class="dropdown-item" href="{{ url('dealer/cars/delete/'.$value->id) }}">Delete</a>
    </div>
  </div>
</td>

                      </tr> 
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float:right;">
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </section> 
  </div>
  <!-- /.content-wrapper -->
    


@endsection