<footer class="footer skin-light-footer">
  <div>
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-4">
          <div class="footer-widget">
            <div class="d-flex align-items-start flex-column mb-3">
              <div class="d-inline-block"><img src="{{ asset($content->logo) }}" class="img-fluid" width="160"
                  alt="Footer Logo">
              </div>
            </div>
            <div class="footer-add pe-xl-3">
              <p>{{ $content->footer_text }}</p>
            </div>
            <div class="foot-socials">
              <ul>
                <li><a href="{{$content->facebook}}" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="{{$content->linkedin}}" target="_blank"><i class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="{{$content->youtube}}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                <li><a href="{{$content->twitter}}" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
    

        <div class="col-lg-2 col-md-4">
          <div class="footer-widget">
            <h4 class="widget-title">Our Resources</h4>
            <ul class="footer-menu">
              <li><a href="" data-bs-toggle="modal" data-bs-target="#traking">Order Tracking</a></li>
              <li><a href="#" >Dashboard</a></li>
              <li><a href="#">Booking Now</a></li>
              <li><a href="#" >Login</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-2 col-md-6">
          <div class="footer-widget">
            <h4 class="widget-title">The Company</h4>
            <ul class="footer-menu">
              <li><a href="{{route('about_us')}}">About Us</a></li>
              <li><a href="{{route('contact.page')}}">Contact Us</a></li>
              <li><a href="{{route('ourServices')}}">Our Services</a></li>
              <li><a href="{{route('gallery.page')}}">Photo Gallery</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-5 col-md-6">
          <div class="footer-widget">
            <h4 class="widget-title">Location</h4>
            <div class="pmt-wrap">
              <iframe src="{{$content->map}}" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-bottom border-top gray-simple">
    <div class="container">
      <div class="row align-items-center justify-content-between">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <p class="mb-0">All Copyright Reserved © 2024 {{$content->com_name}} .</p>
   
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-end">
          <p class="mb-0">Developed by <a href="https://linktechbd.com/" target="_blank">Link-Up Technology Ltd</a>.</p>
        </div>

      </div>
    </div>
  </div>
</footer>