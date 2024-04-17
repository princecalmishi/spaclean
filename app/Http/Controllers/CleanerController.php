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
use App\Models\Bookings;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class CleanerController extends Controller
{
    //
    public function __construct() 
    {
        $this->middleware('cleaners');
    }

    public function dashboard()
    {
        $cleanerid = Auth::user()->id;
        $data = Bookings::where('status','paid')->where('personnel_id',$cleanerid)->orderby('id','DESC')->limit(5);
        $datacount = Bookings::where('status','paid')->where('personnel_id',$cleanerid)->count();
        $datapend = Bookings::where('status','!=','paid')->where('personnel_id',$cleanerid)->count();
        $datasum = Bookings::where('status','paid')->where('personnel_id',$cleanerid)->sum('amount');
        return view('cleaner.index',compact('data','datacount','datasum','datapend'));
    }

    public function completed()
    {
        $cleanerid = Auth::user()->id;

        $data = Bookings::where('status','paid')->where('personnel_id',$cleanerid)->orderby('id','DESC')->paginate(20);
        $datacount = Bookings::where('status','paid')->where('personnel_id',$cleanerid)->count();

        // $datapend = Bookings::where('status','!=','paid')->where('personnel_id',$cleanerid)->count();
        // $datasum = Bookings::where('status','paid')->where('personnel_id',$cleanerid)->sum('amount');

        return view('cleaner.completed',compact('data','datacount'));
    }

    public function pending()
    {
        $cleanerid = Auth::user()->id;

        $data = Bookings::where('status','!=','paid')->where('personnel_id',$cleanerid)->orderby('id','DESC')->paginate(20);
        $datacount = Bookings::where('status','!=','paid')->where('personnel_id',$cleanerid)->count();

        // $datapend = Bookings::where('status','!=','paid')->where('personnel_id',$cleanerid)->count();
        // $datasum = Bookings::where('status','paid')->where('personnel_id',$cleanerid)->sum('amount');

        return view('cleaner.pending',compact('data','datacount'));
    }









}
