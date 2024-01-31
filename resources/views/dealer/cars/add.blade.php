@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="text-primary font-weight-bold">Deal A Car</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">

          
          @if(count($getRecord) > 0)
              @foreach ($getRecord as $car)
                  <div class="col-md-6 col-xl-6">
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
                                      <small class="text-muted"><span class="text-danger">Created By:</span>{{ $car->created_by_name}} {{ $car->created_by_last_name}}</small>
                                  </p>
                                  <p class="card-text">
                                      <small class="text-muted">Last updated {{ $car->updated_at->diffforhumans() }}</small>
                                  </p>
                              </div>
                              <a href="{{ url('dealer/cars/deal/'.$car->id) }}" class="btn rounded-pill btn-icon btn-primary ">
                                <span class="nav-icon ion-pricetag"></span>

                                  
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
        
</div>
    </section>
  
  </div>

  

@endsection

@section('script')


  <script src="{{ asset ('plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script type="text/javascript">

  $(function ()
  {
    $('#compose-textarea').summernote({
      height: 200
    });

    $('#getClass').change(function(){
      var class_id = $(this).val();
      $.ajax({
        type:"POST",
        url:"{{ url('teacher/ajax_get_subject') }}",
        data : {
          "_token": "{{ csrf_token() }}",
          class_id: class_id,
        },
        dataType: "json",
        success:function(data){
              $('#getSubject').html(data.success);
        }
      });
    });
  });


</script>

<script>
  function previewImage(input) {
      var fileInput = input;
      var imgElement = document.getElementById('uploadedAvatar');

      if (fileInput.files && fileInput.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              imgElement.src = e.target.result;
          };

          reader.readAsDataURL(fileInput.files[0]);
      }
  }

  function resetImage() {
      var imgElement = document.getElementById('uploadedAvatar');
      var fileInput = document.getElementById('photo');

      // Reset the image to the default one
      imgElement.src = '{{ asset('dist/img/car.png') }}';

      // Reset the file input
      fileInput.value = '';
  }
</script>



@endsection