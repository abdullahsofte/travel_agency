@extends('layouts.web_master')
@section('title', 'Contact Page')
@section('main_content')


<!-- ============================ Booking Title ================================== -->
<section class="bg-cover position-relative" style="background:url({{asset('website/assets/img/bg-title.jpg')}})no-repeat;" data-overlay="5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-xl-7 col-lg-9 col-md-12">

        <div class="fpc-capstion text-center my-4">
          <div class="fpc-captions">
            <h1 class="xl-heading text-light">Get-in Touch</h1>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- ============================ Booking Title ================================== -->


<!-- ============================ Form Section ================================== -->
<section class="gray-simple">
  <div class="container">

    <div class="row justify-content-between g-4 mb-5">
      <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card p-4 rounded-4 border br-dashed text-center h-100">
          <div class="crds-icons d-inline-flex mx-auto mb-3 text-primary fs-2"><i class="fa-solid fa-briefcase"></i>
          </div>
          <div class="crds-desc">
            <h5>Drop a Mail</h5>
            <p class="fs-6 text-md lh-2 mb-0">{{ $content->email }}<br>{{ $content->email_two }}</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card p-4 rounded-4 border br-dashed text-center h-100">
          <div class="crds-icons d-inline-flex mx-auto mb-3 text-primary fs-2"><i class="fa-solid fa-headset"></i>
          </div>
          <div class="crds-desc">
            <h5>Call Us</h5>
            <p class="fs-6 text-md lh-2 mb-0">{{ $content->phone }}<br> {{ $content->phone_two }}</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-6">
        <div class="card p-4 rounded-4 border br-dashed text-center h-100">
          <div class="crds-icons d-inline-flex mx-auto mb-3 text-primary fs-2"><i class="fa-solid fa-globe"></i>
          </div>
          <div class="crds-desc">
            <h5>Connect with Social</h5>
            <p class="text-md lh-2">Let's Connect with Us via social media</p>
            <ul class="list-inline mb-0">
              <li class="list-inline-item"> <a class="square--40 circle gray-simple color--facebook" href="{{$content->facebook}}" target="_blank"><i
                    class="fa-brands fa-facebook-f"></i></a> </li>
              <li class="list-inline-item"> <a class="square--40 circle gray-simple color--instagram" href="{{$content->linkedin}}" target="_blank"><i
                    class="fa-brands fa-linkedin"></i></a> </li>
              <li class="list-inline-item"> <a class="square--40 circle gray-simple color--twitter" href="{{$content->youtube}}" target="_blank"><i
                    class="fa-brands fa-youtube"></i></a> </li>
              <li class="list-inline-item"> <a class="square--40 circle gray-simple color--dribbble" href="{{$content->twitter}}" target="_blank"><i
                    class="fa-brands fa-dribbble"></i></a> </li>

             
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row align-items-center justify-content-between g-4">

      <div class="col-xl-7 col-lg-7 col-md-12">
        <div class="contactForm bg-light p-4 rounded-3">
          <form action="{{route('send.message')}}" method="POST">
            @csrf
            <div class="row align-items-center">

              <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="touch-block d-flex flex-column mb-4">
                  <h2>Drop Us a Line</h2>
                  <p>Get in touch via form below and we will reply as soos as we can. </p>
                </div>
              </div>

              <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Your Name</label>
                  <input type="text" name="name"  class="form-control" placeholder="Enter NAme">
                  @error('name') <span style="color: red">{{$message}}</span> @enderror
                </div>
              </div>

              <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">eMail ID</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter Email">
                  @error('email') <span style="color: red">{{$message}}</span> @enderror
                </div>
              </div>

              <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Phone No.</label>
                  <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                  @error('phone') <span style="color: red">{{$message}}</span> @enderror
                  
                </div>
              </div>

              <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="form-group">
                  <label class="form-label">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject" placeholder="subject">
                 
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="form-group">
                  <label class="form-label">Your Query</label>
                  <textarea class="form-control ht-120" id="message" name="message" placeholder="Message"></textarea>
                  <span class="text-danger" id="nameErr"></span>
                </div>
              </div>

              <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="form-group mb-0">
                  <button type="submit" class="btn fw-medium btn-primary">Send Message<i
                      class="fa-solid fa-paper-plane ms-2"></i></button>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>

      <div class="col-xl-5 col-lg-5 col-md-12">
        <iframe class="full-width ht-100 grayscale rounded"
          src="{{$content->map}}"
          height="500" style="border:0;" aria-hidden="false" tabindex="0"></iframe>
      </div>

    </div>

  </div>
</section>
<!-- ============================ Form Section End ================================== -->




@endsection

