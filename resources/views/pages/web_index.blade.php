@extends('layouts.web_master')
@section('title', 'Home')
@section('main_content')

    <!-- ============================ Hero Banner  Start================================== -->
   @foreach ($sliders as $item)
   <div class="image-cover hero-header bg-white"
   style="background:url({{ asset($item->image) }})no-repeat;" data-overlay="5">
   <div class="container">

       <!-- Search Form -->
       <div class="row justify-content-center align-items-center">
           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" >
              <form action="{{route('selectBooking')}}" method="GET">
                @csrf
                <div class="search-wrap bg-white rounded-3 p-3">
                    <div class="search-upper">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <div class="flx-start mb-sm-0 mb-2">
                                <div class="dropdowns">
                                        <select class="selections" name="location_type" id="locationType">
                                            <option class="selected" value="domistic">Domistic</option>
                                            <option value="international">International</option>
                                        </select>
                                      

                                       
                                  </div>
                                  
                            </div>
                            <div class="flx-end d-flex align-items-center flex-wrap align-items-center">
                                <div class="px-sm-2 pb-3 pt-0 ps-0 mob-full">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label ms-1 mt-1" for="adult_number"> Adults </label>
                                        <input class="form-check-input text-center" type="number" value="1" min="1" name="adult_number">
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
                                        <select class="leaving form-control fw-bold" name="from_location" required onchange="updateToLocationOptions(this)">
                                            <option value="">Select</option>
                                            @foreach ($location as $locationF)
                                            <option value="{{ $locationF->id }}">{{$locationF->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('from_location') <span style="color: red">{{$message}}</span> @enderror
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
                                        @error('to_location') <span style="color: red">{{$message}}</span> @enderror
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
           <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12">
               <div class="position-relative text-center mt-5">
                   <h1>{{$item->title}} </h1>
                   <p class="fs-5 fw-light">{!! $item->sub_title!!}</p>
               </div>
           </div>
    
       </div>
       <!-- </row> -->

   </div>
</div>
       
   @endforeach
    <!-- ============================ Hero Banner End ================================== -->


    <!-- ============================ Features Start ================================== -->

      
    <section class="border-bottom gray-simple">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-4">
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

                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="text-center position-relative mt-5">
                                <a href="" class="btn btn-light-primary fw-medium px-5">View More<i
                                        class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Features End ================================== -->


    <!-- ============================ Flexible features End ================================== -->
    <section>
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col-xl-5 col-lg-5 col-md-12 position-relative pe-xl-5 pe-lg-4 pe-md-4 pb-xl-5 pb-lg-4 pb-md-4">
                    <div class="position-relative mb-lg-0 mb-4">
                        <img src="{{ asset( $benefit->image ) }}"
                            class="img-fluid rounded-3 position-relative z-1" alt="">
                      
                    </div>
                    <figure class="position-absolute bottom-0 end-0 d-none d-md-block mb-n5 me-n4">
                        <svg height="400" class="fill-primary opacity-25" viewBox="0 0 340 340">
                            <circle cx="194.2" cy="2.2" r="2.2"></circle>
                            <circle cx="2.2" cy="2.2" r="2.2"></circle>
                            <circle cx="218.2" cy="2.2" r="2.2"></circle>
                            <circle cx="26.2" cy="2.2" r="2.2"></circle>
                            <circle cx="242.2" cy="2.2" r="2.2"></circle>
                            <circle cx="50.2" cy="2.2" r="2.2"></circle>
                            <circle cx="266.2" cy="2.2" r="2.2"></circle>
                            <circle cx="74.2" cy="2.2" r="2.2"></circle>
                            <circle cx="290.2" cy="2.2" r="2.2"></circle>
                            <circle cx="98.2" cy="2.2" r="2.2"></circle>
                            <circle cx="314.2" cy="2.2" r="2.2"></circle>
                            <circle cx="122.2" cy="2.2" r="2.2"></circle>
                            <circle cx="338.2" cy="2.2" r="2.2"></circle>
                            <circle cx="146.2" cy="2.2" r="2.2"></circle>
                            <circle cx="170.2" cy="2.2" r="2.2"></circle>
                            <circle cx="194.2" cy="26.2" r="2.2"></circle>
                            <circle cx="2.2" cy="26.2" r="2.2"></circle>
                            <circle cx="218.2" cy="26.2" r="2.2"></circle>
                            <circle cx="26.2" cy="26.2" r="2.2"></circle>
                            <circle cx="242.2" cy="26.2" r="2.2"></circle>
                            <circle cx="50.2" cy="26.2" r="2.2"></circle>
                            <circle cx="266.2" cy="26.2" r="2.2"></circle>
                            <circle cx="74.2" cy="26.2" r="2.2"></circle>
                            <circle cx="290.2" cy="26.2" r="2.2"></circle>
                            <circle cx="98.2" cy="26.2" r="2.2"></circle>
                            <circle cx="314.2" cy="26.2" r="2.2"></circle>
                            <circle cx="122.2" cy="26.2" r="2.2"></circle>
                            <circle cx="338.2" cy="26.2" r="2.2"></circle>
                            <circle cx="146.2" cy="26.2" r="2.2"></circle>
                            <circle cx="170.2" cy="26.2" r="2.2"></circle>
                            <circle cx="194.2" cy="50.2" r="2.2"></circle>
                            <circle cx="2.2" cy="50.2" r="2.2"></circle>
                            <circle cx="218.2" cy="50.2" r="2.2"></circle>
                            <circle cx="26.2" cy="50.2" r="2.2"></circle>
                            <circle cx="242.2" cy="50.2" r="2.2"></circle>
                            <circle cx="50.2" cy="50.2" r="2.2"></circle>
                            <circle cx="266.2" cy="50.2" r="2.2"></circle>
                            <circle cx="74.2" cy="50.2" r="2.2"></circle>
                            <circle cx="290.2" cy="50.2" r="2.2"></circle>
                            <circle cx="98.2" cy="50.2" r="2.2"></circle>
                            <circle cx="314.2" cy="50.2" r="2.2"></circle>
                            <circle cx="122.2" cy="50.2" r="2.2"></circle>
                            <circle cx="338.2" cy="50.2" r="2.2"></circle>
                            <circle cx="146.2" cy="50.2" r="2.2"></circle>
                            <circle cx="170.2" cy="50.2" r="2.2"></circle>
                            <circle cx="194.2" cy="74.2" r="2.2"></circle>
                            <circle cx="2.2" cy="74.2" r="2.2"></circle>
                            <circle cx="218.2" cy="74.2" r="2.2"></circle>
                            <circle cx="26.2" cy="74.2" r="2.2"></circle>
                            <circle cx="242.2" cy="74.2" r="2.2"></circle>
                            <circle cx="50.2" cy="74.2" r="2.2"></circle>
                            <circle cx="266.2" cy="74.2" r="2.2"></circle>
                            <circle cx="74.2" cy="74.2" r="2.2"></circle>
                            <circle cx="290.2" cy="74.2" r="2.2"></circle>
                            <circle cx="98.2" cy="74.2" r="2.2"></circle>
                            <circle cx="314.2" cy="74.2" r="2.2"></circle>
                            <circle cx="122.2" cy="74.2" r="2.2"></circle>
                            <circle cx="338.2" cy="74.2" r="2.2"></circle>
                            <circle cx="146.2" cy="74.2" r="2.2"></circle>
                            <circle cx="170.2" cy="74.2" r="2.2"></circle>
                            <circle cx="194.2" cy="98.2" r="2.2"></circle>
                            <circle cx="2.2" cy="98.2" r="2.2"></circle>
                            <circle cx="218.2" cy="98.2" r="2.2"></circle>
                            <circle cx="26.2" cy="98.2" r="2.2"></circle>
                            <circle cx="242.2" cy="98.2" r="2.2"></circle>
                            <circle cx="50.2" cy="98.2" r="2.2"></circle>
                            <circle cx="266.2" cy="98.2" r="2.2"></circle>
                            <circle cx="74.2" cy="98.2" r="2.2"></circle>
                            <circle cx="290.2" cy="98.2" r="2.2"></circle>
                            <circle cx="98.2" cy="98.2" r="2.2"></circle>
                            <circle cx="314.2" cy="98.2" r="2.2"></circle>
                            <circle cx="122.2" cy="98.2" r="2.2"></circle>
                            <circle cx="338.2" cy="98.2" r="2.2"></circle>
                            <circle cx="146.2" cy="98.2" r="2.2"></circle>
                            <circle cx="170.2" cy="98.2" r="2.2"></circle>
                            <circle cx="194.2" cy="122.2" r="2.2"></circle>
                            <circle cx="2.2" cy="122.2" r="2.2"></circle>
                            <circle cx="218.2" cy="122.2" r="2.2"></circle>
                            <circle cx="26.2" cy="122.2" r="2.2"></circle>
                            <circle cx="242.2" cy="122.2" r="2.2"></circle>
                            <circle cx="50.2" cy="122.2" r="2.2"></circle>
                            <circle cx="266.2" cy="122.2" r="2.2"></circle>
                            <circle cx="74.2" cy="122.2" r="2.2"></circle>
                            <circle cx="290.2" cy="122.2" r="2.2"></circle>
                            <circle cx="98.2" cy="122.2" r="2.2"></circle>
                            <circle cx="314.2" cy="122.2" r="2.2"></circle>
                            <circle cx="122.2" cy="122.2" r="2.2"></circle>
                            <circle cx="338.2" cy="122.2" r="2.2"></circle>
                            <circle cx="146.2" cy="122.2" r="2.2"></circle>
                            <circle cx="170.2" cy="122.2" r="2.2"></circle>
                            <circle cx="194.2" cy="146.2" r="2.2"></circle>
                            <circle cx="2.2" cy="146.2" r="2.2"></circle>
                            <circle cx="218.2" cy="146.2" r="2.2"></circle>
                            <circle cx="26.2" cy="146.2" r="2.2"></circle>
                            <circle cx="242.2" cy="146.2" r="2.2"></circle>
                            <circle cx="50.2" cy="146.2" r="2.2"></circle>
                            <circle cx="266.2" cy="146.2" r="2.2"></circle>
                            <circle cx="74.2" cy="146.2" r="2.2"></circle>
                            <circle cx="290.2" cy="146.2" r="2.2"></circle>
                            <circle cx="98.2" cy="146.2" r="2.2"></circle>
                            <circle cx="314.2" cy="146.2" r="2.2"></circle>
                            <circle cx="122.2" cy="146.2" r="2.2"></circle>
                            <circle cx="338.2" cy="146.2" r="2.2"></circle>
                            <circle cx="146.2" cy="146.2" r="2.2"></circle>
                            <circle cx="170.2" cy="146.2" r="2.2"></circle>
                            <circle cx="194.2" cy="170.2" r="2.2"></circle>
                            <circle cx="2.2" cy="170.2" r="2.2"></circle>
                            <circle cx="218.2" cy="170.2" r="2.2"></circle>
                            <circle cx="26.2" cy="170.2" r="2.2"></circle>
                            <circle cx="242.2" cy="170.2" r="2.2"></circle>
                            <circle cx="50.2" cy="170.2" r="2.2"></circle>
                            <circle cx="266.2" cy="170.2" r="2.2"></circle>
                            <circle cx="74.2" cy="170.2" r="2.2"></circle>
                            <circle cx="290.2" cy="170.2" r="2.2"></circle>
                            <circle cx="98.2" cy="170.2" r="2.2"></circle>
                            <circle cx="314.2" cy="170.2" r="2.2"></circle>
                            <circle cx="122.2" cy="170.2" r="2.2"></circle>
                            <circle cx="338.2" cy="170.2" r="2.2"></circle>
                            <circle cx="146.2" cy="170.2" r="2.2"></circle>
                            <circle cx="170.2" cy="170.2" r="2.2"></circle>
                            <circle cx="194.2" cy="194.2" r="2.2"></circle>
                            <circle cx="2.2" cy="194.2" r="2.2"></circle>
                            <circle cx="218.2" cy="194.2" r="2.2"></circle>
                            <circle cx="26.2" cy="194.2" r="2.2"></circle>
                            <circle cx="242.2" cy="194.2" r="2.2"></circle>
                            <circle cx="50.2" cy="194.2" r="2.2"></circle>
                            <circle cx="266.2" cy="194.2" r="2.2"></circle>
                            <circle cx="74.2" cy="194.2" r="2.2"></circle>
                            <circle cx="290.2" cy="194.2" r="2.2"></circle>
                            <circle cx="98.2" cy="194.2" r="2.2"></circle>
                            <circle cx="314.2" cy="194.2" r="2.2"></circle>
                            <circle cx="122.2" cy="194.2" r="2.2"></circle>
                            <circle cx="338.2" cy="194.2" r="2.2"></circle>
                            <circle cx="146.2" cy="194.2" r="2.2"></circle>
                            <circle cx="170.2" cy="194.2" r="2.2"></circle>
                            <circle cx="194.2" cy="218.2" r="2.2"></circle>
                            <circle cx="2.2" cy="218.2" r="2.2"></circle>
                            <circle cx="218.2" cy="218.2" r="2.2"></circle>
                            <circle cx="26.2" cy="218.2" r="2.2"></circle>
                            <circle cx="242.2" cy="218.2" r="2.2"></circle>
                            <circle cx="50.2" cy="218.2" r="2.2"></circle>
                            <circle cx="266.2" cy="218.2" r="2.2"></circle>
                            <circle cx="74.2" cy="218.2" r="2.2"></circle>
                            <circle cx="290.2" cy="218.2" r="2.2"></circle>
                            <circle cx="98.2" cy="218.2" r="2.2"></circle>
                            <circle cx="314.2" cy="218.2" r="2.2"></circle>
                            <circle cx="122.2" cy="218.2" r="2.2"></circle>
                            <circle cx="338.2" cy="218.2" r="2.2"></circle>
                            <circle cx="146.2" cy="218.2" r="2.2"></circle>
                            <circle cx="170.2" cy="218.2" r="2.2"></circle>
                            <circle cx="194.2" cy="242.2" r="2.2"></circle>
                            <circle cx="2.2" cy="242.2" r="2.2"></circle>
                            <circle cx="218.2" cy="242.2" r="2.2"></circle>
                            <circle cx="26.2" cy="242.2" r="2.2"></circle>
                            <circle cx="242.2" cy="242.2" r="2.2"></circle>
                            <circle cx="50.2" cy="242.2" r="2.2"></circle>
                            <circle cx="266.2" cy="242.2" r="2.2"></circle>
                            <circle cx="74.2" cy="242.2" r="2.2"></circle>
                            <circle cx="290.2" cy="242.2" r="2.2"></circle>
                            <circle cx="98.2" cy="242.2" r="2.2"></circle>
                            <circle cx="314.2" cy="242.2" r="2.2"></circle>
                            <circle cx="122.2" cy="242.2" r="2.2"></circle>
                            <circle cx="338.2" cy="242.2" r="2.2"></circle>
                            <circle cx="146.2" cy="242.2" r="2.2"></circle>
                            <circle cx="170.2" cy="242.2" r="2.2"></circle>
                            <circle cx="194.2" cy="266.2" r="2.2"></circle>
                            <circle cx="2.2" cy="266.2" r="2.2"></circle>
                            <circle cx="218.2" cy="266.2" r="2.2"></circle>
                            <circle cx="26.2" cy="266.2" r="2.2"></circle>
                            <circle cx="242.2" cy="266.2" r="2.2"></circle>
                            <circle cx="50.2" cy="266.2" r="2.2"></circle>
                            <circle cx="266.2" cy="266.2" r="2.2"></circle>
                            <circle cx="74.2" cy="266.2" r="2.2"></circle>
                            <circle cx="290.2" cy="266.2" r="2.2"></circle>
                            <circle cx="98.2" cy="266.2" r="2.2"></circle>
                            <circle cx="314.2" cy="266.2" r="2.2"></circle>
                            <circle cx="122.2" cy="266.2" r="2.2"></circle>
                            <circle cx="338.2" cy="266.2" r="2.2"></circle>
                            <circle cx="146.2" cy="266.2" r="2.2"></circle>
                            <circle cx="170.2" cy="266.2" r="2.2"></circle>
                            <circle cx="194.2" cy="290.2" r="2.2"></circle>
                            <circle cx="2.2" cy="290.2" r="2.2"></circle>
                            <circle cx="218.2" cy="290.2" r="2.2"></circle>
                            <circle cx="26.2" cy="290.2" r="2.2"></circle>
                            <circle cx="242.2" cy="290.2" r="2.2"></circle>
                            <circle cx="50.2" cy="290.2" r="2.2"></circle>
                            <circle cx="266.2" cy="290.2" r="2.2"></circle>
                            <circle cx="74.2" cy="290.2" r="2.2"></circle>
                            <circle cx="290.2" cy="290.2" r="2.2"></circle>
                            <circle cx="98.2" cy="290.2" r="2.2"></circle>
                            <circle cx="314.2" cy="290.2" r="2.2"></circle>
                            <circle cx="122.2" cy="290.2" r="2.2"></circle>
                            <circle cx="338.2" cy="290.2" r="2.2"></circle>
                            <circle cx="146.2" cy="290.2" r="2.2"></circle>
                            <circle cx="170.2" cy="290.2" r="2.2"></circle>
                            <circle cx="194.2" cy="314.2" r="2.2"></circle>
                            <circle cx="2.2" cy="314.2" r="2.2"></circle>
                            <circle cx="218.2" cy="314.2" r="2.2"></circle>
                            <circle cx="26.2" cy="314.2" r="2.2"></circle>
                            <circle cx="242.2" cy="314.2" r="2.2"></circle>
                            <circle cx="50.2" cy="314.2" r="2.2"></circle>
                            <circle cx="266.2" cy="314.2" r="2.2"></circle>
                            <circle cx="74.2" cy="314.2" r="2.2"></circle>
                            <circle cx="290.2" cy="314.2" r="2.2"></circle>
                            <circle cx="98.2" cy="314.2" r="2.2"></circle>
                            <circle cx="314.2" cy="314.2" r="2.2"></circle>
                            <circle cx="122.2" cy="314.2" r="2.2"></circle>
                            <circle cx="338.2" cy="314.2" r="2.2"></circle>
                            <circle cx="146.2" cy="314.2" r="2.2"></circle>
                            <circle cx="170.2" cy="314.2" r="2.2"></circle>
                            <circle cx="194.2" cy="338.2" r="2.2"></circle>
                            <circle cx="2.2" cy="338.2" r="2.2"></circle>
                            <circle cx="218.2" cy="338.2" r="2.2"></circle>
                            <circle cx="26.2" cy="338.2" r="2.2"></circle>
                            <circle cx="242.2" cy="338.2" r="2.2"></circle>
                            <circle cx="50.2" cy="338.2" r="2.2"></circle>
                            <circle cx="266.2" cy="338.2" r="2.2"></circle>
                            <circle cx="74.2" cy="338.2" r="2.2"></circle>
                            <circle cx="290.2" cy="338.2" r="2.2"></circle>
                            <circle cx="98.2" cy="338.2" r="2.2"></circle>
                            <circle cx="314.2" cy="338.2" r="2.2"></circle>
                            <circle cx="122.2" cy="338.2" r="2.2"></circle>
                            <circle cx="338.2" cy="338.2" r="2.2"></circle>
                            <circle cx="146.2" cy="338.2" r="2.2"></circle>
                            <circle cx="170.2" cy="338.2" r="2.2"></circle>
                        </svg>
                    </figure>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="row gy-xl-5 g-4">

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="fbxer-wraps">
                                <div class="fbxerWraps-icons mb-3">
                                    <div class="square--70 circle bg-light-primary"><i
                                            class="fa-solid fa-gifts text-primary fs-3"></i>
                                    </div>
                                </div>
                                <div class="fbxerWraps-caps">
                                    <h5 class="fw-bold fs-6">{{ $benefit->title_one }}</h5>
                                    <p class="fw-light fs-6 m-0">{!! $benefit->description !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="fbxer-wraps">
                                <div class="fbxerWraps-icons mb-3">
                                    <div class="square--70 circle bg-light-info"><i
                                            class="fa-solid fa-gifts text-info fs-3"></i></div>
                                </div>
                                <div class="fbxerWraps-caps">
                                    <h5 class="fw-bold fs-6">{{ $benefit->title_two }}</h5>
                                    <p class="fw-light fs-6 m-0">{!! $benefit->description_two !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="fbxer-wraps">
                                <div class="fbxerWraps-icons mb-3">
                                    <div class="square--70 circle bg-light-success"><i
                                            class="fa-solid fa-gifts text-success fs-3"></i>
                                    </div>
                                </div>
                                <div class="fbxerWraps-caps">
                                    <h5 class="fw-bold fs-6">{{ $benefit->title_three }}</h5>
                                    <p class="fw-light fs-6 m-0">{!! $benefit->description_three !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <div class="fbxer-wraps">
                                <div class="fbxerWraps-icons mb-3">
                                    <div class="square--70 circle bg-light-warning"><i
                                            class="fa-solid fa-gifts text-warning fs-3"></i>
                                    </div>
                                </div>
                                <div class="fbxerWraps-caps">
                                    <h5 class="fw-bold fs-6">{{ $benefit->title_four }}</h5>
                                    <p class="fw-light fs-6 m-0">{!! $benefit->description_four !!}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Flexible features End ================================== -->


    <!-- ================================ Article Section Start ======================================= -->
    <section class="gray-simple">
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-4">
                        <h2>Photo Gallery</h2>
                    </div>
                </div>
            </div>


            <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">

                <div class="col-xl-12 col-lg-12 col-md-12">
                  <div class="row gy-4 gx-xl-4 gx-3">


                    @foreach ($gallery as $item)
                    
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                            <div class="pop-touritem">
                            <a href="{{asset($item->image)}}" data-fancybox="gallery" class="card rounded-3 m-0">
                                <div class="flight-thumb-wrapper p-2 pb-0">
                                <div class="popFlights-item-overHidden rounded-3">
                                    <img src="{{asset($item->image)}}" class="img-fluid" alt="">
                                </div>
                                </div>
                                <div class="touritem-middle position-relative p-3">
                                <div class="touritem-flexxer">
                                    <div class="explot">
                                    <h4 class="city fs-title m-0 fw-bold">
                                        <span>{{$item->title}}</span>
                                    </h4>
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
              
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center position-relative mt-5">
                        <a href="{{route('gallery.page')}}" class="btn btn-light-primary fw-medium px-5">View More<i
                                class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================ Article Section Start ======================================= -->
    
    <!-- ================================ Article Section Start ======================================= -->
    <section class="gray-simple">
        <div class="container">

            <div class="row align-items-center justify-content-center">
                <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                    <div class="secHeading-wrap text-center mb-4">
                        <h2>Video Gallery</h2>
                    </div>
                </div>
            </div>


            <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">

                <div class="col-xl-12 col-lg-12 col-md-12">
                  <div class="row gy-4 gx-xl-4 gx-3">


                    @foreach ($video as $item)
                    
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                            <div class="pop-touritem">
                            <a href="#"  class="card rounded-3 m-0  popup-youtube">
                                <div class="flight-thumb-wrapper p-2 pb-0">
                                <div class="popFlights-item-overHidden rounded-3">
                                    <iframe src="{{ $item->video_link}}" frameborder="0"></iframe>
                                    
                                </div>
                                </div>
                                <div class="touritem-middle position-relative p-3">
                                <div class="touritem-flexxer">
                                    <div class="explot">
                                    <h4 class="city fs-title m-0 fw-bold youtube-link">
                                        <span class="popup-youtube">{{$item->title}}</span>
                                    </h4>
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
              
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="text-center position-relative mt-5">
                        <a href="{{route('videoGallery')}}" class="btn btn-light-primary fw-medium px-5">View More<i
                                class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================================ Article Section Start ======================================= -->



@endsection

@push('web_js')


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


<script>
    $(document).ready(function () {
        $('#locationType').change(function () {
            var locationType = $(this).val();

            var ajaxEndpoint = '/get-location-area';

            $.ajax({
                url: ajaxEndpoint,
                type: 'GET',
                data: { location_type: locationType },
                success: function (data) {
                    // console.log(data);
                    
                    var fromLocationDropdown = $('select[name="from_location"]');
                    fromLocationDropdown.empty();
                    fromLocationDropdown.append('<option value="">Select</option>');
                    $.each(data.locations, function (index, location) {
                        fromLocationDropdown.append('<option value="' + location.id + '">' + location.name + '</option>');
                    });

                    var toLocationDropdown = $('select[name="to_location"]');
                    toLocationDropdown.empty();
                    toLocationDropdown.append('<option value="">Select</option>');
                    $.each(data.locations, function (index, location) {
                        toLocationDropdown.append('<option value="' + location.id + '">' + location.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>

<script>
    $(function() {
        $('.popup-youtube, .popup-vimeo').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    });
    </script>



@endpush



