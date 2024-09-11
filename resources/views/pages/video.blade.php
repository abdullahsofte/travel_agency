@extends('layouts.web_master')
@section('title', 'Video Gallery')
@section('main_content')


	<!-- ============================ Hero Banner  Start================================== -->
  <div class="py-5 bg-primary position-relative">
    <div class="container">

      <!-- Search Form -->
      <div class="row justify-content-center align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        
        </div>
      </div>
      <!-- </row> -->

    </div>
  </div>
  <!-- ============================ Hero Banner End ================================== -->


  <!-- ============================ Offers Start ================================== -->
  <section class="gray-simple">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
            <div class="secHeading-wrap text-center mb-5">
                <h2>Video Gallery</h2>
            </div>
        </div>
    </div>
      <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">

        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="row gy-4 gx-xl-4 gx-3">

            @foreach ($gallery as $item)
                
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
              <div class="pop-touritem">
                <a href="" class="card rounded-3 m-0 popup-youtube">
                  <div class="flight-thumb-wrapper p-2 pb-0">
                    <div class="popFlights-item-overHidden rounded-3">
                        <iframe src="{{ $item->video_link}}" frameborder="0"></iframe>
                    </div>
                  </div>
                  <div class="touritem-middle position-relative p-3">
                    <div class="touritem-flexxer">
                      <div class="explot">
                        <h4 class="city fs-title m-0 fw-bold">
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
    </div>
  </section>
  <!-- ============================ Offers End ================================== -->

@endsection