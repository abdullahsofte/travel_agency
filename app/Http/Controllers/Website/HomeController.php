<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Airbus;
use App\Models\Benifite;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Location;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Trip;
use App\Models\TripClass;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $sliders  = Slider::latest()->get();
        $gallery  = Gallery::latest()->take(4)->get();
        $video  = Video::latest()->take(4)->get();
        $services = Service::latest()->take(3)->get();
        $location = Location::where('status', 'a')->latest()->get();
        $tripClass = TripClass::where('status', 'a')->latest()->get();
        $benefit  = Benifite::first();
        return view('pages.web_index', compact('sliders', 'gallery', 'video', 'services', 'benefit', 'location', 'tripClass'));
    }

    public function about()
    {
        $about_us = About::first();
        return view('pages.about_us', compact('about_us'));
    }

    // public function destination()
    // {
    //     return view('pages.destinations');
    // }


    public function ourServices()
    {
        $services = Service::latest()->get();
        return view('pages.services', compact('services'));
    }


    public function serviceDetails($id)
    {
        $services = Service::find($id);
        return view('pages.service_details', compact('services'));
    }

    // public function flightList()
    // {
    //     $location = Location::where('status', 'a')->latest()->get();
    //     $tripClass = TripClass::where('status', 'a')->latest()->get();
    //     $trip = Trip::where('status', 'a')->latest()->get();
    //     $airbus = Airbus::where('status', 'a')->latest()->get();
    //     return view('pages.flight_list', compact('trip', 'airbus', 'location', 'tripClass'));
    // }

    public function flightDetails()
    {
        return view('pages.flight_details');
    }

    public function flightBooking($id)
    {

        $trip = Trip::find($id);
        return view('pages.booking', compact('trip'));
    }

    // public function BookingInfo()
    // {
    //     $location = Location::where('status', 'a')->latest()->get();
    //     return view('pages.bookingInfo', compact('location'));
    // }

    public function BookingConfirm()
    {
        return view('pages.bookingConfirm');
    }

    public function BookingSuccess()
    {
        $booking  = Booking::latest()->first();
        return view('pages.bookingSuccess', compact('booking'));
    }


    public function galleryPage()
    {
        $gallery = Gallery::latest()->get();
        return view('pages.gallery', compact('gallery'));
    }

    public function videoGallery()
    {
        $gallery = Video::latest()->get();
        return view('pages.video', compact('gallery'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendMessage(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'phone' => 'required|regex:/^01[13-9][\d]{8}$/|digits:11',
        ]);

        try {
            $input = $request->all();
            Contact::create($input);
           
            $notification = array(
                'message' => 'Message Send Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                // 'message' => $e->getMessage(),
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
      }


    public function searchTrip(Request $request)
    {

        $clauses = "";
        $date = Carbon::parse($request->date)->format('Y-m-d');

        if($request->date && $request->date != ''){
            $clauses .= " and t.date >= '$request->date'";
        }

        if($request->from_location && $request->from_location != ''){
            $clauses .= " and t.from_location = '$request->from_location'";
        }
        if($request->to_location && $request->to_location != ''){
            $clauses .= " and t.to_location = '$request->to_location'";
        }
        $trip = DB::select("
          select t.*,
            lc.name,
            lc.short_name,
            ab.name,
            ab.image
            from trips t
            left join locations lc on lc.id = t.from_location
            left join airbuses ab on ab.id = t.airbus_id 
            where t.status = 'a'
            $clauses
        ");

        $location = Location::where('status', 'a')->latest()->get();
        $tripClass = TripClass::where('status', 'a')->latest()->get();
        $airbus = Airbus::where('status', 'a')->latest()->get();
        return view('pages.flight_list', compact('trip', 'location', 'tripClass', 'airbus'));
          
    }



public function getLocation(Request $request)
{
    $locationId = $request->from_location;
    $FLocations = Location::where('id', '!=', $locationId)->get();

    return response()->json(['locations' => $FLocations]);
}

public function getLocationArea(Request $request)
{
    $locationType = $request->input('location_type');
    $locations = Location::where('location_type', $locationType)->get();

    return response()->json(['locations' => $locations]);
}


public function tracking()
{
    $booking  = Booking::latest()->first();
    return view('pages.order_traking', compact('booking'));
}


public function trackingOrder(Request $request)
{
    $booking = Booking::where('code', $request->code)->first();
    if ($booking) {
        
        $notification = array(
            'message' => 'Order Traking Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('tracking')->with($notification);
    } else {
        $notification = array(
            'message' => 'Order Not Found',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification);
    }
}




  
  
}
