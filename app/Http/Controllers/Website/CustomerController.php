<?php

namespace App\Http\Controllers\Website;

use Carbon\Carbon;
use App\Models\Trip;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AgentCommission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function customerLogin()
    {
    
        if (Auth::guard('customer')->check()) {
             $notification=array(
                'message'=>'You are already login',
                'alert-type'=>'success'
            );

            return redirect()->route('customerDashboard')->with($notification);
        } else {
            return view('pages.customer.login');
        }
    }

    


    public function customerRegister()
    {
        return view('pages.customer.register');
    }

    
    public function myBooking()
    { 
       
        $booking = Booking::where('customer_id', Auth::guard('customer')->user()->id)->latest()->get();
        return view('pages.customer.my_booking', compact('booking'));
    }

    public function travelers()
    {
        return view('pages.customer.travelers');
    }

    public function paymentDetails()
    {
        return view('pages.customer.payment_details');
    }




    public function customerDashboard()
    {
        $ID = Auth::guard('customer')->user()->id;
        $today = today(); 

        if (!Auth::guard('customer')->check()) {
            $notification = array(
                'message' => 'Login First, Then Login',
                'alert-type' => 'success'
            );
            return redirect()->route('customerLogin')->with($notification);
        } else {
            $bookingItem = Booking::where('customer_id', $ID)
                ->whereDate('created_at', '=', $today)
                ->count();
            $bookingItemPending = Booking::where('customer_id', $ID)
                ->where('status', 'p')
                ->whereDate('created_at', '=', $today)
                ->count();
            $bookingItemApproved = Booking::where('customer_id', $ID)
                ->where('status', 'a')
                ->whereDate('created_at', '=', $today)
                ->count();
            $agentPoint = Trip::where('customer_id', $ID)->sum('total_point');
            $location = Location::where('status', 'a')->latest()->get();
            return view('pages.customer.dashboard', compact('location', 'bookingItem', 'bookingItemPending', 'bookingItemApproved', 'agentPoint'));
        }
    }



    public function customerLoginCheck(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $input = $request->all();

        $fieldType = filter_var($request->phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $credentials = array($fieldType => $input['phone'], 'password' => $input['password']);
        $user = Customer::where($fieldType, $input['phone'])->first();
        if ($user && $user->status == 'a' && Auth::guard('customer')->attempt($credentials)) {
            $notification = array(
                'message' => 'Login Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('customerDashboard')->with($notification);
        } else {
            $notification = array(
                'message' => 'Email Or Password Are Wrong.',
                'alert-type' => 'error'
            );

            return redirect()->route('customerLogin')->with($notification);
        }
    }



    // public function customerStore(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|min:3|max:100',
    //         'phone' => 'required|unique:customers|regex:/^01[13-9][\d]{8}$/|min:11',
    //         'password' => 'required|string|same:cpassword|min:1',
    //         'ip_address' => 'max:15'
    //     ]);
        
    //     $otp = rand(1000, 9999);
          
    //     try {
    //         $customer = new Customer();
    //         $code                 = 'C' . $this->generateCode('Customer');
    //         $customer->name          = $request->name;
    //         $customer->phone         = $request->phone;
    //         $customer->email         = $request->email;
    //         $customer->username      = $request->phone;
    //         $customer->nid_number    = $request->nid_number;
    //         $customer->date_of_birth = $request->date_of_birth;
    //         $customer->gender        = $request->gender;
    //         $customer->address       = $request->address;
    //         $customer->password      = Hash::make($request->password);
    //         $customer->ip_address    = $request->ip();
    //         $customer->code          = $code;
    //         $customer->image         = $this->imageUpload($request, 'image', 'uploads/trip');
    //         $customer->status        = 'a';
    //         $customer->save_by       = 0;
    //         $customer->updated_by    = 0;
    //         $customer->save();

    //         $notification=array(
    //             'message'=>'Account Created Successfully',
    //             'alert-type'=>'success'
    //         );
    //        return redirect()->route('customerLogin')->with($notification);
    //     } catch (\Throwable $th) {
    //         $notification=array(
    //             'message'=>'Account created fail!',
    //             'alert-type'=>'error'
    //         );
    //         return back()->with($notification);
    //     }

    // }

    // public function customerUpdate(Request $request, Customer $customer)
    // {

    //     $this->validate($request, [
    //         'name'        => 'required|max:100',
    //         'phone'       => 'required|unique:customers,id|max:11',
    //         'email'       => 'unique:customers,id|max:50',
    //         'ip_address'  => 'max:17'
    //     ]);
    //     // dd($request->all());
    //     $customer = Customer::where('id', auth()->guard('customer')->user()->id)->first();

    //     $Image = $this->imageUpload($request, 'profile_picture', 'uploads/customer');
    //     $code = 'C' . $this->generateCode('Customer');
    //     $customer->name            = $request->name;
    //     $customer->email           = $request->email;
    //     $customer->phone           = $request->phone;
    //     $customer->username        = $request->phone;
    //     $customer->nid_number      = $request->nid_number;
    //     $customer->date_of_birth   = $request->date_of_birth;
    //     $customer->gender          = $request->gender;
    //     $customer->address         = $request->address;
    //     $customer->code            = $code;
    //     $customer->profile_picture = $Image;
    //     $customer->save();
    //     if ($customer) {
    //         $notification=array(
    //             'message'=>'Profile Update Successfully',
    //             'alert-type'=>'success'
    //         );
         
    //         return redirect()->back()->with($notification);
    //     } else {
    //         $notification=array(
    //             'error'=>'Profile Update fail',
    //             'alert-type'=>'error'
    //         );
    //         return back()->with($notification);
    //     }
    // }


    // public function customerPasswordUpdate(Request $request)
    // {


    //     $request->validate([
    //         'currentPass' => 'required',
    //         'phone'       => 'required',
    //         'password'    => 'required|min:1|same:cpassword',
    //     ]);
    //     // dd($request->all());
    //     $currentPassword = Auth::guard('customer')->user()->password;
    //     $cueerntPhone = Auth::guard('customer')->user()->phone;
    //     if (Hash::check($request->currentPass, $currentPassword)) {
    //         if (!Hash::check($request->password, $currentPassword)) {
    //             $customer = Customer::find(Auth::guard('customer')->id());
    //             $customer->password = HasH::make($request->password);
    //             $customer->save();
    //             if ($customer) {
    //                 $notification=array(
    //                     'message'=>'Password Update Successfully',
    //                     'alert-type'=>'success'
    //                 );
    //                 return back()->with($notification);
    //             } else {
    //                 $notification=array(
    //                     'message'=>'Current password not match',
    //                     'alert-type'=>'error'
    //                 );
    //                 return back()->with($notification);
    //             }
    //         } else {
    //             $notification=array(
    //                 'message'=>'Same as Current password',
    //                 'alert-type'=>'error'
    //             );
    //             return back()->with($notification);
    //         }
    //     } else {
    //         $notification=array(
    //             'message'=>'Current password not match !',
    //             'alert-type'=>'error'
    //         );
    //         return back()->with($notification);
    //     }
    // }

    public function customerPasswordUpdate(Request $request)
{
    $request->validate([
        'currentPass'  => 'required',
        'currentPhone' => 'required',
        'password'     => 'required|min:1|same:cpassword',
    ]);

    $currentPassword = Auth::guard('customer')->user()->password;
    $currentPhone = Auth::guard('customer')->user()->phone;

    if (Hash::check($request->currentPass, $currentPassword) && $request->currentPhone == $currentPhone) {
        if (!Hash::check($request->password, $currentPassword)) {
            $customer = Customer::find(Auth::guard('customer')->id());
            $customer->password = Hash::make($request->password);
            $customer->save();

            if ($customer) {
                $notification = [
                    'message'     => 'Password Update Successfully',
                    'alert-type'  => 'success'
                ];
                return back()->with($notification);
            } else {
                $notification = [
                    'message'     => 'Failed to update password',
                    'alert-type'  => 'error'
                ];
                return back()->with($notification);
            }
        } else {
            $notification = [
                'message'     => 'New password should be different from the current password',
                'alert-type'  => 'error'
            ];
            return back()->with($notification);
        }
    } else {
        $notification = [
            'message'     => 'Current password or phone number does not match!',
            'alert-type'  => 'error'
        ];
        return back()->with($notification);
    }
}


    public function logout()
    {
        Auth::guard('customer')->logout();

        $notification=array(
            'message'=>'Logout Successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('home')->with($notification);
    }


    // agent entry



    public function addAgent()
    {
        $agent = Customer::latest()->get();
        return view('admin.agent.index', compact('agent'));
    }

    public function agentList()
    {
        $agent = Customer::latest()->get();
        return view('admin.agent.agent_list', compact('agent'));
    }

    public function agentDueList()
    {
        $agent = Customer::where('status', 'a')->with('trip', 'agentCommission')->latest()->get();
        // $trip_tottal 
        // dd($agent);
     
        return view('admin.agent.due_list', compact('agent'));
    }

    public function storeAgent(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'phone' => 'required|unique:customers|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'password' => 'required|string|same:cpassword|min:1',
            'ip_address' => 'max:15'
        ]);
        
        $otp = rand(1000, 9999);
        // dd($request->all());
          
        try {
            $agent = new Customer();
            $code                 = $this->generateCode('Customer');
            $agent->name          = $request->name;
            $agent->phone         = $request->phone;
            $agent->email         = $request->email;
            $agent->username      = $request->username;
            $agent->nid_number    = $request->nid_number;
            $agent->gender        = $request->gender;
            $agent->date_of_birth = $request->date_of_birth;
            $agent->address       = $request->address;
            $agent->agent_point   = $request->agent_point;
            $agent->password      = Hash::make($request->password);
            $agent->ip_address    = $request->ip();
            $agent->code          = $code;
            $agent->profile_picture         = $this->imageUpload($request, 'profile_picture', 'uploads/trip');
            $agent->status        = 'a';
            $agent->save_by       = 0;
            $agent->updated_by    = 0;
            $agent->save();

            $notification=array(
                'message'=>'Account Created Successfully',
                'alert-type'=>'success'
            );
           return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            $notification=array(
                'message'=>'Account created fail!',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }

    }


    public function editAgent($id)
    {
        $agent = Customer::latest()->get();
        $agentata = Customer::find($id);
        return view('admin.agent.index', compact('agent', 'agentata'));
    }

    public function updateAgent(Request $request, $id)
    {

        $this->validate($request, [
            'name'        => 'required|max:100',
            'phone'       => 'required|unique:customers,id|min:11',
            'email'       => 'unique:customers,id|max:50',
            'ip_address'  => 'max:17'
        ]);
        // dd($request->all());
        $agent = Customer::where('id', auth()->guard('customer')->user()->id)->find($id);

          $agentImg = $agent->profile_picture;
            if ($request->hasFile('profile_picture')) {
                if(!empty($agent->profile_picture) && file_exists($agent->profile_picture))
                unlink($agent->profile_picture);
                $agentImg = $this->imageUpload($request, 'profile_picture', 'uploads/customer');
            }

        $code                   = $this->generateCode('Customer');
        $agent->name            = $request->name;
        $agent->email           = $request->email;
        $agent->phone           = $request->phone;
        $agent->username        = $request->phone;
        $agent->nid_number      = $request->nid_number;
        $agent->date_of_birth   = $request->date_of_birth;
        $agent->gender          = $request->gender;
        $agent->address         = $request->address;
        $agent->agent_point     = $request->agent_point;
        $agent->code            = $code;
        $agent->profile_picture = $agentImg;
        $agent->save();
        if ($agent) {
            $notification=array(
                'message'=>'Profile Update Successfully',
                'alert-type'=>'success'
            );
         
            return redirect()->back()->with($notification);
        } else {
            $notification=array(
                'error'=>'Profile Update fail',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }

    }

    public function  deleteAgent(Request $request){
        try {
            $agent = Customer::find($request->id);
            if($agent){
                if(file_exists($agent->image) AND !empty($agent->image)){
                    unlink($agent->image);
                }
                $agent->delete();
            }
            return response()->json([
                'message'=>'Agent Deleted Successfully',
                'success'=> true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Something went wrong!',
                'success'=> false
            ]);
        } 
    }



    public function inactive($id)
    {
        $agent = Customer::find($id);
        $agent->status = 'd';
        $agent->save();

        $notification=array(
            'message'=>'Slider Inactive Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function active($id)
    {
        $agent = Customer::find($id);
        $agent->status = 'a';
        $agent->save();

        $notification=array(
            'message'=>'Slider Active Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function getAgent()
    {
        $clauses = "";
        $agent = DB::select("
            select
                c.*,
                t.total_point,
                ac.agent_point
            from customers c
            left join trips t on t.customer_id = c.id
            left join agent_commissions ac on ac.customer_id = c.id
            where c.status = 'a'
            $clauses
        ");

        return response()->json($agent);
    }


  
}
