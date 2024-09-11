@extends('layouts.web_master')
@section('title', 'Destinations Page')
@section('main_content')

  <div class="breadcrumb-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="breadcrumb-wrap">
            <h2>Destination</h2>
            <ul class="breadcrumb-links">
              <li> <a href="{{ route('index') }}">Home</a> <i class="bx bx-chevron-right"></i> </li>
              <li>Destination</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="destinations-area pt-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="section-head pb-2">
            <h5>Choose Your Package</h5>
            <h2>Select Your best Package For Your Travel</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="package-slider-wrap"> <img src="{{ asset('website') }}/assets/images/destination/d-1.png" alt="" class="img-fluid">
            <div class="pakage-overlay"> <strong>Spain</strong> </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-9">
          <div class="row owl-carousel destinations-1">
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-4.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$145</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Paris Hill Tour</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-5.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$240</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Lake Garda, Spain</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-6.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$300</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Mount Dtna, Spain</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-7.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$120</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Amalfi Costa, Italy</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9 col-md-9">
          <div class="row owl-carousel destinations-2">
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-7.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$145</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Amalfi Costa, Italy</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-8.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$240</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Fench Rivira, Italy</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-9.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$300</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Amalfi Costa, Italy</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-10.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$120</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Mount Dtna, Italyr</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3">
          <div class="package-slider-wrap"> <img src="{{ asset('website') }}/assets/images/destination/d-2.png" alt="" class="img-fluid">
            <div class="pakage-overlay"> <strong>Italy</strong> </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="package-slider-wrap"> <img src="{{ asset('website') }}/assets/images/destination/d-3.png" alt="" class="img-fluid">
            <div class="pakage-overlay"> <strong>Dubai</strong> </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-9">
          <div class="row owl-carousel destinations-1">
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-11.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$145</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Amalfi Costa, Italy</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-5.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$240</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Maritime Heritage</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-9.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$300</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Souks of Deira</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-4.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$120</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Jumeirah Mosque</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-9 col-md-9">
          <div class="row owl-carousel destinations-2">
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-7.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$145</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Amalfi Costa, Italy</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-8.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$240</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Fench Rivira, Italy</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-9.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$300</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Amalfi Costa, Italy</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-10.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$120</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Mount Dtna, Italyr</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3">
          <div class="package-slider-wrap"> <img src="{{ asset('website') }}/assets/images/destination/d-2.png" alt="" class="img-fluid">
            <div class="pakage-overlay"> <strong>France</strong> </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="package-slider-wrap"> <img src="{{ asset('website') }}/assets/images/destination/d-1.png" alt="" class="img-fluid">
            <div class="pakage-overlay"> <strong>Switzerland</strong> </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-9">
          <div class="row owl-carousel destinations-1">
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-4.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$145</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Paris Hill Tour</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-5.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$240</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Lake Garda, Spain</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-6.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$300</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Mount Dtna, Spain</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
            <div class="package-card">
              <div class="package-thumb"> <img src="{{ asset('website') }}/assets/images/destination/d-7.png" alt="" class="img-fluid"> </div>
              <div class="package-details">
                <div class="package-info">
                  <h5><span>$120</span>/Per Person</h5>
                </div>
                <h3><i class="flaticon-arrival"></i> <a href="package-details.html">Amalfi Costa, Italy</a> </h3>
                <div class="package-rating"> <i class='bx bxs-star'></i> <strong><span>1.3K+</span> Rating</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="pagination mt-30"> <a href="#"><i class="bx bx-chevron-left"></i></a> <a href="#"
              class="active">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#"><i
                class="bx bx-chevron-right"></i></a> </div>
        </div>
      </div>
    </div>
  </div>

@endsection