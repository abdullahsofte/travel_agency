@extends('layouts.master')
@section('title', 'Home')
@section('main-content')
<main>
    <div class="container-fluid">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Dashboard</span>
        </div>
        <div class="row mt-3">
            <div class="dashboard-logo text-center pt-3 pb-4">
                <img class="border p-2" style="height: 100px;" src="{{ asset($content->logo) }}" alt="">
            </div>
            <div class="dash-text text-center">
                <h2 style="font-size: 40px">Welcome To {{$content->com_name}}</h2>
            </div>
            {{-- <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('bookingList') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Booking List</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('slider.index') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="far fa-money-bill-alt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Slider</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('company.profile') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="far fa-file-alt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Company Profile</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('location.index') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="far fa-file-pdf fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Location Entry</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('service.index') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="far fa-file-pdf fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Add Services</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('photo.gallery') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Gallery</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('messages.index') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fas fa-envelope fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Public Message</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('admin.logout') }}">
                        <div class="card-body mx-auto text-center">
                            <div class=" d-flex justify-content-center align-items-center">
                                <i class="fa fa-sign-out-alt fa-2x"></i>
                            </div>
                            <p class="dashboard-card-text">Sign Out</p>
                        </div>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</main>
@endsection