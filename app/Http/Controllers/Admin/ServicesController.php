<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index()
    {
        $service = Service::latest()->get();
        return view('admin.services.index', compact('service'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        try {
            $service = new Service();
            $service->name = $request->name;
            $service->description = $request->description;
            $service->image = $this->imageUpload($request, 'image', 'uploads/service');
            $service->status = 'a';
            $service->created_by = Auth::id();
            $service->save();

            $notification=array(
                'message'=>'Service Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $service = Service::latest()->get();
        $serviceData = Service::find($id);
        return view('admin.services.index', compact('service', 'serviceData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        try {
            $service = Service::find($id);

            $slidImg = $service->image;
            if ($request->hasFile('image')) {
                if(!empty($service->image) && file_exists($service->image))
                unlink($service->image);
                $slidImg = $this->imageUpload($request, 'image', 'uploads/service');
            }
            
            $service->name = $request->name;
            $service->description = $request->description;
            $service->image = $slidImg;
            $service->updated_by = Auth::id();
            $service->save();

            $notification=array(
                'message'=>'Service Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('service.index')->with($notification);

        } catch (\Exception $e) {
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
            $service = Service::find($request->id);
            if($service){
                if(file_exists($service->image) AND !empty($service->image)){
                    unlink($service->image);
                }
                $service->delete();
            }

            return response()->json([
                'message'=>'Service Deleted Successfully',
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
