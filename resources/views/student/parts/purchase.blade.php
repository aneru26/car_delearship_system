@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center">
            <h1 class="text-primary font-weight-bold">Parts Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
           
            <div class="card card-primary">
              
             
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
                            <h5 class="card-title "><span class="text-danger">Parts Name:</span>{{ $getRecord->parts_name }}</h5>
                            <p class="card-text">
                              <span class="text-danger">Models:</span>
                              @if(isset($getRecord))
                                @php
                                  $selectedModel = $getModel->firstWhere('id', $getRecord->car_models);
                                @endphp
                            
                                @if($selectedModel)
                                  {{ $selectedModel->models }}
                                @else
                                  No model selected
                                @endif
                              @endif
                            </p>
                             <p class="card-text"><span class="text-danger">Price:</span>{{ $getRecord->price }}</p>
                          
                            <div class="d-flex justify-content-between align-items-center">

                                <p class="card-text">
                                    <small class="text-muted">Last updated {{ $getRecord->updated_at->diffforhumans() }}</small>
                                </p>

                            </div>
              
                        </div>
                    </div>
                </div>


            </div>

            <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-shopping-cart"></i> Purchase
                  </button>
                </div>
            
                
                </div>
                <!-- /.card-body -->
              </form>
              
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