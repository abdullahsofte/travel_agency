@extends('layouts.web_master')
@section('title', 'Services')
@section('main_content')


    <section class="p-0">
        <div class="thumb-wrap">
            <img src="{{asset($services->image)}}" class="img-fluid full-width ht-500 object-fit" alt="">
        </div>
    </section>
    <!-- ============================ Articles Thumb Section ================================== -->

    <!-- ============================ Articles Deatil Section ================================== -->
    <section class="p-0 position-relative mt-n6 mb-5">
        <div class="container">
            <div class="row g-4">
                <!-- Article content -->
                <div class="col-11 col-lg-10 mx-auto">
                    <div class="bg-white shadow rounded-4 p-4">
                        <!-- Badge -->
                    
                        <!-- Title -->
                        <h1 class="fs-3">{{ $services->name }}</h1>
                        <p class="mb-2"> {!! $services->description !!}</p>

                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Articles Detail Section End ================================== -->
@endsection
