<div class="dashboard-menus border-top d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <ul class="user-Dashboard-menu">
                    <li><a href="{{route('customerDashboard')}}"><i class="fa-regular fa-id-card me-2"></i>My Dashboard</a></li>
                    <li class="active"><a href="{{route('myBooking')}}"><i class="fa-solid fa-ticket me-2"></i>My Booking</a></li>
                    {{-- <li><a href="{{route('travelers')}}"><i class="fa-solid fa-user-group me-2"></i>Travelers</a></li> --}}
                    {{-- <li><a href="{{route('paymentDetails')}}"><i class="fa-solid fa-wallet me-2"></i>Payment Details</a></li> --}}
                    <li><a href="{{route('customer.logout')}}"><i class="fa-solid fa-power-off me-2"></i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>