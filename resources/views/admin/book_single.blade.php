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
                    <div>
                    <a href="{{ route('bookingList') }}" class="btn btn-addnew"> <i class="fa fa-file-alt"></i> Go Back</a>
                    <a href="" class="btn btn-addnew" onclick="printDiv('printableArea')" > <i class="fa fa-file-alt"></i> Print</a>
                    </div>
                </div>
                <div class="card-body" id="printableArea">
                    
                    <table id="" class="table table-bordered pro_show_table">
                        <thead>
                            <tr>
                                <th width="30%" class="p-2">Title</th>
                                <th class="p-2">Description</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td><strong>Code</strong></td>
                                <td>{{ $booking->code }}</td>
                            </tr>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td>{{ $booking->name  }}</td>
                            </tr>
                            <tr>
                                <td><strong>Phone</strong></td>
                                <td>{{ $booking->phone  }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email</strong></td>
                                <td>{{ $booking->email }}</td>
                            </tr>
                           
                            <tr>
                                <td><strong>NID Number</strong></td>
                                <td>{{ $booking->nid_number }}</td>
                            </tr>
                            <tr>
                                <td><strong>Passport</strong></td>
                                <td>{{ $booking->passport }}</td>
                            </tr>
                            <tr>
                                <td><strong>Adult</strong></td>
                                <td>{{ $booking->adult_number }} Person</td>
                            </tr>
                            <tr>
                                <td><strong>Child</strong></td>
                                <td>{{ $booking->child_number }} Person</td>
                            </tr>
                        
                     
                            <tr>
                                <td><strong>Booking Date</strong></td>
                                <td>{{ date('F j, Y',strtotime($booking->booking_date)) }}</td>
                            </tr>

                            <tr>
                                <td><strong>From Location</strong></td>
                                <td>{{ $booking->locationF->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>To Location</strong></td>
                                <td>{{ $booking->locationT->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Notes</strong></td>
                                <td>{{ $booking->note }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>
                                 @if ($booking->status == 'p')
                                     Pending
                                 @endif
                                 @if ($booking->status == 'a')
                                     Approved
                                 @endif
                                </td>
                            </tr>
                        
                        </tbody>
                        
                        
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</main>
@endsection



