@extends('layouts.web_master')
@section('title', 'login')
@section('main_content')

<!-- ============================== Login Section ================== -->
<section class="py-5 gray-simple">
    <div class="container">

        <div class="row justify-content-center align-items-center m-auto">
            <div class="col-12">
                <div class="bg-mode shadow rounded-3 overflow-hidden">
                    <div class="row g-0">
                        <!-- Vector Image -->
                        <div class="col-lg-6 d-flex align-items-center order-2 order-lg-1">
                            <div class="p-3 p-lg-5">
                                <img src="{{asset('website/assets/img/login.svg')}}" class="img-fluid" alt="">
                            </div>
                            <!-- Divider -->
                            <div class="vr opacity-1 d-none d-lg-block"></div>
                        </div>

                        

                        <!-- Information -->
                        <div class="col-lg-6 order-1">
                            <div class="p-3 p-sm-4 p-md-5">
                                <!-- Logo -->
                                <a href="index.html">
                                    <img class="img-fluid mb-4" src="{{asset('website/assets/img/logo-icon.png')}}" width="70" alt="logo">
                                </a>
                                <!-- Title -->
                                <h1 class="mb-2 fs-2">Agent Login!</h1>
                              
                                <!-- Form START -->
                                <form class="mt-4 text-start" action="{{route('customerLoginCheck')}}" method="POST">
                                    @csrf
                                    <div class="form py-4">
                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-control" name="phone"  required="">
                                            <label>User Name</label>
                                           
                                       
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="password" class="form-control" id="password-field" name="password" placeholder="Password"  required="">
                                            <label>Password</label>
                                            <span
                                                class="toggle-password position-absolute top-50 end-0 translate-middle-y me-3 fa-regular fa-eye"></span>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Log In</button>
                                        </div>

                                     
                                    </div>

                                    <!-- Copyright -->
                                    <div class="text-primary-hover mt-3 text-center"> Copyrights ©2023 {{$content->com_name}}. Build by <a
                                            href="#">Link-Up Technology Ltd</a>. </div>
                                </form>
                                <!-- Form END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ============================== Login Section End ================== -->
    
@endsection