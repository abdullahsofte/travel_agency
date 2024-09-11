@extends('layouts.web_master')
@section('title', 'About Us')
@section('main_content')

  <!-- ============================ Booking Title ================================== -->
  <section class="bg-cover position-relative" style="background:url({{asset('website/assets/img/bg.jpg')}})no-repeat;" data-overlay="5">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-xl-7 col-lg-9 col-md-12">

          <div class="fpc-capstion text-center my-4">
            <div class="fpc-captions">
              <h1 class="xl-heading text-light">About Us</h1>
       
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="fpc-banner"></div>
  </section>
  <!-- ============================ Booking Title ================================== -->


  <!-- ============================ About Us Section ================================== -->
  <section class="gray-simple">
    <div class="container">

      <div class="row align-items-center justify-content-between g-4">

        <div class="col-xl-6 col-lg-6 col-md-6">
          <div class="">
            <h2 class="lh-base fs-1 fw-bold">{{$about_content->title}}</h2>
            <div>
              {{$about_content->description}}
            </div>
          </div>
        </div>

        <div class="col-xl-5 col-lg-6 col-md-6">
          <div class="position-relative">
            <img src="{{asset($about_content->image)}}" class="img-fluid" alt="">
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- ============================ About Us Section End ================================== -->
@endsection