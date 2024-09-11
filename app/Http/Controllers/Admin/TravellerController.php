<?php

namespace App\Http\Controllers\Admin;

use App\Models\Traveller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TravellerController extends Controller
{
    public function index()
    {
        $traveller = Traveller::latest()->get();
        return view('admin.traveller', compact('traveller'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'designation' => 'max:100',
            'image' => 'required|Image|mimes:jpg,png,gif,webp',
        ]);

        try {
            $traveller = new Traveller();
            $traveller->name = $request->name;
            $traveller->designation = $request->designation;
            $traveller->description = $request->description;
            $traveller->image = $this->imageUpload($request, 'image', 'uploads/traveller');
            $traveller->ip_address = $request->ip();
            $traveller->created_by = Auth::id();
            $traveller->save();

            $notification=array(
                'message'=>'Data Added Successfully',
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
        $traveller = Traveller::latest()->get();
        $travellerData = Traveller::find($id);
        return view('admin.traveller', compact('traveller', 'travellerData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'designation' => 'max:100',
            'image' => 'Image|mimes:jpg,png,gif,webp',
        ]);

        try {
            $traveller = Traveller::find($id);

            $travImg = $traveller->image;
            if ($request->hasFile('image')) {
                if(!empty($traveller->image) && file_exists($traveller->image));
                unlink($traveller->image);
                $travImg = $this->imageUpload($request, 'image', 'uploads/traveller');
            }
            $traveller->name = $request->name;
            $traveller->designation = $request->designation;
            $traveller->description = $request->description;
            $traveller->image = $travImg;
            $traveller->ip_address = $request->ip();
            $traveller->updated_by = Auth::id();
            $traveller->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('traveller.index')->with($notification);

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
            $traveller = Traveller::find($request->id);
            if($traveller){
                if(file_exists($traveller->image) AND !empty($traveller->image)){
                    unlink($traveller->image);
                }
                $traveller->delete();
            }

            return response()->json([
                'message'=>'Data Deleted Successfully',
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
