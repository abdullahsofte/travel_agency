<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trip;
use App\Models\Airbus;
use App\Models\Location;
use App\Models\TripClass;
use App\Models\AirbusType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TripController extends Controller
{
    public function index()
    {


        $trip = Trip::where('status', 'a')->latest()->get();
        $location = Location::where('status', 'a')->latest()->get();
        $airbus  =  Airbus::where('status', 'a')->latest()->get();
        $airbusType = AirbusType::where('status', 'a')->latest()->get();
        $tripClass = TripClass::where('status', 'a')->latest()->get();
        return view('admin.trip.index', compact('trip', 'location', 'airbus', 'airbusType', 'tripClass'));
    }


    public function tripbooking($id)
    {
       
        $trip = Trip::where('status', 'a')->latest()->get();
        $location = Location::where('status', 'a')->latest()->get();
        $airbus  =  Airbus::where('status', 'a')->latest()->get();
        $booking = Booking::where('id',$id)->where('status', 'p')->first();
        $airbusType = AirbusType::where('status', 'a')->latest()->get();
        $tripClass = TripClass::where('status', 'a')->latest()->get();
        return view('admin.trip.bookingindex', compact('trip', 'location', 'airbus', 'airbusType', 'tripClass','booking'));
    }

    public function getAirbus($id)
    {
        $airbus = Airbus::where('airbusType_id', $id)->get();
        return response()->json($airbus);
    }


    public function store(Request $request)
        {
            $this->validate($request, [
                'airbusType_id' => 'required',
                'airbus_id' => 'required',
                'class_id' => 'required',
                'start_time' => 'required',
                'price' => 'required',
            ]);

            try {
                $booking = Booking::find($request->booking_id);
                $input = $request->all();
                $input['start_date'] = date('Y-m-d', strtotime($request->start_date));
                $input['status'] =  'a';
                $input['ip_address'] =  $request->ip();
                $input['created_by'] =  Auth::id();
                Trip::create($input);
                $booking->update([
                  'status' => 'a'  
                ]);
               
                $notification = array(
                    'message' => 'Trip Added Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->route('bookingList')->with($notification);
            } catch (\Exception $e) {
                $notification = array(
                    'message' => $e->getMessage(),
                    // 'message' => 'Something went wrong!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
    }


    public function edit($id)
    {
        $trip = Trip::where('status', 'a')->latest()->get();
        $tripData = Trip::find($id);
        $location = Location::where('status', 'a')->latest()->get();
        $airbus  =  Airbus::where('status', 'a')->latest()->get();
        $airbusType = AirbusType::where('status', 'a')->latest()->get();
        $booking = Booking::where('id',$id)->where('status', 'p')->first();
        $tripClass = TripClass::where('status', 'a')->latest()->get();
        return view('admin.trip.index', compact('trip', 'tripData', 'location', 'airbus', 'airbusType', 'tripClass', 'booking'));
    }

    public function bookintrip($id)
    {
        $trip = Trip::where('status', 'a')->latest()->get();
        $tripData = Trip::find($id);
        $airbus  =  Airbus::where('status', 'a')->latest()->get();
        $airbusType = AirbusType::where('status', 'a')->latest()->get();
        $booking = Booking::where('id',$id)->where('status', 'a')->find($id);
        $tripClass = TripClass::where('status', 'a')->latest()->get();
        return view('admin.trip.bookingindex', compact('trip', 'tripData', 'airbus', 'airbusType', 'tripClass', 'booking'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'airbusType_id' => 'required',
            'airbus_id'     => 'required',
            'class_id'      => 'required',
            'start_time'    => 'required',
            'price'         => 'required',
        ]);

        // dd($request->all());

        try {
            $booking = Booking::find($request->booking_id);
            $trip = Trip::find($id);
            $trip->airbusType_id      = $request->airbusType_id;
            $trip->airbus_id          = $request->airbus_id;
            $trip->class_id           = $request->class_id;
            $trip->booking_id         = $request->booking_id;
            $trip->customer_id        = $request->customer_id;
            $trip->start_date         = date('Y-m-d', strtotime($request->start_date));
            $trip->start_time         = $request->start_time;
            $trip->price              = $request->price;
            $trip->payment_type              = $request->payment_type;
            $trip->discount           = $request->discount;
            $trip->total_point        = $request->total_point;
            $trip->agent_point_amount = $request->agent_point_amount;
            $trip->description        = $request->description;
            $trip->status             = 'a';
            $trip->updated_by         = Auth::id();
            $trip->ip_address         = $request->ip();
            $trip->save();
            $booking->update([
                'status' => 'a'  
              ]);

            $notification=array(
                'message'=>'Trip Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('bookingList')->with($notification);

        } catch (\Exception $e) {
            // $e->getMessage();
            $notification=array(
                'message'=> $e->getMessage(),
                // 'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $trip = Trip::find($request->id);
            if($trip){
                if(file_exists($trip->image) AND !empty($trip->image)){
                    unlink($trip->image);
                }
                $trip->delete();
            }

            return response()->json([
                'message'=>'Trip Deleted Successfully',
                'success'=> true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Something went wrong!',
                'success'=> false
            ]);
        } 
    }
}
