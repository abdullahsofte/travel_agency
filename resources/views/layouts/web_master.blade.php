<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$content->com_name}} | @yield('title')</title>
  <link rel="icon" type="image/x-icon" href="{{asset('website/assets/img/favicon.png')}}">

  <!-- All Plugins -->
  <link href="{{asset('website/assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/css/animation.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/css/dropzone.min.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/css/flatpickr.min.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/css/flickity.min.css')}}" rel="stylesheet">
  
  <link href="{{asset('website/assets/css/magnifypopup.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/css/select2.min.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/css/rangeSlider.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
  <link href="{{asset('website/assets/css/prism.css')}}" rel="stylesheet">
  <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
  <!-- Sweetalert -->
  <script src="{{ asset('js/sweetalert.js') }}" type="text/javascript"></script>
  <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" />
  <!-- Fontawesome & Bootstrap Icons CSS -->
  <link href="{{asset('website/assets/css/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('website/assets/css/fontawesome.css')}}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{asset('website/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
  <!-- ============================================================== -->
  
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->
    <!-- Start Navigation -->
    @include('partials.web_header')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->


    @yield('main_content')


    <!-- ============================ Footer Start ================================== -->
   @include('partials.web_footer')
    <!-- ============================ Footer End ================================== -->

    <!-- Log In Modal -->
    <div class="modal fade" id="traking" tabindex="-1" role="dialog" aria-labelledby="trakingModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="trakingModal">
          <div class="modal-header">
            <h4 class="modal-title fs-6">Order Tracking </h4>
            <a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
                class="fa-solid fa-square-xmark"></i></a>
          </div>
          <div class="modal-body">
            <div class="modal-login-form py-4 px-md-3 px-0">
              <form action="{{route('order.tracking')}}" method="POST">
                @csrf

                <div class="form-floating mb-4">
                  <input type="text" name="code" class="form-control" placeholder="Order Number">
                  <label>Order Number</label>
                </div>
              
                <div class="form-group">
                  <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Search</button>
                </div>
              </form>
            </div>

         
          </div>
          
        </div>
      </div>
    </div>
    <!-- End Modal -->


    <!-- Log In Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
          <div class="modal-header">
            <h4 class="modal-title fs-6">Sign In / Register</h4>
            <a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
                class="fa-solid fa-square-xmark"></i></a>
          </div>
          <div class="modal-body">
            <div class="modal-login-form py-4 px-md-3 px-0">
              <form action="{{route('customerLoginCheck')}}" method="POST">
                @csrf

                <div class="form-floating mb-4">
                  <input type="text" name="phone" class="form-control" placeholder="">
                  <label>User Name</label>
                </div>
                <div class="form-floating mb-4">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                  <label>Password</label>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Log In</button>
                </div>
              </form>
            </div>

         
          </div>
          <div class="modal-footer align-items-center justify-content-center">
            <p>Don't have an account yet?<a href="{{route('customerRegister')}}" class="text-primary fw-medium ms-1">Sign Up</a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

 


    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="fa-solid fa-sort-up"></i></a>

    <div class="elfsight-app-831d57d8-6653-4ba5-9f07-4517740b971c" data-elfsight-app-lazy></div>


  </div>
  <!-- ============================================================== -->
  <!-- End Wrapper -->
  <!-- ============================================================== -->


  <!-- ============================================================== -->
  <!-- All Jquery -->
  <!-- ============================================================== -->
  <script src="{{asset('website/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('website/assets/js/popper.min.js')}}"></script>
  <script src="{{asset('website/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('website/assets/js/dropzone.min.js')}}"></script>
  <script src="{{asset('website/assets/js/flatpickr.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
  <script src="{{asset('website/assets/js/flickity.pkgd.min.js')}}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

  <script src="{{asset('website/assets/js/rangeslider.js')}}"></script>
  <script src="{{asset('website/assets/js/select2.min.js')}}"></script>
  <script src="{{asset('website/assets/js/counterup.min.js')}}"></script>
  <script src="{{asset('website/assets/js/prism.js')}}"></script>
  <script src="{{asset('website/assets/js/custom.js')}}"></script>
  <!-- ============================================================== -->
  <!-- This page plugins -->
  <!-- ============================================================== -->
  <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
  

  

  @stack('web_js')
  <script>
    Fancybox.bind('[data-fancybox]', {
    });    
  </script>

  <script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>

<script>
  function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
</script>

</body>
</html>