<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>rento</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('rento/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset ('rento/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset ('rento/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('rento/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset ('rento/images/loading.gif') }}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="/"><img src="{{ asset ('rento/images/logo.png') }}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="/"> Home  </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#about">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#contact">Contact us</a>
                              </li>
                           </ul>
                           <div class="sign_btn"><a href="{{ url('loginpage')}}">Sign in</a></div>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      <section class="banner_main">
        <div class="container">
            <div class="row d_flex">
                <div class="col-md-12">
                    <div class="text-bg">
                        <h1>Find Your Dream Car at Our Dealership</h1>
                        <strong>Explore Our Wide Selection of Vehicles</strong>
                        <span>Discover the Perfect Ride for You</span>
                        <p>
                            Welcome to our car dealership system! Whether you're looking for a sleek sedan, a spacious SUV, or a powerful truck, we have the perfect vehicle for you. Our expert team is dedicated to helping you find the ideal car that fits your lifestyle and budget.
                        </p>
                        <a href="#">Explore More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
      </div>
      <!-- end banner -->
      <!-- car -->
      <div  class="car">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                <div class="titlepage">
                    <h2>EXPLORE OUR DIVERSE SELECTION OF VEHICLES</h2>
                    <span>Find the perfect car to match your style and needs. </span>
                </div>
                
               </div>
            </div>
            <div class="row">
               <div class="col-md-4 padding_leri">
                  <div class="car_box">
                     <figure><img src="{{ asset ('rento/images/car_img1.png') }}" alt="#"/></figure>
                     <h3>Hundai</h3>
                  </div>
               </div>
               <div class="col-md-4 padding_leri">
                  <div class="car_box">
                     <figure><img src="{{ asset ('rento/images/car_img2.png') }}" alt="#"/></figure>
                     <h3>Audi</h3>
                  </div>
               </div>
               <div class="col-md-4 padding_leri">
                  <div class="car_box">
                     <figure><img src="{{  asset ('rento/images/car_img3.png') }}" alt="#"/></figure>
                     <h3>Bmw x5</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end car -->
      <!-- bestCar -->
      <div class="bestCar">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
               </div>
            </div>
            <div class="row">
               <div class="col-sm-12">
                  <div class="row">
                     <div class="col-md-6 offset-md-6">
                        <form class="main_form">
                           <div class="titlepage">
                              <h2>Find A  Best Car For Rent</h2>
                           </div>
                           <div class="row">
                              <div class="col-md-12 ">
                                 <select>
                                    <option value="0">Choose car Make</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                 </select>
                              </div>
                              <div class="col-md-12">
                                 <select>
                                    <option value="0">Choose Car Type </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                 </select>
                              </div>
                              <div class="col-md-12">
                                 <input class="contactus" placeholder="Search" type="Search" name="Search">                          
                              </div>
                              <div class="col-md-12">
                                 <select>
                                    <option value="0">Price of Rent</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                 </select>
                              </div>
                              <div class="col-sm-12 text-center">
                                <a href="{{ url('loginpage')}}" class="find_btn">Find Now</a>
                            </div>
                            
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end bestCar -->
      <!-- choose  section -->
      <div class="choose" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Discover the Advantages of Choosing Us</h2>
                        <span>When it comes to finding your perfect vehicle, we stand out for several reasons. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="choose_box">
                        <span>01</span>
                        <p>Our extensive selection of top-quality vehicles ensures you'll find the perfect match for your needs and preferences.</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="choose_box">
                        <span>02</span>
                        <p>We prioritize customer satisfaction, providing exceptional service and support throughout your car-buying journey.</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="choose_box">
                        <span>03</span>
                        <p>With our transparent pricing and financing options, you can trust that you're getting the best value for your investment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      <!-- end choose  section -->
      <!-- cutomer -->
      <div class="cutomer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>What Our Customers Say</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="myCarousel" class="carousel slide cutomer_Carousel" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <div class="cross_img">
                                            <figure><img src="{{ asset ('rento/images/cross_img.png') }}" alt="#"/></figure>
                                        </div>
                                        <div class="our cross_layout">
                                            <div class="test_box">
                                                <h4>Dave Marks</h4>
                                                <span>Rental</span>
                                                <p>"Great service! I found the perfect car for my trip, and the staff was incredibly helpful throughout the process."</p>
                                                <i><img src="images/te1.png" alt="#"/></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <div class="cross_img">
                                            <figure><img src="{{ asset ('rento/images/cross_img.png') }}" alt="#"/></figure>
                                        </div>
                                        <div class="our cross_layout">
                                            <div class="test_box">
                                                <h4>Jane Doe</h4>
                                                <span>Customer</span>
                                                <p>"I'm impressed with the quality of the vehicles available. It was easy to find exactly what I needed."</p>
                                                <i><img src="images/te1.png" alt="#"/></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <div class="cross_img">
                                            <figure><img src="{{ asset ('rento/images/cross_img.png') }}" alt="#"/></figure>
                                        </div>
                                        <div class="our cross_layout">
                                            <div class="test_box">
                                                <h4>Sarah Smith</h4>
                                                <span>Client</span>
                                                <p>"Excellent experience from start to finish. The team went above and beyond to ensure I got the perfect car."</p>
                                                <i><img src="images/te1.png" alt="#"/></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      <!-- end cutomer -->
      <!--  footer -->
      <footer>
         <div class="footer" id="contact">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="cont_call">
                        <h3> <strong class="multi color_chang"> Call Now</strong><br>
                           (+1) 12345667890
                        </h3>
                     </div>
                     
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2024 All Rights Reserved.</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="{{ asset('rento/js/jquery.min.js') }}"></script>
      <script src="{{ asset ('rento/js/popper.min.js') }}"></script>
      <script src="{{ asset ('rento/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset ('rento/js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset ('rento/js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset ('rento/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset ('rento/js/custom.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>

