@extends('layouts.web_master')
@section('title', 'Flight Booking')
@section('main_content')

	<!-- ============================ Booking Page ================================== -->
    <section class="pt-4 gray-simple position-relative">
        <div class="container">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div id="stepper" class="bs-stepper stepper-outline mb-5">
                        <div class="bs-stepper-header">
                            <!-- Step 1 -->
                            <div class="step active" data-target="#step-1">
                                <div class="text-center">
                                    <button type="button" class="step-trigger mb-0" id="steppertrigger1">
                                        <span class="bs-stepper-circle">1</span>
                                    </button>
                                    <h6 class="bs-stepper-label d-none d-md-block">Tour Review</h6>
                                </div>
                            </div>
                            <div class="line"></div>

                            <!-- Step 2 -->
                            <div class="step" data-target="#step-2">
                                <div class="text-center">
                                    <button type="button" class="step-trigger mb-0" id="steppertrigger2">
                                        <span class="bs-stepper-circle">2</span>
                                    </button>
                                    <h6 class="bs-stepper-label d-none d-md-block">Traveler Info</h6>
                                </div>
                            </div>
                            <div class="line"></div>

                            <!-- Step 3 -->
                            {{-- <div class="step" data-target="#step-3">
                                <div class="text-center">
                                    <button type="button" class="step-trigger mb-0" id="steppertrigger3">
                                        <span class="bs-stepper-circle">3</span>
                                    </button>
                                    <h6 class="bs-stepper-label d-none d-md-block">Make Payment</h6>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-start">
                <div class="col-xl-12 col-lg-12 col-md-12">
                   <form action="" method="POST">
                    @csrf
                    <div class="row align-items-start">
                        <div class="col-xl-8 col-lg-8 col-md-12">
                            <div class="card p-3 mb-xl-0 mb-lg-0 mb-3">

                              
                                <!-- Flight info -->
                                <div class="flight-boxyhc mt-4">
                                    <h4 class="fs-5">Flight Detail</h4>
                                    <div class="flights-accordion">
                                        <div class="flights-list-item bg-white border rounded-3 p-2">
                                            <div class="row gy-4 align-items-center justify-content-between">

                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                                            <div class="d-flex align-items-center mb-2">
                                                                <span class="label bg-light-primary text-primary me-2">Date</span>
                                                                <span class="text-muted text-sm">{{ $trip->date}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                                            <div class="row gx-lg-5 gx-3 gy-4 align-items-center">

                                                                <div class="col-sm-auto">
                                                                    <div class="d-flex align-items-center justify-content-start">
                                                                        <div class="d-start fl-pic">
                                                                            <img class="img-fluid" src="{{asset( @$trip->airbus->image )}}" width="45" alt="image">
                                                                        </div>
                                                                        <div class="d-end fl-title ps-2">
                                                                            <div class="text-dark fw-medium">{{ @$trip->airbus->name }}</div>
                                                                            <div class="text-sm text-muted">First Class</div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col">
                                                                    <div class="row gx-3 align-items-center">
                                                                        <div class="col-auto">
                                                                            <div class="text-dark fw-bold">{{ $trip->start_time}}</div>
                                                                            <div class="text-muted text-sm fw-medium">DOH</div>
                                                                        </div>

                                                                        <div class="col text-center">
                                                                            <div class="flightLine departure">
                                                                                <div></div>
                                                                                <div></div>
                                                                            </div>
                                                                            <div class="text-muted text-sm fw-medium mt-3">Direct</div>
                                                                        </div>

                                                                        <div class="col-auto">
                                                                            <div class="text-dark fw-bold">{{ $trip->end_time }}</div>
                                                                            <div class="text-muted text-sm fw-medium">DEL</div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-auto">
                                                                    <div class="text-dark fw-medium"> 
                                                                        @php
                                                                        $start_time = \Carbon\Carbon::parse($trip->start_time);
                                                                        $end_time = \Carbon\Carbon::parse($trip->end_time);
                                                                        $time_difference_minutes = $end_time->diffInMinutes($start_time);
                                                                        $hours = floor($time_difference_minutes / 60);
                                                                        $minutes = $time_difference_minutes % 60;
                                                                    @endphp
                                                                    
                                                                    {{ $hours }} H {{ $minutes }}M


                                                                    </div>
                                                                    <div class="text-muted text-sm fw-medium">{{ $trip->stop}} Stop</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Good to Know -->
                                <div class="flight-boxyhc mt-4">
                                    <h4 class="fs-5">Good To Know</h4>
                                    <div class="effloration-wrap">
                                      {!! $trip->description !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="side-block card rounded-2 p-3">
                                <h5 class="fw-semibold fs-6">Reservation Summary</h5>
                                <div class="mid-block rounded-2 border br-dashed p-2 mb-3">
                                    <div class="row align-items-center justify-content-between g-2 mb-4">
                                        <div class="col-6">
                                            <div class="gray rounded-2 p-2">
                                                <span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-In</span>
                                                <p class="text-dark fw-semibold lh-base text-md mb-0">{{ $trip->start_date}}</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="gray rounded-2 p-2">
                                                <span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-Out</span>
                                                <p class="text-dark fw-semibold lh-base text-md mb-0">{{ $trip->end_date}}</p>
                                            </div>
                                        </div>
                                    </div>
                               
                                </div>

                                <div class="bott-block d-block mb-3">
                                    <h5 class="fw-semibold fs-6">Your Price Summary</h5>
                                    <ul class="list-group list-group-borderless">
                                    
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <span class="fw-medium text-success mb-0">Total Price</span>
                                            <span class="fw-semibold text-success">{{ $trip->price }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bott-block">
                                    {{-- <button class="btn fw-medium btn-primary full-width" type="submit">Request To Book</button> --}}
                                    <a class="btn fw-medium btn-primary full-width" href="{{route('BookingInfo')}}"> Next</a>
                                </div>
                            </div>
                        </div>

                       

                    </div>
                   </form>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Booking Page End ================================== -->
    
@endsection