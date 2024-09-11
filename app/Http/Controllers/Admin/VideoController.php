<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        $gallery = Video::latest()->get();
        return view('admin.video.index', compact('gallery'));
    }

    public function store(Request $request)
    {
        
        try {
            $gallery = new Video();
            $gallery->title = $request->title;
            $gallery->video_link = $request->video_link;
            $gallery->created_by = Auth::id();
            $gallery->ip_address = $request->ip();
            $gallery->save();

            $notification=array(
                'message'=>'Video Gallery Added Successfully',
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
        $gallery = Video::latest()->get();
        $galleryData = Video::find($id);
        return view('admin.video.index', compact('gallery', 'galleryData'));
    }

    public function update(Request $request, $id)
    {
       

        try {
            $gallery = Video::find($id);
            $gallery->title = $request->title;
            $gallery->video_link = $request->video_link;
            $gallery->updated_by = Auth::id();
            $gallery->ip_address = $request->ip();
            $gallery->save();

            $notification=array(
                'message'=>'Video Gallery Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('video.gallery')->with($notification);

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
            $gallery = Video::find($request->id);
            if($gallery){
                
                $gallery->delete();
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
