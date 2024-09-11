<?php

namespace App\Http\Controllers\Admin;

use App\Models\TripClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TripClassController extends Controller
{

    public function index()
    {
        $tripClass = tripClass::latest()->get();
        return view('admin.trip_class.index', compact('tripClass'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
        ]);

        try {
            $tripClass = new TripClass();
            $tripClass->name = $request->name;
            $tripClass->ip_address = $request->ip();
            $tripClass->created_by = Auth::id();
            $tripClass->status = 'a';
            $tripClass->save();

            $notification=array(
                'message'=>'Trip Class Added Successfully',
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
        $tripClass = TripClass::latest()->get();
        $tripClassData = TripClass::find($id);
        return view('admin.trip_Class.index', compact('tripClass', 'tripClassData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
        ]);

        try {
            $tripClass = TripClass::find($id);
            $tripClass->name = $request->name;
            $tripClass->ip_address = $request->ip();
            $tripClass->updated_by = Auth::id();
            $tripClass->status = 'a';
            $tripClass->save();

            $notification=array(
                'message'=>'tripClass Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('tripClass.index')->with($notification);

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
            $tripClass = TripClass::find($request->id);
            if($tripClass){
                $tripClass->delete();
            }

            return response()->json([
                'message'=>'tripClass Deleted Successfully',
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
