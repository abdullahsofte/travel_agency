<?php

namespace App\Http\Controllers\Admin;

use App\Models\Airbus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AirbusType;
use Illuminate\Support\Facades\Auth;

class AirbusController extends Controller
{
    public function index()
    {
        $airbus = Airbus::latest()->get();
        $airbusType = AirbusType::all();
        return view('admin.airbus.index', compact('airbus', 'airbusType'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'airbusType_id' => 'required',
            'name' => 'required|max:100',
            'image' => 'required|Image|mimes:jpg,png,gif,webp,jpeg',
        ]);

        try {
            $airbus = new Airbus();
            $airbus->airbusType_id = $request->airbusType_id;
            $airbus->name = $request->name;
            $airbus->company_name = $request->company_name;
            $airbus->description = $request->description;
            $airbus->status = 'a';
            $airbus->image = $this->imageUpload($request, 'image', 'uploads/airbus');
            $airbus->created_by = Auth::id();
            $airbus->ip_address = $request->ip();
            $airbus->save();

            $notification=array(
                'message'=>'Airbus Added Successfully',
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
        $airbus = Airbus::latest()->get();
        $airbusData = Airbus::find($id);
        $airbusType = AirbusType::all();
        return view('admin.airbus.index', compact('airbus', 'airbusData', 'airbusType'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'airbusType_id' => 'required',
            'name' => 'required|max:100',
            'image' => 'Image|mimes:jpg,png,gif,webp,jpeg',
        ]);

        try {
            $airbus = Airbus::find($id);

            $packImg = $airbus->image;
            if ($request->hasFile('image')) {
                if(!empty($airbus->image) && file_exists($airbus->image))
                unlink($airbus->image);
                $packImg = $this->imageUpload($request, 'image', 'uploads/airbus');
            }
            $airbus->airbusType_id = $request->airbusType_id;
            $airbus->name = $request->name;
            $airbus->company_name = $request->company_name;
            $airbus->description = $request->description;
            $airbus->status = 'a';
            $airbus->image = $packImg;
            $airbus->updated_by = Auth::id();
            $airbus->ip_address = $request->ip();
            $airbus->save();

            $notification=array(
                'message'=>'Airbus Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('airbus.index')->with($notification);

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
            $airbus = Airbus::find($request->id);
            if($airbus){
                if(file_exists($airbus->image) AND !empty($airbus->image)){
                    unlink($airbus->image);
                }
                $airbus->delete();
            }

            return response()->json([
                'message'=>'Airbus Deleted Successfully',
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
