@extends('layouts.web_master')
@section('title', 'My Booking')
@section('main_content')


<!-- ============================ User Dashboard Menu ============================ -->


@include('partials.user_menu')
<!-- ============================ End user Dashboard Menu ============================ -->


<!-- ============================ Booking Page ================================== -->
<section class="pt-5 gray-simple position-relative">
    <div class="container">


        @include('partials.user_sidebar')

        <div class="row align-items-start justify-content-between gx-xl-4">

            <div class="col-xl-4 col-lg-4 col-md-12">
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


            <div class="col-xl-8 col-lg-8 col-md-12">

                <!-- Personal Information -->
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-ticket me-2"></i>My Bookings</h4>
                    </div>
                    <div class="card-body">
                       

                        <div class="row align-items-center justify-content-start">
                            <div class="col-xl-12 col-lg-12 col-md-12">

                                <!-- Single Item -->
                                @foreach ($booking as $item)
                                    
                                <div class="card border br-dashed mb-4">
                                  

                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-sm-6 col-md-2">
                                                <span>Code</span>
                                                <p class="mb-0">{{$item->code}}</p>
                                            </div>
                                            <div class="col-sm-6 col-md-2">
                                                <span>Name</span>
                                                <p class="mb-0">{{$item->name}}</p>
                                            </div>

                                            <div class="col-sm-6 col-md-2">
                                                <span>Booking Time</span>
                                                <p class="mb-0">{{ date('d M Y',strtotime($item->booking_date)) }}</p>
                                            </div>

                                            <div class="col-sm-6 col-md-2">
                                                <span>Phone</span>
                                                <p class="mb-0">{{ $item->phone }}</p>
                                            </div>
                                            <div class="col-sm-6 col-md-2">
                                                <span>Leaving From</span>
                                                <p class="mb-0">{{ $item->locationF->name }}</p>
                                            </div>
                                            <div class="col-sm-6 col-md-2">
                                                <span>Going To</span>
                                                <p class="mb-0">{{ $item->locationT->name }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- ============================ Booking Page End ================================== -->
    
@endsection