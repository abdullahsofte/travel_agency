<?php

namespace App\Http\Controllers\Admin;

use App\Models\Benifite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BenifitsController extends Controller
{
    public function index()
    {
        $benefit = Benifite::latest()->first();
        return view('admin.benefit.index', compact('benefit'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        try {
            $benefit = Benifite::first();

            //logo image 
            $benefitImg = $benefit->image;
            if ($request->hasFile('image')) {
                if (!empty($benefit->image) && file_exists($benefit->image)) 
                    unlink($benefit->image);
                $benefitImg = $this->imageUpload($request, 'image', 'uploads/benefit');
            }

            $benefit->title_one = $request->title_one;
            $benefit->description = $request->description;
            $benefit->title_two = $request->title_two;
            $benefit->description_two = $request->description_two;
            $benefit->title_three = $request->title_three;
            $benefit->description_three = $request->description_three;
            $benefit->title_four = $request->title_four;
            $benefit->description_four = $request->description_four;
            $benefit->image = $benefitImg;
            $benefit->updated_by = Auth::id();
            $benefit->save();

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


    // public function store(Request $request)
    // {
    //     $this->validate($request,[
    //         'name' => 'required',
    //     ]);

    //     try {
    //         $benefit = new Benifite();
    //         $benefit->name = $request->name;
    //         $benefit->description = $request->description;
    //         $benefit->image = $this->imageUpload($request, 'image', 'uploads/benefit');
    //         $benefit->status = 'a';
    //         $benefit->created_by = Auth::id();
    //         $benefit->save();

    //         $notification=array(
    //             'message'=>'Benefit Added Successfully',
    //             'alert-type'=>'success'
    //         );
    //         return Redirect()->back()->with($notification);

    //     } catch (\Exception $e) {
    //         $notification=array(
    //             'message'=>'Something went wrong!',
    //             'alert-type'=>'error'
    //         );
    //         return Redirect()->back()->with($notification);
    //     }
    // }

    // public function edit($id)
    // {
    //     $benefit = Benifite::latest()->get();
    //     $benefitData = Benifite::find($id);
    //     return view('admin.benefit.index', compact('benefit', 'benefitData'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $this->validate($request,[
    //         'name' => 'required',
    //     ]);

    //     try {
    //         $benefit = Benifite::find($id);

    //         $slidImg = $benefit->image;
    //         if ($request->hasFile('image')) {
    //             if(!empty($benefit->image) && file_exists($benefit->image))
    //             unlink($benefit->image);
    //             $slidImg = $this->imageUpload($request, 'image', 'uploads/benefit');
    //         }
            
    //         $benefit->name = $request->name;
    //         $benefit->description = $request->description;
    //         $benefit->image = $slidImg;
    //         $benefit->updated_by = Auth::id();
    //         $benefit->save();

    //         $notification=array(
    //             'message'=>'Benefit Updated Successfully',
    //             'alert-type'=>'success'
    //         );
    //         return Redirect()->route('benefit.index')->with($notification);

    //     } catch (\Exception $e) {
    //         $notification=array(
    //             'message'=>'Something went wrong!',
    //             'alert-type'=>'error'
    //         );
    //         return Redirect()->back()->with($notification);
    //     }
    // }

    // public function destroy(Request $request)
    // {
    //     try {
    //         $benefit = Benifite::find($request->id);
    //         if($benefit){
    //             if(file_exists($benefit->image) AND !empty($benefit->image)){
    //                 unlink($benefit->image);
    //             }
    //             $benefit->delete();
    //         }

    //         return response()->json([
    //             'message'=>'Benefit Deleted Successfully',
    //             'success'=> true
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message'=>'Something went wrong!',
    //             'success'=> false
    //         ]);
    //     } 
    // }
}
