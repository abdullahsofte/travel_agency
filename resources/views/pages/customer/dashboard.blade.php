@extends('layouts.web_master')
@section('title', 'Dashboard')
@section('main_content')

    

	<!-- ============================ User Dashboard Menu ============================ -->
    @include('partials.user_menu')
    <!-- ============================ End user Dashboard Menu ============================ -->


    <!-- ============================ Hero Banner  Start================================== -->
    <div class="py-5 bg-primary position-relative">
        <div class="container">

            <!-- Search Form -->
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{route('selectBooking')}}" method="get">
                        @csrf
                        <div class="search-wrap bg-white rounded-3 p-3">
                            <div class="search-upper">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="flx-start mb-sm-0 mb-2">
                                      
                                    </div>
                                    <div class="flx-end d-flex align-items-center flex-wrap align-items-center">
                                        <div class="px-sm-2 pb-3 pt-0 ps-0 mob-full">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label ms-1 mt-1" for="adult_number"> Adults </label>
                                                <input class="form-check-input text-center" type="number" value="1" min="1"  name="adult_number">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label ms-1 mt-1" for="child_number"> Childs </label>
                                                <input class="form-check-input text-center" type="number" value="0" name="child_number">
                                            </div>
                                           
                                        </div>
                                        <div class="ps-1 pb-3 pt-0 mob-full">
                                       
                                        </div>
                                      </div>
                                    
                                </div>
           
                            </div>

                            <div class="row gx-lg-2 g-3">
                                <div class="col-xl-7 col-lg-6 col-md-12">
           
                                    <div class="row gy-3 gx-lg-2 gx-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class="leaving form-control fw-bold" name="from_location" required onchange="updateToLocationOptions(this)" required>
                                                    <option value="">Select</option>
                                                    @foreach ($location as $locationF)
                                                    <option value="{{ $locationF->id }}">{{$locationF->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="btn-flip-icon mt-md-0">
                                                <button class="p-0 m-0 text-primary"><i class="fa-solid fa-right-left"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-groupp hdd-arrow mb-0">
                                                <select class="goingto form-control fw-bold" name="to_location" required>
                                                    <option value="">Select</option>
                                                    @foreach ($location as $locationT)
                                                    <option value="{{ $locationT->id }}">{{$locationT->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-12">
                                    <div class="row gy-3 gx-lg-2 gx-3">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group mb-0">
                                                <input class="form-control fw-bold choosedate" name="booking_date" type="text"
                                                    placeholder="Date.." readonly="readonly" required>
                                                    @error('booking_date') <span style="color: red">{{$message}}</span> @enderror
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-12">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary full-width fw-medium">Book Now</button>
                                    </div>
                                </div>
           
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- </row> -->

        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Booking Page ================================== -->
    <section class="pt-5 gray-simple position-relative">
        <div class="container">

            @include('partials.user_sidebar')


            <div class="row align-items-start justify-content-between gx-xl-4">

                <div class="col-xl-3 col-lg-3 col-md-12">
                    <div class="card rounded-2 me-xl-5 mb-4">
                        <div class="card-top bg-primary position-relative">
                            <div class="position-absolute end-0 top-0 mt-4 me-3"><a href="{{route('customer.logout')}}"
                                    class="square--40 circle bg-light-dark text-light"><i
                                        class="fa-solid fa-right-from-bracket"></i></a></div>
                            <div class="py-5 px-3">
                                <div class="crd-thumbimg text-center">
                                    <div class="p-2 d-flex align-items-center justify-content-center brd"><img src="{{ Auth::guard('customer')->user()->profile_picture }}"
                                            class="img-fluid circle" width="120" alt=""></div>
                                </div>
                                <div class="crd-capser text-center">
                                    <h5 class="mb-0 text-light fw-semibold">{{ Auth::guard('customer')->user()->name }}</h5>
                                    <span class="text-light opacity-75 fw-medium text-md"><i
                                            class="fa-solid fa-location-dot me-2"></i>{{ Auth::guard('customer')->user()->address }}</span>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="card-middle px-4 py-5">
                            <div class="crdapproval-groups">

                                <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                                    <div class="crdapproval-item">
                                        <div class="square--50 circle bg-light-success text-success"><i
                                                class="fa-solid fa-envelope-circle-check fs-5"></i></div>
                                    </div>
                                    <div class="crdapproval-caps ps-2">
                                        <p class="fw-semibold text-dark lh-2 mb-0">Verified Email</p>
                                        <p class="text-md text-muted lh-1 mb-0">10 Aug 2022</p>
                                    </div>
                                </div>

                                <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                                    <div class="crdapproval-item">
                                        <div class="square--50 circle bg-light-success text-success"><i
                                                class="fa-solid fa-phone-volume fs-5"></i></div>
                                    </div>
                                    <div class="crdapproval-caps ps-2">
                                        <p class="fw-semibold text-dark lh-2 mb-0">Verified Mobile Number</p>
                                        <p class="text-md text-muted lh-1 mb-0">12 Aug 2022</p>
                                    </div>
                                </div>

                                <div class="crdapproval-single d-flex align-items-center justify-content-start">
                                    <div class="crdapproval-item">
                                        <div class="square--50 circle bg-light-warning text-warning"><i
                                                class="fa-solid fa-file-invoice fs-5"></i></div>
                                    </div>
                                    <div class="crdapproval-caps ps-2">
                                        <p class="fw-semibold text-dark lh-2 mb-0">Complete Basic Info</p>
                                        <p class="text-md text-muted lh-1 mb-0">Not Verified</p>
                                    </div>
                                </div>

                            </div>
                        </div> --}}

                    </div>
                </div>

                <div class="col-xl-9 col-lg-9 col-md-12">

                    <div class="row mb-2">
                        <div class="col-xl-3 col-lg-3 col-md-2">
                            <div class="card shadow rounded-4">
                                <!-- Card header -->
                                <div class="card-header d-flex justify-content-center align-items-center border-bottom py-3 px-4">
                                   
                                    <div class="ps-2">
                                        <div class="hstack gap-2 justify-content-center">
                                            <div class="prcs-currency text-center">
                                                <h2 class="fs-4 pricingtable__highlight js-montlypricing mb-0">{{$bookingItem}}</h2>
                                            </div>
                                        </div>
                                        <h6 class="text-uppercase fw-semibold lh-base" style="font-size: 15px">Today Booking</h6>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-2">
                            <div class="card shadow rounded-4">
                                <!-- Card header -->
                                <div class="card-header d-flex justify-content-center align-items-center border-bottom py-3 px-4">
                                  
                                    <div class="ps-2">
                                        <div class="hstack gap-2 justify-content-center">
                                            <div class="prcs-currency text-center">
                                                <h2 class="fs-4 pricingtable__highlight js-montlypricing mb-0" style="color: red">{{$bookingItemPending}}</h2>
                                            </div>
                                        </div>
                                        <h6 class="text-uppercase fw-semibold lh-base" style="font-size: 15px">Today Pending</h6>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-2">
                            <div class="card shadow rounded-4">
                                <!-- Card header -->
                                <div class="card-header d-flex justify-content-center align-items-center border-bottom py-3 px-4">
                                  
                                    <div class="ps-2">
                                        <div class="hstack gap-2 justify-content-center">
                                            <div class="prcs-currency text-center">
                                                <h2 class="fs-4 pricingtable__highlight js-montlypricing mb-0" style="color:green">{{$bookingItemApproved}}</h2>
                                            </div>
                                        </div>
                                        <h6 class="text-uppercase fw-semibold lh-base" style="font-size: 15px">Today Approved</h6>
                                    </div>
                                </div>
    
                            </div>
                        </div>

                        
                        

                        <div class="col-xl-3 col-lg-3 col-md-2">
                            <div class="card shadow rounded-4">
                                <!-- Card header -->
                                <div class="card-header d-flex justify-content-center align-items-center border-bottom py-3 px-4">
                                  
                                    <div class="ps-2">
                                        <div class="hstack gap-2 justify-content-center">
                                            <div class="prcs-currency">
                                                <h2 class="fs-4 pricingtable__highlight js-montlypricing mb-0" >{{$agentPoint}}</h2>
                                            </div>
                                        </div>
                                        <h6 class="text-uppercase fw-semibold lh-base" style="font-size: 15px">Earn Point</h6>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4><i class="fa-solid fa-file-invoice me-2"></i>Personal Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('updateAgent',  Auth::guard('customer')->user()->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row align-items-center justify-content-start">

                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                        <div class="d-flex align-items-center">
                                            <label class="position-relative me-4" for="uploadfile-1" title="Replace this pic">
                                                <!-- Avatar place holder -->
                                                <span class="avatar avatar-xl">
                                                    <img id="previewImage"
                                                        class="avatar-img rounded-circle border border-white border-3 shadow" src="{{ Auth::guard('customer')->user()->profile_picture }}"
                                                        alt="">
                                                </span>
                                                <div class="file-preview box sm">
                                                </div>
                                            </label>
                                            <!-- Upload button -->
                                            <label class="btn btn-sm btn-light-primary px-4 fw-medium mb-0" for="uploadfile-1">Change</label>
                                            <input id="uploadfile-1" class="form-control d-none" name="profile_picture" type="file">
                                        </div>
                                    </div>
    
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::guard('customer')->user()->name }}">
                                        </div>
                                    </div>
    
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email ID</label>
                                            <input type="email" class="form-control" name="email" value="{{ Auth::guard('customer')->user()->email }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">NID No.</label>
                                            <input type="text" class="form-control" name="nid_number" value="{{ Auth::guard('customer')->user()->nid_number }}">
                                        </div>
                                    </div>
    
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" class="form-control" name="phone" value="{{ Auth::guard('customer')->user()->phone }}">
                                        </div>
                                    </div>
    
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" name="date_of_birth" value="{{ Auth::guard('customer')->user()->date_of_birth }}">
                                        </div>
                                    </div>
    
                                    {{-- <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <input type="text" class="form-control" name="gender" value="{{ Auth::guard('customer')->user()->gender }}">
                                        </div>
                                    </div> --}}
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ Auth::guard('customer')->user()->address }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-md btn-primary mb-0">Update</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa-solid fa-lock me-2"></i>Update Password</h4>
                        </div>
                        <div class="card-body">
                           <form action="{{route('customerPasswordUpdate')}}" method="POST">
                            @csrf
                            <div class="row align-items-center justify-content-start">

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="currentPhone" class="form-control" placeholder="01XXXXXXXXXX">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Old Password</label>
                                        <input type="password" name="currentPass" class="form-control" placeholder="*********">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">New Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="*********">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="cpassword" class="form-control" placeholder="*********">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-md btn-primary mb-0">Change Password</button>
                                    </div>
                                </div>

                            </div>
                           </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Booking Page End ================================== -->
@endsection

@push('web_js')
    

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(100);

            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src =
        "{{ Auth::guard('customer')->user()->profile_picture ? Auth::guard('customer')->user()->profile_picture : '/noimage.png' }} ";
</script>

<script>
    function updateToLocationOptions(LocationDropdown) {
        var fromLocation = LocationDropdown.value;
        $.ajax({
            url: '/get-location',
            method: 'GET',
            data: {from_location: fromLocation},
            success: function (data) {
                // console.log(data);
                $('.goingto').empty();
                $('.goingto').append('<option value="">Select</option>');
                $.each(data.locations, function (index, location) {
                    $('.goingto').append('<option value="' + location.id + '">' + location.name + '</option>');
                });
            },
            error: function (error) {
                console.log('Error fetching data:', error);
            }
        });
    }
</script>
@endpush