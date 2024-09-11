<div class="header-info">
  <div class="container">
    
        <ul class="top-menu">
          <li><Strong>Email :</Strong><a href="mail:{{ $content->email}}">{{ $content->email}}</a></li>
          <li><Strong>Phone :</Strong><a href="tel:{{ $content->phone}}">{{ $content->phone}}</a></li>
        </ul>

        <ul class="nav-menu nav-menu-social align-to-right">
         
        </ul>
  </div>
</div>

<div class="header header-light">
  <div class="container">
    <nav id="navigation" class="navigation navigation-landscape">
      <div class="nav-header">
        <a class="nav-brand" href="{{route('home')}}"><img src="{{ asset($content->logo) }}" class="logo" alt=""></a>
        <div class="nav-toggle"></div>
        <div class="mobile_nav">
          <ul>
           
         
          </ul>
        </div>
      </div>
      <div class="nav-menus-wrapper" style="transition-property: none;">
        <ul class="nav-menu">

          <li><a href="{{route('home')}}">Home</a></li>
          @php
              $services = App\Models\Service::latest()->take(3)->get();
          @endphp
        
          <li><a href="JavaScript:Void(0);">Services<span class="submenu-indicator"></span></a>
            <ul class="nav-dropdown nav-submenu">
              @foreach ($services as $item)
              <li><a href="{{route('serviceDetails', $item->id)}}">{{$item->name}}</a></li>
                  
              @endforeach
             
            </ul>
          </li>
          <li><a href="JavaScript:Void(0);">Gallery<span class="submenu-indicator"></span></a>
            <ul class="nav-dropdown nav-submenu">
             
              <li><a href="{{route('gallery.page')}}">Photo Gallery</a></li>
              <li><a href="{{route('videoGallery')}}">Video Gallery</a></li>
            </ul>
          </li>
          <li><a href="{{route('contact.page')}}">Contact Us</a></li>
          

        </ul>

        <ul class="nav-menu nav-menu-social align-to-right">

          <li class="list-buttons me-2">
            <a href="#" class="bg-primary" data-bs-toggle="modal" data-bs-target="#traking">
              <i class="fa-solid fa-magnifying-glass fs-6 me-2"></i>Order Tracking</a>
              
          </li>

       
          @if (Auth::guard('customer')->user())
          <li>
            <div class="btn-group account-drop">
              <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img src="{{ (!empty(Auth::guard('customer')->user()->profile_picture )) ? asset(Auth::guard('customer')->user()->profile_picture ) : asset('images/user_no_img.png') }}" class="img-fluid" alt="">
              </button>
              <div class="dropdown-menu pull-right animated flipInX">
                <div class="drp_menu_headr">
                  <h4>{{ Auth::guard('customer')->user()->name }}</h4>
                  
                </div>
                <ul>
                  <li><a href="{{route('customerDashboard')}}"><i class="fa-regular fa-id-card me-2"></i>My Dashboard</a></li>
                  <li><a href="{{route('myBooking')}}"><i class="fa-solid fa-ticket me-2"></i>My Booking</a></li>
                  <li><a href="{{route('customer.logout')}}"><i class="fa-solid fa-power-off me-2"></i>Sign Out</a></li>
                </ul>
              </div>
            </div>
          </li>
          @endif
         
         
        </ul>
      </div>
    </nav>
  </div>
</div>