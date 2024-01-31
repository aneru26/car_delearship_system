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

                <div class="col-sm-6">
                    <div style="padding: 10px; float:right;">

                        <form action="{{ url('student/cars/list') }}" method="GET" class="form-inline">
                            <div class="row">
                                <!-- Search Bar -->
                                <div class="col-sm-6 mb-2">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-outline-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                        
                                <!-- Price Range Filtering -->
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <label for="min_price" class="input-group-prepend mr-2">Price Range:</label>
                                        <input type="text" name="min_price" id="min_price" class="form-control mr-2" placeholder="Min Price">
                                        <input type="text" name="max_price" id="max_price" class="form-control mr-2" placeholder="Max Price">
                                        <button type="submit" class="btn btn-outline-primary">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        
                        
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

            <div class="row">
                @if(count($getRecord) > 0)
                    @foreach ($getRecord as $car)
                        <div class="col-md-6 col-xl-4">
                            <div class="card  shadow-lg mb-5  rounded">
                                @if(!empty($car->getPhotoDirect()))
                                    <img src="{{ $car->getPhotoDirect() }}" style="height: 150px; width:200px; border-radius: 20px;" class="mx-auto">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title "><span class="text-danger">VIN:</span>{{ $car->vin}}</h5>
                                    <p class="card-text"><span class="text-danger">Brands:</span>{{ $car->brands }}</p> <p class="card-text"><span class="text-danger">Models:</span>{{ $car->models }}</p> <p class="card-text"><span class="text-danger">Price:</span>{{ number_format($car->price, 2, '.', ',') }}</p>
                                    
                                    <p class="card-text text-capitalize">{{ $car->color }} <span class="text-primary font-weight-bold">|</span> {{ $car->engine }} <span class="text-primary font-weight-bold">|</span>
                                        {{ $car->transmission }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="card-text">
                                            <small class="text-muted"><span class="text-danger">Deal By:</span>{{ $car->created_by_name}} {{ $car->created_by_last_name}}</small>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated {{ $car->updated_at->diffforhumans() }}</small>
                                        </p>
                                    </div>
                                    <a href="{{ url('student/cars/purchase/'.$car->id) }}" class="btn rounded-pill btn-icon btn-primary">
                                        <span class="nav-icon fas fa-shopping-cart"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p>No records found.</p>
                    </div>
                @endif

                <div style="padding: 10px; display: flex; justify-content: flex-end;">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
                
                
            </div>
            
        </div>
        
    </section>
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
