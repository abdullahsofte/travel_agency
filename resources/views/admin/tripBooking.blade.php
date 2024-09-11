@extends('layouts.master')
@section('title', 'Booking Show')
@push('admin-css')
    <style>
        .pro_show_table tr td{
            padding: 8px
        }
    </style>
@endpush


@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Booking Details</span>
        </div>
        <div class="row">

            <div class="card my-3">
                <div class="card-header d-flex justify-content-between">
                    <div class="table-head"><i class="fas fa-table me-1"></i> Booking Details</div>
                    <a href="{{ route('bookingList') }}" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> Go Back</a>
                </div>
                <div class="card-body">
                    
                    <table id="" class="table table-bordered pro_show_table">
                        <thead>
                            <tr>
                                <th width="30%" class="p-2">Title</th>
                                <th class="p-2">Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><strong>Agent Name</strong></td>
                                <td>{{ @$tripData->customer->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Airbus Type</strong></td>
                                <td>{{ @$tripData->airbusType->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Airbus Name</strong></td>
                                <td>{{ @$tripData->airbus->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Airbus Class</strong></td>
                                <td>{{ @$tripData->tripClass->name  }}</td>
                            </tr>
                            <tr>
                                <td><strong>Price</strong></td>
                                <td>{{ @$tripData->price  }}</td>
                            </tr>
                          
                            <tr>
                                <td><strong>Discount</strong></td>
                                <td>{{ @$tripData->discount  }}</td>
                            </tr>
                            <tr>
                                <td><strong>Payment Type</strong></td>
                                <td>{{ @$tripData->payment_type  }}</td>
                            </tr>
                            <tr>
                                <td><strong>Flight Date</strong></td>
                                <td>{{ @$tripData->start_date  }}</td>
                            </tr>
                            <tr>
                                <td><strong>Flight Time</strong></td>
                                <td>{{ @$tripData->start_time  }}</td>
                            </tr>
                            <tr>
                                <td><strong>Description</strong></td>
                                <td>{!! @$tripData->description !!}</td>
                            </tr>
                          
                     
                         
                         
                        </tbody>
                        
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</main>
@endsection



