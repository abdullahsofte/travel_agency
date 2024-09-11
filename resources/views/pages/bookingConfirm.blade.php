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
								<div class="step completed" data-target="#step-1">
									<div class="text-center">
										<button type="button" class="step-trigger mb-0" id="steppertrigger1">
											<span class="bs-stepper-circle"><i class="fa-solid fa-check"></i></span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Tour Review</h6>
									</div>
								</div>
								<div class="line"></div>

								<!-- Step 2 -->
								<div class="step completed" data-target="#step-2">
									<div class="text-center">
										<button type="button" class="step-trigger mb-0" id="steppertrigger2">
											<span class="bs-stepper-circle">2</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Traveler Info</h6>
									</div>
								</div>
								<div class="line"></div>

								<!-- Step 3 -->
								{{-- <div class="step active" data-target="#step-3">
									<div class="text-center">
										<button type="button" class="step-trigger mb-0" id="steppertrigger3">
											<span class="bs-stepper-circle">3</span>
										</button>
										<h6 class="bs-stepper-label d-none d-md-block">Make Payment</h6>
									</div> --}}
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row align-items-start">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="div-title d-flex align-items-center mb-3">
							<h4>Billing Details</h4>
						</div>
						<div class="row align-items-start">
							<div class="col-xl-8 col-lg-8 col-md-12">

								<div class="card mb-3">
									<div class="card-header">
										<h4>Basic Detail</h4>
									</div>
									<div class="card-body">
										<div class="row">

											<div class="col-xl-6 col-lg-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Billing Name</label>
													<input type="text" class="form-control" placeholder="First Name">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Email</label>
													<input type="text" class="form-control" placeholder="Last Name">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Phone</label>
													<input type="text" class="form-control" placeholder="Phone Number">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Address 01</label>
													<input type="text" class="form-control" placeholder="Passport Number">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Address 02</label>
													<input type="text" class="form-control" placeholder="Passport Number">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Country</label>
													<input type="text" class="form-control" placeholder="Passport Number">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6">
												<div class="form-group">
													<label class="form-label">City\State</label>
													<input type="text" class="form-control" placeholder="Passport Number">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Postal Code</label>
													<input type="text" class="form-control" placeholder="Passport Number">
												</div>
											</div>
											<div class="col-xl-12 col-lg-12 col-md-12">
												<div class="form-group">
													<label class="form-label">Special notes</label>
													<textarea class="form-control ht-200"></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>

							<div class="col-xl-4 col-lg-4 col-md-12">
								<div class="side-block card rounded-2 p-3">
									<div class="summary-block d-block mb-3">
										<h5 class="fw-semibold fs-6">Summary</h5>
										<ul class="list-group list-group-borderless">
											<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-1">
												<span class="fw-medium text-sm text-muted mb-0">Payment:</span>
												<span class="fw-semibold text-md">$772.40</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-1">
												<span class="fw-medium text-sm text-muted mb-0">Payment Methode fee</span>
												<span class="fw-semibold text-md">$0</span>
											</li>
											<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 py-1">
												<span class="fw-medium text-sm text-muted mb-0">Total Price</span>
												<span class="fw-semibold text-success text-md">$772.40</span>
											</li>
										</ul>
									</div>
									<div class="bott-block mb-3">
										<div
											class="d-flex align-items-center justify-content-center py-2 px-3 rounded-2 bg-light-success mb-2">
											<div class="d-inline-flex text-success fs-2"><i class="fa-solid fa-shield-heart"></i></div>
											<div class="d-inline-flex flex-column ps-2">
												<span class="d-block text-md text-dark fw-semibold lh-2">100% Cashback guarantee</span>
												<span class="d-block text-sm text-muted-2 lh-2">We protect your money</span>
											</div>
										</div>
										<button class="btn fw-medium btn-primary full-width" type="button">Pay Now $772.40</button>
									</div>
								
								</div>
							</div>

						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="text-center d-flex align-items-center justify-content-center mt-4">
							<a href="{{route('BookingConfirm')}}" class="btn btn-md btn-dark fw-semibold mx-2"><i
									class="fa-solid fa-arrow-left me-2"></i>Previous</a>
							<a href="{{route('BookingSuccess')}}" class="btn btn-md btn-primary fw-semibold mx-2">Submit & Confirm<i
									class="fa-solid fa-arrow-right ms-2"></i></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ============================ Booking Page End ================================== -->

    
@endsection