<?php

namespace App\Http\Controllers\Website;

use App\Models\Booking;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function selectBooking(Request $request)
    {
        $request->validate([
            'booking_date' => 'required',
        ]);
        
        try {

            $data['input'] = $request->all();
            $data['from_location']= Location::find($request->from_location);
            $data['to_location']= Location::find($request->to_location);


            $notification=array(
                'message'=>'Book Added Successfully',
                'alert-type'=>'success'
            );
            return view('pages.bookingInfo',$data);

        } catch (\Exception $e) {
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function confirmBooking(Request $request)
    {
      
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
        ]);

        if (Auth::guard('customer')->check()) {
          $user = Auth::guard('customer')->user();
        }
        // dd($request->all());
        
        try {
            $booking                = new Booking();
            $code                   = $this->generateCode('Booking');
            $booking->customer_id   = isset($user) ? $user->id : null;
            $booking->from_location = $request->from_location;
            $booking->to_location   = $request->to_location;
            $booking->booking_date  = $request->booking_date;
            $booking->child_number  = $request->child_number;
            $booking->adult_number  = $request->adult_number;
            $booking->name          = $request->name;
            $booking->email         = $request->email;
            $booking->phone         = $request->phone;
            $booking->address       = $request->address;
            $booking->country       = $request->country;
            $booking->area_city     = $request->area_city;
            $booking->postal_code   = $request->postal_code;
            $booking->nid_number    = $request->nid_number;
            $booking->passport      = $request->passport;
            $booking->note          = $request->note;
            $booking->type          = isset($user) ? "Agent" : "Online";
            $booking->code          = $code;
            $booking->status          = 'p';
            // $booking->agent_point   = $request->agent_point;
            $booking->save();
            // return $booking;

            $notification=array(
                'message'=>'Booking Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('BookingSuccess')->with($notification);

        } catch (\Exception $e) {
            
            $notification=array(
                'message'=>'Something Wrong',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function bookingList()
    {
        $booking = Booking::where('status', 'a')->latest()->get();
        return view('admin.booking_list', compact('booking'));
    }

    public function bookingPendingList()
    {
        $booking = Booking::where('status', 'p')->latest()->get();
        return view('admin.book_pending_list', compact('booking'));
    }

    public function agentBookingList()
    {
        $booking = Booking::where('type', 'Agent')->latest()->get();
        return view('admin.agent_booking_list', compact('booking'));
    }

    public function bookingView($id)
    {
        $booking = Booking::find($id);
        return view('admin.book_single', compact('booking'));
    }

    public function tripBookingView($id)
    {
        $tripData = Trip::where('booking_id', $id)->find($id);
        return view('admin.tripBooking', compact('tripData'));
    }



public function bookingDelete(Request $request)
{
    try {
        $booking = Booking::find($request->id);

        if ($booking) {
            $booking->status = 'd';
            $booking->save();

            $booking->delete();

            return response()->json([
                'message' => 'Booking Deleted Successfully',
                'success' => true
            ]);
        }

        return response()->json([
            'message' => 'Booking not found',
            'success' => false
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Something went wrong!',
            'success' => false
        ]);
    }
}


public function orderConfirm($id)
    {
        $booking = Booking::where('id',$id)->where('status','p')->first();
        $booking->status = 'a';
        $booking->save();

        $notification=array(
            'message'=>'Order Confirm Successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }

}
