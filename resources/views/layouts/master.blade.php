<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{$content->com_name}} | @yield('title')</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset('website/assets/images/favicon.png') }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />
        <!-- Sweetalert -->
        <script src="{{ asset('js/sweetalert.js') }}" type="text/javascript"></script>
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" />
    </head>
    <body class="sb-nav-fixed">
        
        @include('partials.navbar')

        <div id="layoutSidenav">
            
            @include('partials.sidebar')

            <div id="layoutSidenav_content">

                @yield('main-content') 
                
                @include('partials.footer')

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('password.change') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <label for="">Old Password</label>
                                    <input type="password" name="old_password" class="form-control mb-1 shadow-none"
                                        placeholder="Enter Old Password" required>
                                    <label for="">New Password</label>
                                    <input type="password" class="form-control shadow-none" name="password"
                                        placeholder="Enter New password" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <button type="submit" class="btn btn-primary shadow-none">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>

        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src=" {{ asset('js/all.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/simple-datatables@latest.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        <script src="//cdn.ckeditor.com/4.19.0/basic/ckeditor.js"></script>
        <script src="{{ asset('js/toastr.min.js') }}"></script>

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


        {{-- Time --}}
        <script type="text/javascript">
            setInterval(function() {
                var currentTime = new Date();
                var currentHours = currentTime.getHours();
                var currentMinutes = currentTime.getMinutes();
                var currentSeconds = currentTime.getSeconds();
                currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
                currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
                var timeOfDay = currentHours < 12 ? "AM" : "PM";
                currentHours = currentHours > 12 ? currentHours - 12 : currentHours;
                currentHours = currentHours == 0 ? 12 : currentHours;
                var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
                document.getElementById("timer").innerHTML = currentTimeString;
            }, 1000);
        </script>

         <!-- Sweet Alert Delete Post method -->
        <script type="text/javascript">
            $(document).ready(function() {

                $(document).on("click", "#delete", function(e) {
                    e.preventDefault();

                    var actionTo = $(this).attr("href");
                    var token = $(this).attr("data-token");
                    var id = $(this).attr("data-id");

                    swal({
                            title: "Are You Sure?",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                            closeOnConfirm: false,
                            closeOnCancel: false,
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    url: actionTo,
                                    type: "post",
                                    data: {
                                        id: id,
                                        _token: token
                                    },
                                    success: function(res) {
                                        // console.log(res);
                                        if (res.success) {
                                            swal({
                                                    title: "Deleted!",
                                                    type: "success",
                                                },
                                                function(isConfirm) {
                                                    if (isConfirm) {
                                                        $("." + id).fadeOut();
                                                    }
                                                }
                                            );

                                        }
                                    },
                                });
                            } else {
                                swal("Cancelled", "", "error");
                            }
                        }
                    );
                    return false;
                });
            });
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


        @stack('scripts')

    </body>
</html>
