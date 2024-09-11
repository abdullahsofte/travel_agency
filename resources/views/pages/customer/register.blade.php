@extends('layouts.web_master')
@section('title', 'Registration')
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
                            <div class="p-4 p-sm-7">
                                <!-- Logo -->
                                <a href="{{route('home')}}">
                                    <img class="img-fluid mb-4" src="{{asset('website/assets/img/logo-icon.png')}}" width="70" alt="logo">
                                </a>
                                <!-- Title -->
                                <h1 class="mb-2 fs-2">Create New Account</h1>
                                <p class="mb-0">Already a Member?<a href="{{route('customerLogin')}}" class="fw-medium text-primary"> Signin</a></p>

                                <!-- Form START -->
                                <form class="mt-2 text-start" action="{{route('customerStore')}}" method="POST">
                                    @csrf
                                    <div class="form py-3">
                                        <div class="form-group">
                                            <label class="form-label">Enter Name</label>
                                            <input type="test" name="name" class="form-control" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Enter Phone</label>
                                            <input type="number" name="phone" class="form-control" placeholder="017XXX-XXXXX">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Enter email ID</label>
                                            <input type="email" name="email" class="form-control" placeholder="name@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Enter Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" id="password-field" name="password"
                                                    placeholder="Password">
                                                <span
                                                    class="fa-solid fa-eye toggle-password position-absolute top-50 end-0 translate-middle-y me-3"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" name="cpassword" class="form-control" placeholder="*********">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Create An
                                                Account</button>
                                        </div>

                                    </div>
                                 
                                    <!-- Copyright -->
                                    <div class="text-primary-hover mt-3 text-center"> Copyrights ©2023 Time Air Limited Build by <a
                                            href="#">Link-Up Technology Ltd.</a> </div>
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