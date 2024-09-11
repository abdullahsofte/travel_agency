@extends('layouts.master')
@section('title', 'Book Pending List')
@section('main-content')

<main>
    <div class="container-fluid" id="Category">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Book Pending List</span>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card my-2">
                    <div class="card-header d-flex justify-content-between">
                        <div class="table-head"><i class="fas fa-address-book"></i> Book Pending List</div>
                        <div class="float-right">
                          
                        </div>
                    </div>
                    <div class="card-body table-card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="datatablesSimple" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Booking Date</th>
                                        <th>NID Number</th>
                                        <th>Passport</th>
                                        <th>From Location</th>
                                        <th>To Location</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking as $key => $item)
                                    <tr class="{{ $item->id }}">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->booking_date }}</td>
                                        <td>{{ $item->nid_number }}</td>
                                        <td>{{ $item->passport }}</td>
                                        <td>{{ $item->locationF->name }}</td>
                                        <td>{{ $item->locationT->name }}</td>
                                        <td>
                                            @if ($item->type == 'Online')
                                            <span style="color: blue">Online</span>
                                           @endif
                                            @if ($item->type == 'Agent')
                                            <span style="color:green" >Agent</span>
                                           @endif
                                        </td>
                                        
                                        <td>
                                          @if ($item->status == 'p')
                                           <a href="#" class="btn btn-edit">Pending</a>
                                          @endif
                                        </td>
                                      
                                        <td>
                                            
                                           
                                            <a href="{{route('trip.booking', $item->id)}}" target="_blank" class="btn btn-edit shadow-none"><i class="fas fa-plane-departure"></i></a>
                                            <a href="{{  route('bookingView', $item->id) }}" class="btn btn-edit shadow-none"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('bookingDelete')}}" id="delete" data-token="{{csrf_token()}}" data-id="{{$item->id}}" class="btn btn-delete shadow-none"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
