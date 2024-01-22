<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Dealer System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style1.css') }}">

  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

</head>
<body class="img js-fullheight" style="background-color: #000000;">

  <div id="particles-js"></div>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <!-- Replace the text with your logo image -->
            <img src="{{ asset('frontend/images/car_dealership.png') }}" alt="Logo" class="logo-image" style=" width: 250px; 
            height: auto;">
        </div>
    </div>
    
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">

            <?php $session = true; ?>

		      	<h3 class="mb-4 text-center" style="font-weight: bold">SIGN IN</h3>

            @if (!$session)
    <div class="alert alert-warning">
        You have been auto-logged out due to inactivity. Please sign in again.
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
            @include(' _message')
            
    
		      	<form action="{{ url('login') }}" class="signin-form" method="post">
					{{ csrf_field() }}
		      		<div class="form-group">
		      			<input type="email" class="form-control" name="email" placeholder="Email" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" name="password" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	          
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked name="remember" id="remember">
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="{{ url('forgot-password')}}" style="color: #fff">Forgot Password?</a>
								</div>
                
	            </div>

              <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>

         
              
	          </form>
            <div class="form-group d-md-flex">
             
              <div class="w-100 text-md-center">
                <a href="{{ url('register')}}" style="display: inline-block; font-weight:bold; margin-top: 20px; padding: 10px 30px; background-color: rgb(255, 255, 255); color: #000000; border-radius: 20px; text-decoration: none;">Create Account</a>
            </div>
            
              
            </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/js/popper.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  <script src="{{ asset('frontend/js/particle.js') }}"></script>
  
 
</body>
</html>


