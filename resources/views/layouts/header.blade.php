
<nav class="main-header navbar navbar-expand-lg navbar-white navbar-light shadow">
  <div class="container">
      <a href="{{ url('admin/dashboard')}}" class="brand-link">
          <img src="{{ asset('frontend/images/car_dealership.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Car Dealer</span>
      </a>
      <!-- Toggler/collapsible Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      

      <div class="collapse navbar-collapse bg-white" id="navbarNav">
          <ul class="navbar-nav mx-auto">
              <!-- Your navigation items here -->

              @if(Auth::user()->user_type == 1)
              <li class="nav-item">
                  <a href="{{ url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
                      <p>Dashboard</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ url('admin/student/list')}}" class="nav-link @if(Request::segment(2) == 'student')active @endif">
                      <p> Customer</p>
                  </a>
              </li>
<li class="nav-item">
 <a href="{{ url('admin/dealer/list')}}" class="nav-link @if(Request::segment(2) == 'dealer')active @endif">
  
   <p>
    Dealer
   </p>
 </a>
</li>

<li class="nav-item">
 <a href="{{ url('admin/supplier/list')}}" class="nav-link @if(Request::segment(2) == 'supplier')active @endif">
   
   <p>
    Supplier
   </p>
 </a>
</li>

<li class="nav-item">
 <a href="{{ url('admin/cars/list')}}" class="nav-link @if(Request::segment(2) == 'car')active @endif">
  
   <p>
    Cars
   </p>
 </a>
</li>

<li class="nav-item">
 <a href="{{ url('admin/parts/list')}}" class="nav-link @if(Request::segment(2) == 'parts')active @endif">
  
   <p>
     Car Parts
   </p>
 </a>
</li>


<li class="nav-item dropdown">
  <a href="#" class="nav-link dropdown-toggle" id="purchaseDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Purchase
  </a>
  <div class="dropdown-menu" aria-labelledby="purchaseDropdown">
      <a href="{{ url('admin/purchase/list')}}" class="dropdown-item @if(Request::segment(2) == 'purchase')active @endif">
          Purchase Car
      </a>
      <a href="{{ url('admin/purchase_parts/list')}}" class="dropdown-item @if(Request::segment(2) == 'purchase_parts')active @endif">
          Purchase Parts
      </a>
  </div>
</li>

 </li>




@elseif(Auth::user()->user_type == 3)
<li class="nav-item">
        
  <li class="nav-item">
    <a href="{{ url('dealer/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
      <p class="pl-3">Dashboard</p>
    </a>
  </li>
  
  <li class="nav-item">
    <a href="{{ url('dealer/cars/list')}}" class="nav-link @if(Request::segment(2) == 'cars')active @endif">
      <p class="pl-3">Cars</p>
    </a>
  </li>
  
  <li class="nav-item">
    <a href="{{ url('dealer/purchase/list')}}" class="nav-link @if(Request::segment(2) == 'purchase')active @endif">
      <p class="pl-3">Purchase Car</p>
    </a>
  </li>

  @elseif(Auth::user()->user_type == 4)
<li class="nav-item">
        
 
  <li class="nav-item">
   
    <a href="{{ url('supplier/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif">
     
      <p class="pl-3">
        Dashboard
      
      </p>
    </a>
  </li>
  
  <li class="nav-item">
    <a href="{{ url('supplier/parts/list')}}" class="nav-link @if(Request::segment(2) == 'cars')active @endif">

      <p class="pl-3">
       Car Parts
      </p>
    </a>
    </li>
  
    <li class="nav-item">
      <a href="{{ url('supplier/purchase/list')}}" class="nav-link @if(Request::segment(2) == 'purchase')active @endif">
       
        <p class="pl-3">
         Purchase Parts
       </p>
      </a>
      </li>
  


@elseif(Auth::user()->user_type == 2)

<li class="nav-item">
  <a href="{{ url('student/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">

    <p>
      Dashboard
      
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{ url('student/cars/list')}}" class="nav-link @if(Request::segment(2) == 'cars')active @endif">
 
    <p>
     Cars
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{ url('student/parts/list')}}" class="nav-link @if(Request::segment(2) == 'parts')active @endif">
   
    <p>
     Car Parts
    </p>
  </a>
  </li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" id="purchaseDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Purchase Car
    </a>
    <div class="dropdown-menu" aria-labelledby="purchaseDropdown">
        <a href="{{ url('student/notpurchase/list')}}" class="dropdown-item @if(Request::segment(2) == 'notpurchase')active @endif">
          Decline Purchase
        </a>
        <a href="{{ url('student/purchase/list')}}" class="dropdown-item @if(Request::segment(2) == 'purchase')active @endif">
          Accepted Purchase
        </a>
    </div>
  </li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle" id="purchaseDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Purchase Parts
    </a>
    <div class="dropdown-menu" aria-labelledby="purchaseDropdown">
        <a href="{{ url('student/purchase_parts/list')}}" class="dropdown-item @if(Request::segment(2) == 'notpurchase')active @endif">
          Decline Purchase
        </a>
        <a href="{{ url('student/accepted_purchase_parts/list')}}" class="dropdown-item @if(Request::segment(2) == 'purchase')active @endif">
          Accepted Purchase
        </a>
    </div>
  </li>



     @endif  
     </ul>
     <ul class="navbar-nav ml-auto">
      @php
      $userTypes = [
          1 => 'Admin',
          2 => 'Customer',
          3 => 'Dealer',
          4 => 'Supplier',
      ];
  
      $userType = Auth::user()->user_type;
  @endphp

              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img style="height: 40px; width: 40px;" src="{{  Auth::user()->getProfileDirect() }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
                      {{ Auth::user()->name }} {{ Auth::user()->last_name }}  ({{ isset($userTypes[$userType]) ? $userTypes[$userType] : 'Unknown Role' }} )
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <a class="dropdown-item" href="{{ url(Auth::user()->user_type == 1 ? 'admin/account' : (Auth::user()->user_type == 2 ? 'student/account' : (Auth::user()->user_type == 3 ? 'dealer/account' : (Auth::user()->user_type == 4 ? 'supplier/account' : '')))) }}">My Account</a>

                    <a class="dropdown-item" href="{{ url(Auth::user()->user_type == 1 ? 'admin/change_password' : (Auth::user()->user_type == 2 ? 'student/change_password' : (Auth::user()->user_type == 3 ? 'dealer/change_password' : (Auth::user()->user_type == 4 ? 'supplier/change_password' : '')))) }}">Change Password</a>


                      
                      <a class="dropdown-item" href="{{ url('logout')}}">Logout</a>
                  </div>
              </li>
          </ul>
      </div>
  </div>
</nav>
