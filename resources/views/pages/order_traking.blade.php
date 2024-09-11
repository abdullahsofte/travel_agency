@extends('layouts.web_master')
@section('title', 'Flight Booking')
@section('main_content')

	<!-- ============================ Booking Page ================================== -->
    <section class="py-4 gray-simple position-relative">
        <div class="container">

            <div class="row align-items-start">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card mb-3">
                        <div class="car-body px-xl-5 px-lg-4 py-lg-5 py-4 px-2">

                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <div class="square--80 circle text-light bg-success"><i class="fa-solid fa-check-double fs-1"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center flex-column text-center mb-5">
                                <h3 class="mb-0">Your Invoice</h3>
                                <p class="text-md mb-0">Need any information contact this number: <a href="tel:01700000000"
                                        class="text-primary">01700000000</a></p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center flex-column mb-4">
                                <div class="border br-dashed full-width rounded-2 p-3 pt-0">
                                    <ul class="row align-items-center justify-content-start g-3 m-0 p-0">
                                        <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                            <div class="d-block">
                                                <p class="text-dark fw-medium lh-2 mb-0">Order Invoice</p>
                                                <p class="text-muted mb-0 lh-2">{{$booking->code}}</p>
                                            </div>
                                        </li>
                                        <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                            <div class="d-block">
                                                <p class="text-dark fw-medium lh-2 mb-0">Date</p>
                                                <p class="text-muted mb-0 lh-2">  {{ date('d M Y',strtotime( $booking->booking_date)) }}</p>
                                            </div>
                                        </li>
                                      
                                        <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                            <div class="d-block">
                                                <p class="text-dark fw-medium lh-2 mb-0">Name</p>
                                                <p class="text-muted mb-0 lh-2">{{ $booking->name }}</p>
                                            </div>
                                        </li>
                                        <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                            <div class="d-block">
                                                <p class="text-dark fw-medium lh-2 mb-0">Email</p>
                                                <p class="text-muted mb-0 lh-2">{{ $booking->email }}</p>
                                            </div>
                                        </li>
                                        <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                            <div class="d-block">
                                                <p class="text-dark fw-medium lh-2 mb-0">Phone</p>
                                                <p class="text-muted mb-0 lh-2">{{ $booking->phone }}</p>
                                            </div>
                                        </li>
                                          <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                            <div class="d-block">
                                                <p class="text-dark fw-medium lh-2 mb-0">NID Number</p>
                                                <p class="text-muted mb-0 lh-2">{{ $booking->nid_number }}</p>
                                            </div>
                                        </li>
                                      
                                        <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                            <div class="d-block">
                                                <p class="text-dark fw-medium lh-2 mb-0">Leaving From</p>
                                                <p class="text-muted mb-0 lh-2">{{ @$booking->locationF->name}}</p>
                                            </div>
                                        </li>
                                        <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                            <div class="d-block">
                                                <p class="text-dark fw-medium lh-2 mb-0">Going To</p>
                                                <p class="text-muted mb-0 lh-2">{{ @$booking->locationT->name}}</p>
                                            </div>
                                        </li>
                                        <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                            <div class="d-block">
                                                <p class="text-dark fw-medium lh-2 mb-0">Passport Number</p>
                                                <p class="text-muted mb-0 lh-2">{{ @$booking->passport}}</p>
                                            </div>
                                        </li>
                                        <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                            <div class="d-block">
                                                <p class="text-dark fw-medium lh-2 mb-0">Status</p>
                                                @if ($booking->status == 'p')
                                                <p class="text-muted mb-0 lh-2">Pending</p>
                                                @endif
                                                @if ($booking->status == 'a')
                                                <p class="text-muted mb-0 lh-2">Approved</p>
                                                @endif
                                            </div>
                                        </li>
                                     
                                    </ul>
                                </div>
                            </div>

                            <div class="text-center d-flex align-items-center justify-content-center">
                                <a href="{{route('home')}}" class="btn btn-md btn-light-seegreen fw-semibold mx-2">Book Next Tour</a>
                                {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#invoice"
                                    class="btn btn-md btn-light-primary fw-semibold mx-2">View invoice Print</a> --}}
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Booking Page End ================================== -->
    
@endsection