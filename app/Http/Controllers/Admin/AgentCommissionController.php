<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\AgentCommission;
use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

class AgentCommissionController extends Controller
{
    public function agentCommission()
    {
        $agent = Customer::where('status', 'a')->latest()->get();
        foreach($agent as $item){
            $booking_point = Trip::where("customer_id", $item->id)->sum('total_point');
            $point = AgentCommission::where("customer_id", $item->id)->sum('agent_point');
            $item->total_point = !empty($booking_point) ? ($booking_point - $point) : 0;
        }
        $agentCom = AgentCommission::latest()->get();
        return view('admin.agent.agent_commission', compact('agent', 'agentCom'));
    }

    public function agentCommissionStore(Request $request)
    {
        $this->validate($request,[
            'customer_id' => 'required',
            'payment_type' => 'required',
        ]);
        
        try {
        
            $agentCommission = new AgentCommission();
            $agentCommission->customer_id = $request->customer_id;
            $agentCommission->payment_type = $request->payment_type;
            $agentCommission->agent_point = $request->agent_point;
            $agentCommission->amount = $request->amount;
            $agentCommission->date = $request->date;
            $agentCommission->note = $request->note;
            $agentCommission->balance_point = $request->balance_point;
            $agentCommission->ip_address = $request->ip();
            $agentCommission->created_by = Auth::id();
            $agentCommission->save();
           


            $notification=array(
                'message'=>'Agent Commission Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
           dd( $e->getMessage());
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function agentCommissionEdit($id)
    {
        $agent = Customer::where('status', 'a')->latest()->get();
        foreach($agent as $item){
            $booking_point = Trip::where("customer_id", $item->id)->sum('total_point');
            $point = AgentCommission::where("customer_id", $item->id)->sum('agent_point');
            $item->total_point = !empty($booking_point) ? ($booking_point - $point) : 0;
        }

        $agentCom = AgentCommission::latest()->get();
        $commissionData = AgentCommission::find($id);
        return view('admin.agent.agent_commission', compact('commissionData', 'agentCom', 'agent'));
    }


    public function agentCommissionUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'customer_id' => 'required',
            'payment_type' => 'required',
        ]);
        


        try {
            $agentCommission = AgentCommission::find($id);
            $agentCommission->customer_id = $request->customer_id;
            $agentCommission->payment_type = $request->payment_type;
            $agentCommission->agent_point = $request->agent_point;
            $agentCommission->amount = $request->amount;
            $agentCommission->date = $request->date;
            $agentCommission->note = $request->note;
            $agentCommission->balance_point = $request->balance_point;
            $agentCommission->ip_address = $request->ip();
            $agentCommission->updated_by = Auth::id();
            $agentCommission->update();

            $notification=array(
                'message'=>'Agent Commission Update Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('agentCommission')->with($notification);

        } catch (\Exception $e) {
           dd( $e->getMessage());
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function agentCommissionDelete(Request $request)
    {
        try {
            $agentCommission = AgentCommission::find($request->id);
            if($agentCommission){
                $agentCommission->delete();
            }

            return response()->json([
                'message'=>'Agent Commission Deleted Successfully',
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
