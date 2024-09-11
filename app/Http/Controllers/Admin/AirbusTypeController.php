<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AirbusType;
use Illuminate\Support\Facades\Auth;

class AirbusTypeController extends Controller
{
    public function index()
    {
        $airbusType = AirbusType::latest()->get();
        return view('admin.airbusType.index', compact('airbusType'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
        ]);

        try {
            $airbusType = new AirbusType();
            $airbusType->name = $request->name;
            $airbusType->ip_address = $request->ip();
            $airbusType->created_by = Auth::id();
            $airbusType->status = 'a';
            $airbusType->save();

            $notification=array(
                'message'=>'AirbysType Added Successfully',
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
        $airbusType = AirbusType::latest()->get();
        $airbusTypeData = AirbusType::find($id);
        return view('admin.airbusType.index', compact('airbusType', 'airbusTypeData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
        ]);

        try {
            $airbusType = AirbusType::find($id);
            $airbusType->name = $request->name;
            $airbusType->ip_address = $request->ip();
            $airbusType->updated_by = Auth::id();
            $airbusType->status = 'a';
            $airbusType->save();

            $notification=array(
                'message'=>'TirbysType Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('airbusType.index')->with($notification);

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
            $airbusType = AirbusType::find($request->id);
            if($airbusType){
                $airbusType->delete();
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
