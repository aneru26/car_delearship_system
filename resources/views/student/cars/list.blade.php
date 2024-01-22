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
                            <!-- Search Bar -->
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-primary">Search</button>
                                </div>
                            </div>

                            <!-- Sorting Dropdown -->
                            <label for="sort" class="ml-2 mr-2">Sort by:</label>
                            <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Offers</option>
                                <option value="low_to_high" {{ request('sort') == 'low_to_high' ? 'selected' : '' }}>Starting Price: Low to High</option>
                                <option value="high_to_low" {{ request('sort') == 'high_to_low' ? 'selected' : '' }}>Starting Price: High to Low</option>
                                <optgroup label="Price Range">
                                    <option value="1-2" {{ request('sort') == '1-2' ? 'selected' : '' }}>1,00,000 - 2,000,000</option>
                                    <option value="2-3" {{ request('sort') == '2-3' ? 'selected' : '' }}>2,000,000 - 3,000,000</option>
                                    <option value="3-4" {{ request('sort') == '3-4' ? 'selected' : '' }}>3,000,000 - 4,000,000</option>
                                    <option value="4-5" {{ request('sort') == '4-5' ? 'selected' : '' }}>4,000,000 - 5,000,000</option>
                                </optgroup>
                            </select>
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
