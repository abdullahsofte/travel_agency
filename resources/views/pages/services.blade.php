@extends('layouts.web_master')
@section('title', 'Services')
@section('main_content')


	<!-- ============================ Booking Title ================================== -->
    <section class="bg-cover position-relative" style="background:url({{asset('website/assets/img/bg-title.jpg')}})no-repeat;" data-overlay="5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-7 col-lg-9 col-md-12">

                    <div class="fpc-capstion text-center my-4">
                        <div class="fpc-captions">
                            <h1 class="xl-heading text-light">Our Services</h1>
                       
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Booking Title ================================== -->


    <!-- ============================ Articles Section ================================== -->

    <section class="border-bottom gray-simple">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-5">
                        <h2>Popular Services</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row gy-4 gx-xl-4 gx-3">

                        @foreach ($services as $item)
                        <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12">
                            <div class="pop-touritem">
                                <a href="{{route('serviceDetails', $item->id)}}" class="card rounded-3 m-0">
                                    <div class="flight-thumb-wrapper p-2 pb-0">
                                        <div class="popFlights-item-overHidden rounded-3">
                                            <img src="{{asset($item->image)}}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="touritem-middle position-relative p-3">
                                        <div class="touritem-flexxer">
                                            <div class="explot">
                                                <h4 class="city fs-title m-0 fw-bold">
                                                    <span>{{$item->name}}</span>
                                                </h4>
                                                <div class="rates">
                                                    <div class="rat-reviews">
                                                        {!!Str::limit($item->description, 90)!!}
                                                    </div>
                                                </div>
                                            </div>
                                         
                                        </div>
                                      
                                    </div>
                                </a>
                            </div>
                        </div>

                        @endforeach

                    </div>

                </div>

            </div>
        </div>
    </section>
    
@endsection