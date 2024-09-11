<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::latest()->get();
        return view('admin.slider', compact('slider'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|Image|mimes:jpg,png,gif,webp,jpeg',
        ]);

        try {
            $slider = new Slider();
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->link = $request->link;
            $slider->image = $this->imageUpload($request, 'image', 'uploads/slider');
            $slider->created_by = Auth::id();
            $slider->ip_address = $request->ip();
            $slider->save();

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
        $slider = Slider::latest()->get();
        $sliderData = Slider::find($id);
        return view('admin.slider', compact('slider', 'sliderData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'Image|mimes:jpg,png,gif,webp,jpeg',
        ]);

        try {
            $slider = Slider::find($id);

            $slidImg = $slider->image;
            if ($request->hasFile('image')) {
                if(!empty($slider->image) && file_exists($slider->image))
                unlink($slider->image);
                $slidImg = $this->imageUpload($request, 'image', 'uploads/slider');
            }
            
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->link = $request->link;
            $slider->image = $slidImg;
            $slider->ip_address = $request->ip();
            $slider->updated_by = Auth::id();
            $slider->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('slider.index')->with($notification);

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
            $slider = Slider::find($request->id);
            if($slider){
                if(file_exists($slider->image) AND !empty($slider->image)){
                    unlink($slider->image);
                }
                $slider->delete();
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
