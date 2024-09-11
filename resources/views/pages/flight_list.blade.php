@extends('layouts.web_master')
@section('title', 'Flight List')
@section('main_content')


	<!-- ============================ Hero Banner  Start================================== -->
    <div class="py-5 bg-primary position-relative">
        <div class="container">

            <!-- Search Form -->
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <form action="{{route('searchTrip')}}" method="POST">
                        @csrf
                        <div class="search-wrap bg-white rounded-3 p-3">
                            {{-- <div class="search-upper">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="flx-start mb-sm-0 mb-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trip" id="return"
                                                value="option1" checked>
                                            <label class="form-check-label" for="return">Return</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="trip" id="oneway"
                                                value="option2">
                                            <label class="form-check-label" for="oneway">One Way</label>
                                        </div>
                                    </div>
                                    <div class="flx-end d-flex align-items-center flex-wrap">
                                        <div class="ps-1 pb-3 pt-0 mob-full">
                                            <div class="dropdowns">
                                                <div class="selections">
                                                    <i class="fa-solid fa-basket-shopping text-muted me-2"></i><span
                                                        class="selected">Economy</span>
                                                    <div class="caret"></div>
                                                </div>
                                                <ul class="menu">
                                                    @foreach ($tripClass as $item)
                                                    <li class="active">{{ $item->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row gx-lg-2 g-3">
    
                                <div class="col-xl-7 col-lg-7 col-md-12">
                                    <div class="row gy-3 gx-lg-2 gx-3">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                            <div class="form-group hdd-arrow mb-0">
                                                <select class="leaving form-control fw-bold" name="from_location" required>
                                                    <option value="">Select</option>
                                                    @foreach ($location as $locationF)
                                                    <option value="{{ $locationF->id }}">{{$locationF->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="btn-flip-icon mt-md-0">
                                                <button class="p-0 m-0 text-primary"><i
                                                        class="fa-solid fa-right-left"></i></button>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-groupp hdd-arrow mb-0">
                                                <select class="goingto form-control fw-bold" name="to_location">
                                                    <option value="">Select</option>
                                                    @foreach ($location as $locationT)
                                                    <option value="{{ $locationT->id }}">{{$locationT->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12">
                                    <div class="row gy-3 gx-lg-2 gx-3">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group mb-0">
                                                <input class="form-control fw-bold choosedate" name="date" type="text"
                                                    placeholder="Departure.." readonly="readonly">
                                            </div>
                                        </div>
                                        {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group mb-0">
                                                <input class="form-control fw-bold choosedate" type="text"
                                                    placeholder="Return.." readonly="readonly">
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-12">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary full-width fw-medium"><i
                                                class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
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


    <!-- ============================ All Flits Search Lists Start ================================== -->
    <section class="gray-simple">
        <div class="container">
            <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">

                <!-- Sidebar Filter Options -->
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <div class="filter-searchBar bg-white rounded-3">
                        <div class="filter-searchBar-head border-bottom">
                            <div class="searchBar-headerBody d-flex align-items-start justify-content-between px-3 py-3">
                                <div class="searchBar-headerfirst">
                                    <h6 class="fw-bold fs-5 m-0">Filters</h6>
                                    <p class="text-md text-muted m-0">Showing {{count($trip)}} Flights</p>
                                </div>
                                <div class="searchBar-headerlast text-end">
                                    <a href="#" class="text-md fw-medium text-primary active">Clear All</a>
                                </div>
                            </div>
                        </div>

                        <div class="filter-searchBar-body">

                            <!-- Departure & Return -->
                            <div class="searchBar-single px-3 py-3 border-bottom">
                                {{-- <div class="searchBar-single-title d-flex mb-3">
                                    <h6 class="sidebar-subTitle fs-6 fw-medium m-0">Departure</h6>
                                </div>
                                <div class="searchBar-single-wrap mb-4">
                                    <ul class="row align-items-center justify-content-between p-0 gx-3 gy-2">
                                        <li class="col-6">
                                            <input type="checkbox" class="btn-check" id="before6am">
                                            <label class="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width"
                                                for="before6am">Before 6AM</label>
                                        </li>
                                        <li class="col-6">
                                            <input type="checkbox" class="btn-check" id="6am12pm">
                                            <label class="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width" for="6am12pm">6AM -
                                                12PM</label>
                                        </li>
                                        <li class="col-6">
                                            <input type="checkbox" class="btn-check" id="12pm6pm">
                                            <label class="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width" for="12pm6pm">12PM -
                                                6PM</label>
                                        </li>
                                        <li class="col-6">
                                            <input type="checkbox" class="btn-check" id="after6pm">
                                            <label class="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width" for="after6pm">After
                                                6PM</label>
                                        </li>
                                    </ul>
                                </div> --}}

                                {{-- <div class="searchBar-single-title d-flex mb-3">
                                    <h6 class="sidebar-subTitle fs-6 fw-medium m-0">Return</h6>
                                </div>
                                <div class="searchBar-single-wrap">
                                    <ul class="row align-items-center justify-content-between p-0 gx-3 gy-2">
                                        <li class="col-6">
                                            <input type="checkbox" class="btn-check" id="before6am1">
                                            <label class="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width"
                                                for="before6am1">Before 6AM</label>
                                        </li>
                                        <li class="col-6">
                                            <input type="checkbox" class="btn-check" id="6am12pm1">
                                            <label class="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width" for="6am12pm1">6AM -
                                                12PM</label>
                                        </li>
                                        <li class="col-6">
                                            <input type="checkbox" class="btn-check" id="12pm6pm1">
                                            <label class="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width" for="12pm6pm1">12PM
                                                - 6PM</label>
                                        </li>
                                        <li class="col-6">
                                            <input type="checkbox" class="btn-check" id="after6pm1">
                                            <label class="btn btn-sm btn-secondary rounded-1 fw-medium px-4 full-width"
                                                for="after6pm1">After 6PM</label>
                                        </li>
                                    </ul>
                                </div> --}}

                            </div>

                            <!-- Pricing -->
                            <div class="searchBar-single px-3 py-3 border-bottom">
                                <div class="searchBar-single-title d-flex mb-3">
                                    <h6 class="sidebar-subTitle fs-6 fw-medium m-0">Pricing Range in  ৳</h6>
                                </div>
                                <div class="searchBar-single-wrap">
                                    <input type="text" class="js-range-slider" name="my_range" value="" data-skin="round"
                                        data-type="double" data-min="0" data-max="1000" data-grid="false">
                                </div>
                            </div>

                            <!-- Facilities -->
                            {{-- <div class="searchBar-single px-3 py-3 border-bottom">
                                <div class="searchBar-single-title d-flex mb-3">
                                    <h6 class="sidebar-subTitle fs-6 fw-medium m-0">Facilities</h6>
                                </div>
                                <div class="searchBar-single-wrap">
                                    <ul class="row align-items-center justify-content-between p-0 gx-3 gy-2">
                                        <li class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="baggage">
                                                <label class="form-check-label" for="baggage">Baggage</label>
                                            </div>
                                        </li>
                                        <li class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="inflightmeal">
                                                <label class="form-check-label" for="inflightmeal">In-flight Meal</label>
                                            </div>
                                        </li>
                                        <li class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="inflightenter">
                                                <label class="form-check-label" for="inflightenter">In-flight Entertainment</label>
                                            </div>
                                        </li>
                                        <li class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="flswifi">
                                                <label class="form-check-label" for="flswifi">WiFi</label>
                                            </div>
                                        </li>
                                        <li class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="flusbport">
                                                <label class="form-check-label" for="flusbport">Power/USB Port</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div> --}}

                            <!-- Popular Flights -->
                            <div class="searchBar-single px-3 py-3 border-bottom">
                                <div class="searchBar-single-title d-flex align-items-center justify-content-between mb-3">
                                    <h6 class="sidebar-subTitle fs-6 fw-medium m-0">Preferred Airlines</h6>
                                    <a href="#" class="text-md fw-medium text-muted active">Reset</a>
                                </div>
                                <div class="searchBar-single-wrap">
                                    <ul class="row align-items-center justify-content-between p-0 gx-3 gy-2">
                                        @foreach ($airbus as $airbus)
                                        <li class="col-12">
                                            <div class="form-check lg">
                                                <div class="frm-slicing d-flex align-items-center">
                                                    <div class="frm-slicing-first">
                                                        <input class="form-check-input" type="checkbox" id="baggage8">
                                                        <label class="form-check-label" for="baggage8"></label>
                                                    </div>
                                                    <div
                                                        class="frm-slicing-end d-flex align-items-center justify-content-between full-width ps-1">
                                                        <div class="frms-flex d-flex align-items-center">
                                                            <div class="frm-slicing-img"><img src="{{asset( $airbus->image )}}" class="img-fluid" width="25"
                                                                    alt=""></div>
                                                            <div class="frm-slicing-title ps-2"><span class="text-muted-2">{{ $airbus->name }}</span></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                        @endforeach
                                   
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- All Flight Lists -->
                <div class="col-xl-9 col-lg-8 col-md-12">

                    <div class="row align-items-center justify-content-between">
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <h5 class="fw-bold fs-6 mb-lg-0 mb-3">Showing {{count($trip)}} Search Results</h5>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-12">
                            <div class="d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap">
                               
                                <div class="flsx-first mt-sm-0 mt-2">
                                    <ul class="nav nav-pills nav-fill p-1 small lights blukker bg-primary rounded-3 shadow-sm"
                                        id="filtersblocks" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active rounded-3" id="trending" data-bs-toggle="tab" type="button"
                                                role="tab" aria-selected="true">Our Trending</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-3" id="mostpopular" data-bs-toggle="tab" type="button"
                                                role="tab" aria-selected="false">Most Popular</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link rounded-3" id="lowprice" data-bs-toggle="tab" type="button" role="tab"
                                                aria-selected="false">Lowest Price</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center g-4 mt-2">

                    
                        <!-- Single Flight -->
                        @foreach ($trip as $item)
                            
                        <div class="col-xl-12 col-lg12 col-md-12">
                            <div class="flights-accordion">
                                <div class="flights-list-item bg-white rounded-3 p-3">
                                    <div class="row gy-4 align-items-center justify-content-between">

                                        <div class="col">
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <span class="label bg-light-primary text-primary me-2">Date</span>
                                                        <span class="text-muted text-sm">{{ $item->date }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12">
                                                    <div class="row gx-lg-5 gx-3 gy-4 align-items-center">

                                                        <div class="col-sm-auto">
                                                            <div class="d-flex align-items-center justify-content-start">
                                                                <div class="d-start fl-pic">
                                                                    <img class="img-fluid" src="{{asset( @$item->image )}}" width="45" alt="image">
                                                                </div>
                                                                <div class="d-end fl-title ps-2">
                                                                    <div class="text-dark fw-medium">{{ @$item->name}}</div>
                                                                    <div class="text-sm text-muted">First Class</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="row gx-3 align-items-center">
                                                                <div class="col-auto">
                                                                    <div class="text-dark fw-bold">{{ $item->start_time }}</div>
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
                                                                    <div class="text-dark fw-bold">{{ $item->end_time }}</div>
                                                                    <div class="text-muted text-sm fw-medium">DEL</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-auto">
                                                            
                                                            <div class="text-dark fw-medium">
                                                                @php
                                                                $start_time = \Carbon\Carbon::parse($item->start_time);
                                                                $end_time = \Carbon\Carbon::parse($item->end_time);
                                                                $time_difference_minutes = $end_time->diffInMinutes($start_time);
                                                                $hours = floor($time_difference_minutes / 60);
                                                                $minutes = $time_difference_minutes % 60;
                                                            @endphp
                                                            
                                                            {{ $hours }} H {{ $minutes }}M
                                                            
                                                              
                                                            </div>
                                                            <div class="text-muted text-sm fw-medium">{{ $item->stop}} Stop</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-auto">
                                            <div class="d-flex items-center h-100">
                                                <div class="d-lg-block d-none border br-dashed me-4"></div>
                                                <div>
                                                    <div class="d-flex align-items-center justify-content-md-end mb-3">
                                                        <span class="square--20 rounded text-xs text-muted border me-2" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-title="Free WiFi"><i
                                                                class="fa-solid fa-wifi"></i></span>
                                                        <span class="square--20 rounded text-xs text-muted border me-2" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-title="Food Available"><i
                                                                class="fa-solid fa-utensils"></i></span>
                                                        <span class="square--20 rounded text-xs text-muted border me-2" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-title="One Cup Tea"><i
                                                                class="fa-solid fa-mug-saucer"></i></span>
                                                        <span class="square--20 rounded text-xs text-muted border" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-title="Pet Allow"><i class="fa-solid fa-dog"></i></span>
                                                    </div>
                                                    <div class="text-start text-md-end">
                                                        <div class="text-dark fs-4 fw-bold lh-base">৳ {{ $item->price}}</div>
                                                    </div>

                                                    <div class="flight-button-wrap">
                                                        <a href="{{route('flightBooking', $item->id)}}" class="btn btn-primary btn-md fw-medium full-width">
                                                            Book Now<i class="fa-solid fa-arrow-trend-up ms-2"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="col-xl-12 col-lg-12 col-12">
                            <div class="pags card py-2 px-5">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination m-0 p-0">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"><i class="fa-solid fa-arrow-left-long"></i></span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true"><i class="fa-solid fa-arrow-right-long"></i></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div> --}}

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ All Flits Search Lists End ================================== -->
@endsection

