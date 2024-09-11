@extends('layouts.web_master')
@section('title', 'Payment Details')
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

                    <div class="card-middle px-4 py-5">
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
                    </div>

                </div>
            </div>


            <div class="col-xl-8 col-lg-8 col-md-12">

                <!-- Personal Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-wallet me-2"></i>Payment Details</h4>
                    </div>
                    <div class="card-body gap-4">

                        <h4 class="fs-5 fw-semibold">Saved Card (02)</h4>

                        <div class="row justify-content-start g-3">
                            <div class="col-xl-5 col-lg-6 col-md-6">
                                <div class="card h-100">
                                    <div class="bg-dark p-4 rounded-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <img class="img-fluid" src="{{asset('website/assets/img/visa.png')}}" width="55" alt="">
                                            <!-- Card action START -->
                                            <div class="dropdown">
                                                <a class="text-white" href="#" id="creditcardDropdown" role="button"
                                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                    <!-- Dropdown Icon -->
                                                    <svg width="24" height="24" fill="none">
                                                        <circle fill="currentColor" cx="12.5" cy="3.5" r="2.5"></circle>
                                                        <circle fill="currentColor" opacity="0.5" cx="12.5" cy="11.5" r="2.5"></circle>
                                                        <circle fill="currentColor" opacity="0.3" cx="12.5" cy="19.5" r="2.5"></circle>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="creditcardDropdown">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                class="bi bi-credit-card-2-front-fill me-2 fw-icon"></i>Edit card</a></li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                class="bi bi-calculator me-2 fw-icon"></i>Currency converter</a></li>
                                                </ul>
                                            </div>
                                            <!-- Card action END -->
                                        </div>
                                        <h4 class="text-white fs-6 mt-4">**** **** **** 1569</h4>
                                        <div class="d-flex justify-content-between text-white mt-4">
                                            <div class="d-flex flex-column">
                                                <span class="text-md">Issued To</span>
                                                <span class="text-sm fw-medium text-uppercase">Daniel Duekoza</span>
                                            </div>
                                            <div class="d-flex text-end flex-column">
                                                <span class="text-md">Valid Thru</span>
                                                <span>12/2027</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-5 col-lg-6 col-md-6">
                                <div class="card h-100">
                                    <div class="bg-seegreen p-4 rounded-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <img class="img-fluid" src="{{asset('website/assets/img/card.png')}}" width="55" alt="">
                                            <!-- Card action START -->
                                            <div class="dropdown">
                                                <a class="text-white" href="#" id="creditcardDropdown1" role="button"
                                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                                    <!-- Dropdown Icon -->
                                                    <svg width="24" height="24" fill="none">
                                                        <circle fill="currentColor" cx="12.5" cy="3.5" r="2.5"></circle>
                                                        <circle fill="currentColor" opacity="0.5" cx="12.5" cy="11.5" r="2.5"></circle>
                                                        <circle fill="currentColor" opacity="0.3" cx="12.5" cy="19.5" r="2.5"></circle>
                                                    </svg>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="creditcardDropdown1">
                                                    <li><a class="dropdown-item" href="#"><i
                                                                class="bi bi-credit-card-2-front-fill me-2 fw-icon"></i>Edit card</a></li>
                                                    <li><a class="dropdown-item" href="#"><i
                                                                class="bi bi-calculator me-2 fw-icon"></i>Currency converter</a></li>
                                                </ul>
                                            </div>
                                            <!-- Card action END -->
                                        </div>
                                        <h4 class="text-white fs-6 mt-4">**** **** **** 1563</h4>
                                        <div class="d-flex justify-content-between text-white mt-4">
                                            <div class="d-flex flex-column">
                                                <span class="text-md">Issued To</span>
                                                <span class="text-sm fw-medium text-uppercase">Daniel Duekoza</span>
                                            </div>
                                            <div class="d-flex text-end flex-column">
                                                <span class="text-md">Valid Thru</span>
                                                <span>12/2027</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-6 col-md-6">
                                <div
                                    class="card d-flex align-items-center justify-content-center border br-dashed border-2 py-3 h-100">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="#" class="square--60 circle bg-light-primary text-primary fs-2" data-bs-toggle="modal"
                                            data-bs-target="#addcard"><i class="fa-solid fa-circle-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-file-invoice-dollar me-2"></i>Billing History</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amout</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>01</th>
                                    <td>BK32154</td>
                                    <td>10 Sep 2023</td>
                                    <td><span class="badge bg-light-success text-success fw-medium text-uppercase">Paid</span></td>
                                    <td><span class="text-md fw-medium text-dark">$240</span></td>
                                </tr>
                                <tr>
                                    <th>02</th>
                                    <td>BK32155</td>
                                    <td>08 Aug 2023</td>
                                    <td><span class="badge bg-light-warning text-warning fw-medium text-uppercase">UnPaid</span></td>
                                    <td><span class="text-md fw-medium text-dark">$240</span></td>
                                </tr>
                                <tr>
                                    <th>03</th>
                                    <td>BK32156</td>
                                    <td>10 Aug 2023</td>
                                    <td><span class="badge bg-light-info text-info fw-medium text-uppercase">Hold</span></td>
                                    <td><span class="text-md fw-medium text-dark">$240</span></td>
                                </tr>
                                <tr>
                                    <th>04</th>
                                    <td>BK32157</td>
                                    <td>22 Jul 2023</td>
                                    <td><span class="badge bg-light-seegreen text-seegreen fw-medium text-uppercase">completed</span>
                                    </td>
                                    <td><span class="text-md fw-medium text-dark">$240</span></td>
                                </tr>
                                <tr>
                                    <th>05</th>
                                    <td>BK32158</td>
                                    <td>16 Jun 2023</td>
                                    <td><span class="badge bg-light-danger text-danger fw-medium text-uppercase">cancel</span></td>
                                    <td><span class="text-md fw-medium text-dark">$240</span></td>
                                </tr>
                                <tr>
                                    <th>06</th>
                                    <td>BK32159</td>
                                    <td>20 May 2023</td>
                                    <td><span class="badge bg-light-info text-info fw-medium text-uppercase">hold</span></td>
                                    <td><span class="text-md fw-medium text-dark">$240</span></td>
                                </tr>
                                <tr>
                                    <th>07</th>
                                    <td>BK32160</td>
                                    <td>18 Apr 2023</td>
                                    <td><span class="badge bg-light-seegreen text-seegreen fw-medium text-uppercase">completed</span>
                                    </td>
                                    <td><span class="text-md fw-medium text-dark">$240</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- ============================ Booking Page End ================================== -->


@endsection