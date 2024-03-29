@extends('layouts.app')  

@section('content')
  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center ">
            <h1 class="font-weight-bold text-primary">Add New Car</h1>
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
                <div class="col-md-3 col-sm-12 mb-3 text-center">
                    <label class="form-label">Car VIN</label>
                    <input type="text" class="form-control" value="{{ old('vin') }}" name="vin" placeholder="Car VIN">
                    <div style="color:red">{{ $errors->first('vin') }}</div>
                </div>

            
                <div class="col-md-3 col-sm-12 mb-3 text-center">
                  <label class="form-label">Brands</label>
                  <input type="text" class="form-control" value="{{ old('brands') }}" name="brands" placeholder="Brands">
                  <div style="color:red">{{ $errors->first('brands') }}</div>
              </div>
            
              <div class="col-md-3 col-sm-12 mb-3 text-center">
                <label class="form-label">Models</label>
                <input type="text" class="form-control" value="{{ old('models') }}" name="models" placeholder="Models">
                <div style="color:red">{{ $errors->first('models') }}</div>
            </div>
            
                <div class="col-md-3 col-sm-12 mb-3 text-center">
                    <label class="form-label">Color of car</label>
                    <select class="form-control" name="color" id="color"
                        value="{{ old('color') }}">
                        <option value="black">Black</option>
                        <option value="white">White</option>
                        <option value="red">Red</option>
                        <option value="blue">Blue</option>
                        <option value="green">Green</option>
                        <option value="yellow">Yellow</option>
                        <option value="orange">Orange</option>
                        <option value="purple">Purple</option>
                        <option value="ashen">Ashen</option>
                        <option value="silver">Silver</option>
                    </select>
                    <div style="color:red">{{ $errors->first('color') }}</div>
                </div>
            
                <div class="col-md-3 col-sm-12 mb-3 text-center">
                  <label class="form-label">Engine</label>
                  <input type="text" class="form-control" value="{{ old('engine') }}" name="engine" placeholder="Engine">
                  <div style="color:red">{{ $errors->first('engine') }}</div>
              </div>
            
              <div class="col-md-3 col-sm-12 mb-3 text-center">
                <label class="form-label">Transmission</label>
                <input type="text" class="form-control" value="{{ old('transmission') }}" name="transmission" placeholder="Transmission">
                <div style="color:red">{{ $errors->first('transmission') }}</div>
            </div>

            <div class="col-md-3 col-sm-12 mb-3 text-center">
              <label class="form-label">Price</label>
              <input type="number" class="form-control" value="{{ old('price') }}" name="price" placeholder="Price">
              <div style="color:red">{{ $errors->first('price') }}</div>
          </div>

            
            <div class="col-md-12 col-sm-12 mb-3 d-flex justify-content-center align-items-center gap-4 ">
              <div class="col-5 ">
                  <img src="{{ asset('dist/img/car1.png') }}" alt="user-avatar" class="d-block rounded img-fluid" id="uploadedAvatar" />
              </div>
              <div class="button-wrapper text-center">
                  <label for="photo">Photo</label>
                  <input type="file" class="form-control " name="photo" id="photo" onchange="previewImage(this)">
                  <p class="text-muted mb-0 ">Allowed JPG, GIF, or PNG. Max size of 800K</p>
                  <div style="color:red">{{ $errors->first('photo') }}</div>
                  <button type="button" class="btn btn-outline-secondary mt-2" onclick="resetImage()">Reset Image</button>
              </div>
          </div>

    
            
            </div>
            
                
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
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
      imgElement.src = '{{ asset('dist/img/car1.png') }}';

      // Reset the file input
      fileInput.value = '';
  }
</script>



@endsection