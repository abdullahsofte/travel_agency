<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}
                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Web Content
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('welcome.index') }}">Welcome</a>
                        <a class="nav-link" href="{{ route('slider.index') }}">Slider Entry</a>
                        <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                        <a class="nav-link" href="{{ route('hotels.index') }}">Add Hotel</a>
                        <a class="nav-link" href="{{ route('tour.package') }}">Tour Package</a>
                        <a class="nav-link" href="{{ route('about.index') }}">About</a>
                        <a class="nav-link" href="{{ route('photo.gallery') }}">Gallery Entry</a>
                        <a class="nav-link" href="{{ route('elite.travel') }}">Elite Travel</a>
                        <a class="nav-link" href="{{ route('traveller.index') }}">Traveller Say</a>
                        <a class="nav-link" href="{{ route('service.index') }}">Services Entry</a>
                        <a class="nav-link" href="{{ route('benefit.index') }}">Benefits Entry</a>
                    </nav>
                </div> --}}
                <a class="nav-link {{ Route::is('bookingPendingList') ? 'active' : '' }}" href="{{ route('bookingPendingList') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                     Booking Pending List
                </a>

                <a class="nav-link {{ Route::is('bookingList') ? 'active' : '' }}" href="{{ route('bookingList') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                     Booking Confirm List
                </a>
                <a class="nav-link {{ Route::is('agentBookingList') ? 'active' : '' }}" href="{{ route('agentBookingList') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                     Agent Booking List
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Trip 
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('airbusType.index') }}">Airbus Type</a>
                        <a class="nav-link" href="{{ route('tripClass.index') }}">Trip Class Entry</a>
                        <a class="nav-link" href="{{ route('airbus.index') }}">Airbus Entry</a>
                        {{-- <a class="nav-link" href="{{ route('trip.index') }}">Trip Entry</a> --}}
                    </nav>
                </div>

                <a class="nav-link {{ Route::is('company.profile') ? 'active' : '' }}" href="{{ route('company.profile') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                     Company Profile
                </a>
                {{-- <a class="nav-link {{ Route::is('addAgent') ? 'active' : '' }}" href="{{ route('addAgent') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-magnet"></i></div>
                     Agent Entry 
                </a> --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts11" aria-expanded="false" aria-controls="collapseLayouts11">
                    <div class="sb-nav-link-icon"><i class="fas fa-magnet"></i></div>
                    Agent
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts11" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('addAgent') }}">Agent Entry </a>
                        <a class="nav-link" href="{{ route('agentList') }}">Agent List</a>
                        <a class="nav-link" href="{{ route('agentCommission') }}">Agent Commission</a>
                        <a class="nav-link" href="{{ route('agentDueList') }}">Agent Due List</a>
                    </nav>
                </div>
                <a class="nav-link {{ Route::is('location.index') ? 'active' : '' }}" href="{{ route('location.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-location-arrow"></i></div>
                     Location Entry 
                </a>
                <a class="nav-link {{ Route::is('slider.index') ? 'active' : '' }}" href="{{ route('slider.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-sliders-h"></i></div>
                     Slider Entry 
                </a>
                <a class="nav-link {{ Route::is('about.index') ? 'active' : '' }}" href="{{ route('about.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                     About Us
                </a>
                <a class="nav-link {{ Route::is('photo.gallery') ? 'active' : '' }}" href="{{ route('photo.gallery') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                     Gallery Entry
                </a>
                <a class="nav-link {{ Route::is('video.gallery') ? 'active' : '' }}" href="{{ route('video.gallery') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                     Video Gallery Entry
                </a>
                <a class="nav-link {{ Route::is('service.index') ? 'active' : '' }}" href="{{ route('service.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                     Services Entry
                </a>
                <a class="nav-link {{ Route::is('benefit.index') ? 'active' : '' }}" href="{{ route('benefit.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-yin-yang"></i></div>
                     Benefits Entry
                </a>
               
                {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#settingPages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Settings
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="settingPages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="{{ route('addAgent') }}">Agent Entry</a>
                        <a class="nav-link" href="{{ route('location.index') }}">Location Entry</a>
                        <a class="nav-link" href="{{ route('company.profile') }}">Company Profile</a>
                    </nav>
                </div> --}}

                <a class="nav-link {{ Route::is('messages.index') ? 'active' : '' }}" href="{{ route('messages.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                    Contact Message
                </a>
            </div>
        </div>
    </nav>
</div>