<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $welcome = Welcome::first();
        return view('admin.welcome', compact('welcome'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'max:255',
            'description' => 'required',
            'image' => 'Image|mimes:jpg,png,gif,webp',
        ]);

        try {
            $welcome = Welcome::find($id);

            //Welcome image 
            $welImg = $welcome->image;
            if ($request->hasFile('image')) {
                if (!empty($welcome->image) && file_exists($welcome->image)) 
                    unlink($welcome->image);
                $welImg = $this->imageUpload($request, 'image', 'uploads/welcome');
            }

            $welcome->title = $request->title;
            $welcome->description = $request->description;
            $welcome->image = $welImg;
            $welcome->ip_address = $request->ip();
            $welcome->updated_by = Auth::id();
            $welcome->save();

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
