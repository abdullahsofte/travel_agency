<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about', compact('about'));
    }

    public function update(Request $request, $id)
    {
        try {
            $about = About::find($id);

            //logo image 
            $aboutImg = $about->image;
            if ($request->hasFile('image')) {
                if (!empty($about->image) && file_exists($about->image)) 
                    unlink($about->image);
                $aboutImg = $this->imageUpload($request, 'image', 'uploads/about');
            }

            $about->title = $request->title;
            $about->description = $request->description;
            $about->video_link = $request->video_link;
            $about->image = $aboutImg;
            $about->ip_address = $request->ip();
            $about->updated_by = Auth::id();
            $about->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
