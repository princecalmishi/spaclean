<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home_Care_Bookings;
use Auth;
use App\Models\Riders;
use App\Models\Rider;
use App\Models\Rider_wallets;
use App\Models\Contact;
use App\Models\Privacy;
use App\Models\Rider_wallet_transactions;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RiderController extends Controller
{
    public function __construct() 
    {
        $this->middleware('rider')->except('showLoginForm','showRegistrationForm','login','register');
    }

    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|unique:riders|string|max:255',
            'phone' => 'required|unique:riders|string|max:255',
            'national_id' => 'required|unique:riders|string|max:255',
            'town' => 'required|string|max:255',
            'plate_number' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'rare_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'front_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'good_conduct' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'insurance' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'license' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                     
            'email' => 'required|string|email|unique:riders|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($request->hasFile('rare_image')) {
         
            $rareImageName = time() . '_rare.' . $request->file('rare_image')->getClientOriginalExtension();
            $request->file('rare_image')->move(public_path('storage/images'), $rareImageName);
            $rare_image = $rareImageName;    

        }
        if ($request->hasFile('front_image')) {
         
            $front_imageName = time() . '_front.' . $request->file('front_image')->getClientOriginalExtension();
            $request->file('front_image')->move(public_path('storage/images'), $front_imageName);
            $front_image = $front_imageName;    

        }
        if ($request->hasFile('good_conduct')) {
         
            $good_conductName = time() . '_good_conduct.' . $request->file('good_conduct')->getClientOriginalExtension();
            $request->file('good_conduct')->move(public_path('storage/images'), $good_conductName);
            $good_conduct = $good_conductName;    

        }
        if ($request->hasFile('insurance')) {
         
            $insuranceName = time() . '_insurance.' . $request->file('insurance')->getClientOriginalExtension();
            $request->file('insurance')->move(public_path('storage/images'), $insuranceName);
            $insurance = $insuranceName;    

        }
        if ($request->hasFile('license')) {
         
            $licenseName = time() . '_license.' . $request->file('license')->getClientOriginalExtension();
            $request->file('license')->move(public_path('storage/images'), $licenseName);
            $license = $licenseName;    

        }

        // Create a new rider instance
        $rider = new Rider([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'national_id' => $request->input('national_id'),
            'town' => $request->input('town'),
            'color' => $request->input('color'),
            'plate_number' => $request->input('plate_number'),            
            'rare_image' => $rare_image,
            'front_image' => $front_image,
            'good_conduct' => $good_conduct,
            'insurance' => $insurance,
            'license' => $license,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Save the rider to the database
        $rider->save();

        Rider_wallets::create([
            'rider_id' => $rider->id,
            'balance' => '0',

        ]);


        // Optionally, log in the rider after registration
        Auth::guard('rider')->login($rider);

        // Redirect the rider to a page after successful registration
        return redirect()->route('rider')->with('success', 'Registration successful!');
    }

   
    public function showLoginForm()
    {
        return view('rider.login');
    }

    public function showRegistrationForm ()
    {
        return view('rider.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('rider')->attempt($credentials)) {
            // Authentication passed
            // return redirect()->intended('/rider'); // Redirect to dashboard or desired page
            redirect()->route('rider');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('rider')->logout();
        return redirect('/');
    }
    
    public function index()
    {
        $ridername = Auth::guard('rider')->user()->name;
        $myassign = Home_Care_Bookings::where('status','paid')->orderby('id','DESC')->paginate(5);
        $myassigcount = Home_Care_Bookings::where('status','paid')->count();

        $mydeliveriscount = Home_Care_Bookings::where('status','Delivered')->where('rider',$ridername)->count();
        $completeddeliveris = Home_Care_Bookings::where('status','Delivered')->where('rider',$ridername)->sum('transport_fee');
        
        $pendingdeliveris = Home_Care_Bookings::where('status','!=','Delivered')->where('rider',$ridername)->count();

        return view('rider.index',compact('myassign','myassigcount','mydeliveriscount','completeddeliveris','pendingdeliveris'));
    }

    public function completeriderdelivery()
    {
        $ridername = Auth::guard('rider')->user()->name;

        $myassign = Home_Care_Bookings::where('status','Delivered')->where('rider',$ridername)->orderby('id','DESC')->paginate(10);
        $myassigcount = Home_Care_Bookings::where('status','Delivered')->where('rider',$ridername)->count();
        return view('rider.completedelivery',compact('myassign','myassigcount'));
    }
    public function pendingriderdelivery()
    {
        $ridername = Auth::guard('rider')->user()->name;

        $myassign = Home_Care_Bookings::where('status','!=','Delivered')->where('rider',$ridername)->orderby('id','DESC')->paginate(10);
        $myassigcount = Home_Care_Bookings::where('status','!=','Delivered')->where('rider',$ridername)->count();
        return view('rider.pendingriderdelivery',compact('myassign','myassigcount'));
    }

    public function pickorder($id)
    {
        
        // $ridername = Rider::where('id',$userid)->pluck('name');

        $data = Home_Care_Bookings::find($id);
        $data->rider = Auth::guard('rider')->user()->name;
        $data->status = 'EnRoute';
        $data->save();

        return back()->with('success','Order Picked !');
    }

    public function riderdelivered($id)
    {
        
        // $ridername = Rider::where('id',$userid)->pluck('name');

        $data = Home_Care_Bookings::find($id);
        $data->status = 'Delivered';
        $data->save();

        $riderid = Auth::guard('rider')->user()->id;

        $datafee = Home_Care_Bookings::where('id',$id)->pluck('transport_fee');
        foreach($datafee as $datafee)

        $riderbal = Rider_wallets::where('rider_id',$riderid)->pluck('balance');
        foreach($riderbal as $riderbal)
        $newbal = $datafee/2 + $riderbal;

        DB::table('rider_wallets')->where('rider_id', $riderid)->update(['balance' => $newbal]);

        // $wallet = Rider_wallets::find('rider')


        return back()->with('success','Order Picked !');
    }

    public function transcations()
    {
        $riderid = Auth::guard('rider')->user()->id;

        $data = Rider_wallet_transactions::where('rider_id',$riderid)->orderby('id','DESC')->get();
        $datacount = Rider_wallet_transactions::where('rider_id',$riderid)->count();

        $riderbal = Rider_wallets::where('rider_id',$riderid)->pluck('balance');
        foreach($riderbal as $riderbal)
        return view('rider.ridertransactions',compact('data','datacount','riderbal','riderid'));
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|string|max:255',
            'phone' => 'required|string|max:255',           
        ]);

        $ref= substr(sha1(mt_rand()),17,10); 
        $riderid = Auth::guard('rider')->user()->id;

        $data = new Rider_wallet_transactions;
        $data->amount =  $request->input('amount');
        $data->phone =  $request->input('phone');
        $data->rider_id =  $request->input('id');
        $data->ref_number = $ref;
        $data->type = 'Debit';
        $data->save();

        $riderbal = Rider_wallets::where('rider_id',$riderid)->pluck('balance');
        foreach($riderbal as $riderbal)
        $newbal =$riderbal - $request->input('amount');

        DB::table('rider_wallets')->where('rider_id', $riderid)->update(['balance' => $newbal]);

        return back()->with('success', 'successful!');


        


    }

    public function contactus()
    {
        return view('rider.contact');
    }


    public function privacypolicy()
    {
        $data = Privacy::where('id','1')->pluck('Description');
        foreach($data as $data)
        return view('rider.privacy',compact('data'));

    }


    public function editProfile()
    {
        return view('rider.edit');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('rider')->user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:riders,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return redirect()->route('riderprofileedit')->with('success', 'Profile updated successfully.');
    }


}
