<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function index()
    {
        $location = Location::latest()->get();
        return view('admin.location.index', compact('location'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
        ]);

        try {
            $location = new Location();
            $location->name = $request->name;
            $location->location_type = $request->location_type;
            $location->short_name = $request->short_name;
            $location->ip_address = $request->ip();
            $location->created_by = Auth::id();
            $location->status = 'a';
            $location->save();

            $notification=array(
                'message'=>'Location Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            // $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $location = Location::latest()->get();
        $locationData = Location::find($id);
        return view('admin.location.index', compact('location', 'locationData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
        ]);

        try {
            $location = Location::find($id);
            $location->name = $request->name;
            $location->short_name = $request->short_name;
            $location->location_type = $request->location_type;
            $location->ip_address = $request->ip();
            $location->updated_by = Auth::id();
            $location->status = 'a';
            $location->save();

            $notification=array(
                'message'=>'Location Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('location.index')->with($notification);

        } catch (\Exception $e) {
            // $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $location = Location::find($request->id);
            if($location){
                $location->delete();
            }

            return response()->json([
                'message'=>'Location Deleted Successfully',
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
