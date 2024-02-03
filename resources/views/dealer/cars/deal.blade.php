@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1 class="text-primary font-weight-bold">Cars Details</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

          <form method="post" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="row">

             
                <div class="col-md-6 col-xl-6">
                    <div class="card  shadow-lg mb-5  rounded">
                        @if(!empty($getRecord->getPhotoDirect()))
                        <img src="{{ $getRecord->getPhotoDirect() }}" style="max-height: 450px; width: 100%; border-radius: 20px;" class="mx-auto img-fluid">
                        @endif

                    </div>
                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="card  shadow-lg mb-5  rounded">

                        <div class="card-body">
                            <h5 class="card-title "><span class="text-danger">VIN:</span>{{ $getRecord->vin }}</h5>
                            <p class="card-text"><span class="text-danger">Brands:</span>{{ $getRecord->brands }}</p> <p class="card-text"><span class="text-danger">Models:</span>{{ $getRecord->models }}</p> <p class="card-text"><span class="text-danger">Price:</span>{{ $getRecord->price }}</p>
                            <p class="card-text text-capitalize">{{ $getRecord->color }} <span class="text-primary font-weight-bold">|</span> {{ $getRecord->engine }} <span class="text-primary font-weight-bold">|</span>
                                {{ $getRecord->transmission }}</p>
                            <div class="d-flex justify-content-between align-items-center">

                                <p class="card-text">
                                    <small class="text-muted">Last updated {{ $getRecord->updated_at->diffforhumans() }}</small>
                                </p>

                            </div>
                          
                        </div>
                        
                    </div>
                  
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">
                      <i class="nav-icon ion-pricetag"></i> Deal
                    </button>
                  </div>
            </div>
          </form>

        </div>
    </section>
</div>

@endsection

@section('script')

@endsection
