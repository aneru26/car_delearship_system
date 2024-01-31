<nav class="main-header navbar navbar-expand-lg navbar-dark bg-black shadow">
  <div class="container">
      <a href="{{ url('admin/dashboard')}}" class="brand-link">
          <img src="{{ asset('frontend/images/car_dealership.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          
      </a>
      <!-- Toggler/collapsible Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      

      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto bg-black">
              <!-- Your navigation items here -->

              @if(Auth::user()->user_type == 1)
              <li class="nav-item">
                  <a href="{{ url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif text-white">
                      <p>Dashboard</p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ url('admin/student/list')}}" class="nav-link @if(Request::segment(2) == 'student')active @endif text-white">
                      <p> Customer</p>
                  </a>
              </li>
<li class="nav-item">
 <a href="{{ url('admin/dealer/list')}}" class="nav-link @if(Request::segment(2) == 'dealer')active @endif text-white">
  
   <p>
    Dealer
   </p>
 </a>
</li>


<li class="nav-item">
 <a href="{{ url('admin/cars/list')}}" class="nav-link @if(Request::segment(2) == 'car')active @endif text-white">
  
   <p>
    Vehicles
   </p>
 </a>
</li>

<li class="nav-item">
  <a href="{{ url('admin/purchase/list')}}" class="nav-link @if(Request::segment(2) == 'purchase')active @endif text-white">
   
    <p>
     Orders
    </p>
  </a>
 </li>


 <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Inventory
  </a>
  <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
    <a class="dropdown-item @if(Request::segment(2) == 'inventory')active @endif text-white" href="{{ url('admin/inventory/list')}}">List</a>
    <a class="dropdown-item @if(Request::segment(2) == 'inventorysales')active @endif text-white" href="{{ url('admin/inventorysales/sales')}}">Sales</a>
  </div>
</li>


@elseif(Auth::user()->user_type == 3)
<li class="nav-item">
        
  <li class="nav-item">
    <a href="{{ url('dealer/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif text-white">
      <p class="pl-3">Dashboard</p>
    </a>
  </li>
  
  <li class="nav-item">
    <a href="{{ url('dealer/cars/list')}}" class="nav-link @if(Request::segment(2) == 'cars')active @endif text-white">
      <p class="pl-3">Cars</p>
    </a>
  </li>
  
  <li class="nav-item">
    <a href="{{ url('dealer/purchase/list')}}" class="nav-link @if(Request::segment(2) == 'purchase')active @endif text-white">
      <p class="pl-3">Purchase Car</p>
    </a>
  </li>

  @elseif(Auth::user()->user_type == 4)
<li class="nav-item">
        
 
  <li class="nav-item">
   
    <a href="{{ url('supplier/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard')active @endif text-white">
     
      <p class="pl-3">
        Dashboard
      
      </p>
    </a>
  </li>
  
  <li class="nav-item">
    <a href="{{ url('supplier/parts/list')}}" class="nav-link @if(Request::segment(2) == 'cars')active @endif text-white">

      <p class="pl-3">
       Car Parts
      </p>
    </a>
    </li>
  
    <li class="nav-item">
      <a href="{{ url('supplier/purchase/list')}}" class="nav-link @if(Request::segment(2) == 'purchase')active @endif text-white">
       
        <p class="pl-3">
         Purchase Parts
       </p>
      </a>
      </li>
  


@elseif(Auth::user()->user_type == 2)

<li class="nav-item">
  <a href="{{ url('student/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif text-white">

    <p>
      Dashboard
      
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{ url('student/cars/list')}}" class="nav-link @if(Request::segment(2) == 'cars')active @endif text-white">
 
    <p>
     Vehicles
    </p>
  </a>
</li>


  <li class="nav-item dropdown">
    <a href="#" class="nav-link dropdown-toggle text-white" id="purchaseDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Orders
    </a>
    <div class="dropdown-menu bg-dark" aria-labelledby="purchaseDropdown">
        <a href="{{ url('student/notpurchase/list')}}" class="dropdown-item @if(Request::segment(2) == 'notpurchase')active @endif text-white">
          Decline Order
        </a>
        <a href="{{ url('student/purchase/list')}}" class="dropdown-item @if(Request::segment(2) == 'purchase')active @endif text-white">
          Accepted Order
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
                  <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img style="height: 40px; width: 40px;" src="{{  Auth::user()->getProfileDirect() }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}">
                      {{ Auth::user()->name }} {{ Auth::user()->last_name }}  ({{ isset($userTypes[$userType]) ? $userTypes[$userType] : 'Unknown Role' }} )
                  </a>
                  <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="userDropdown">

                    <a class="dropdown-item text-white" href="{{ url(Auth::user()->user_type == 1 ? 'admin/account' : (Auth::user()->user_type == 2 ? 'student/account' : (Auth::user()->user_type == 3 ? 'dealer/account' : (Auth::user()->user_type == 4 ? 'supplier/account' : '')))) }}">My Account</a>

                    <a class="dropdown-item text-white" href="{{ url(Auth::user()->user_type == 1 ? 'admin/change_password' : (Auth::user()->user_type == 2 ? 'student/change_password' : (Auth::user()->user_type == 3 ? 'dealer/change_password' : (Auth::user()->user_type == 4 ? 'supplier/change_password' : '')))) }}">Change Password</a>


                      
                      <a class="dropdown-item text-white" href="{{ url('logout')}}">Logout</a>
                  </div>
              </li>
          </ul>
      </div>
  </div>
</nav>
