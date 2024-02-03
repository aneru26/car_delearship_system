@extends('layouts.app')  

@section('content')
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Total Brands (Total : {{ $getRecord->total() }})</h1>
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
                <h3 class="card-title">Sales List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive" style="overflow:auto; " >
             
                <table class="table table-striped" id="myTable">
                  <thead>
                    <tr>
                
                      <th>Brands</th>
                      <th>TOtal Sales</th>
                      <th>TOtal Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                    <tr>
                      <td>{{  $value->brands }}</td>
                      <td>{{ $value->total_sales }}</td>
                      <td>{{ $value->total_price }}</td>
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