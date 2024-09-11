@extends('layouts.web_master')
@section('title', 'Flight Booking')
@section('main_content')

		<!-- ============================ Booking Page ================================== -->
		<section class="pt-4 gray-simple position-relative">
			<div class="container">

				<div class="row align-items-start">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="div-title d-flex align-items-center mb-3">
							<h4> Booking Details</h4>
						</div>
						<form action="{{route('confirmBooking')}}" method="POST">
							@csrf
							<div class="row align-items-start">

								<div class="col-xl-8 col-lg-8 col-md-12">
	
									<div class="card mb-3">
										<div class="card-header">
											<h4>Personal Information</h4>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Name</label>
														<input type="text" class="form-control" name="name" value="{{old('name')}}"  placeholder="Name" required>
														@error('name') <span style="color: red">{{$message}}</span> @enderror
													</div>
												</div>
												
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Email</label>
														<input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required>
														@error('email') <span style="color: red">{{$message}}</span> @enderror
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Phone</label>
														<input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Phone Number" required>
														@error('phone') <span style="color: red">{{$message}}</span> @enderror
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">NID Number</label>
														<input type="text" name="nid_number" class="form-control" value="{{old('nid_number')}}" placeholder="NID Number" required>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Passport Number</label>
														<input type="text" name="passport" class="form-control" value="{{old('passport')}}" placeholder="Passport Number">
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Address</label>
														<input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Address" required>
													</div>
												</div>
											
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">City\State</label>
														<input type="text" class="form-control" name="area_city" value="{{old('area_city')}}" placeholder="City/State" required>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<div class="form-group">
														<label class="form-label">Postal Code</label>
														<input type="text" class="form-control" name="postal_code" value="{{old('postal_code')}}" placeholder="Postal Code">
													</div>
												</div>
												<div class="col-xl-12 col-lg-12 col-md-12">
													<div class="form-group">
														<label class="form-label">Special notes</label>
														<textarea class="form-control ht-100" name="note" placeholder="Note"></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
							
								</div>
								<div class="col-xl-4 col-lg-4 col-md-12">
									<div class="side-block card rounded-2 p-3">
										<div class="bott-block d-block mb-3">
											<h5 class="fw-semibold fs-6">Your Summary</h5>
											<div class="mid-block rounded-2 border br-dashed p-2 mb-3">
												<div class="row align-items-center justify-content-between g-2 mb-4">
													<div class="col-6">
														<div class="gray rounded-2 p-2">
															<span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">From Location</span>
															<p class="text-dark fw-semibold lh-base text-md mb-0">
																@if(isset($from_location))
																{{ $from_location->name }}
															 @endif
															 <input type="hidden" name="from_location"  value="@if(isset($input)){{ $input['from_location'] }}@endif">
															</p>
															
														</div>
													</div>
													<div class="col-6">
														<div class="gray rounded-2 p-2">
															<span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">To Location</span>
															<p class="text-dark fw-semibold lh-base text-md mb-0">
																@if(isset($to_location))
																{{ $to_location->name }}
															  @endif 
															  <input type="hidden" name="to_location" value="@if(isset($input)){{ $input['to_location'] }}@endif" >

															</p>
															
														</div>
													</div>
													<div class="col-6">
														<div class="gray rounded-2 p-2">
															<span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Booking Date</span>
															<p class="text-dark fw-semibold lh-base text-md mb-0">
																@if(isset($input))
																{{ date('d M Y',strtotime($input['booking_date'])) }}
															     @endif
																 <input type="hidden" name="booking_date" value="@if(isset($input)){{ $input['booking_date'] }}@endif">
															
															</p>
														</div>
													</div>
													<div class="col-3">
														<div class="gray rounded-2 p-2 text-center">
															<span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Adults</span>
															<p class="text-dark fw-semibold lh-base text-md mb-0">
																@if(isset($input))
																{{ $input['adult_number'] }}
																@endif
																<input type="hidden" name="adult_number" value="@if(isset($input)){{ $input['adult_number'] }}@endif">
														
															</p>
														</div>
													</div>
													<div class="col-3">
														<div class="gray rounded-2 p-2 text-center">
															<span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Childs</span>
															<p class="text-dark fw-semibold lh-base text-md mb-0 ">
																@if(isset($input))
																{{ $input['child_number'] }}
															  @endif	
															  <input type="hidden" name="child_number" value="@if(isset($input)){{ $input['child_number'] }}@endif">	  
															</p>
														</div>
													</div>
												</div>
										
											
											</div>
										
										</div>
										<div class="bott-block">
											<button class="btn fw-medium btn-primary full-width" type="submit">Confirm To Book</button>
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

@push('web_js')


	
@endpush