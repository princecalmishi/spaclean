<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car_Sales;
use App\Models\Home_Care_Services;
use App\Models\Network_Profiles;
use App\Models\Car_Wash;
use App\Models\Hybrid_packages;
use App\Models\User;
use App\Models\Categories;
use App\Models\Car_Wash_Personnel;
use App\Models\Home_Care_Bookings;
use App\Models\Hybrid_packages_services;
use App\Models\Category_services;
use App\Models\Bookings;
use App\Models\Connection;
use App\Models\Barzars;
use App\Models\Contact;
use App\Models\Bazaar_subscriptions;
use App\Models\Bazaar_package;
use App\Models\Network__experiences;
use App\Models\Vehicle_makes;
use App\Models\Vehicle_models;
use App\Models\Privacy;
use App\Models\Services;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Slides;
use App\Models\CarInquiries;
use App\Models\HomeCareServices;

use AUth;
use DB;
use Session;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() 
    {
        $this->middleware('auth')->except('postcontact','welcome','carsales','homecares',
        'allcarbarzars','mybazar','bazardetails','carinquiry');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function allcarbarzars()
    {
        $data = Barzars::where('status','Approved')->orderby('id','DESC')->get();
        return view('allcarbarzars')->with('data', $data);
    }

    public function viewbazar($id)
    {
        $datanam = Barzars::find($id);
        $dataname = $datanam->Barzar_name;
        // dd($dataname);
        $data = Car_sales::where('barzar_id', $id)->orderby('id','DESC')->get();
        $datacount = Car_sales::where('barzar_id', $id)->count();
        return view('viewbazar')->with('data', $data)->with('dataname', $dataname)->with('datacount', $datacount);
    }

    public function bazarcardetail($id)
    {
        $data = Car_sales::find($id);
        $more = Car_sales::all()->random(4);
        return view('bazarcardetail')->with('data', $data)->with('more', $more);
    }

    public function homecareallservices()
    {
        $data = HomeCareServices::orderBy('id', 'DESC')->get();
        return view('homecareservices')->with('data', $data);
    }

    public function carinquiry($id)
    {
        $related = Car_Sales::orderby('id','DESC')->get();
        $data = Car_Sales::find($id);
        return view('carenquiry')->with('data', $data)->with('related', $related);
    }

    public function carinquirypost(Request $request)
    {
        $this->validate($request,[
            'car_id' => 'required',
            
        ]);

        $post = new CarInquiries;
        $userid = Auth()->user()->id;
        $post->user_id = $userid;
        $carid = $request->input('car_id');

        $post->car_id = $carid;

        $model = DB::table('car_sales')->where('id', $carid)->pluck('model');   
        $brand = DB::table('car_sales')->where('id', $carid)->pluck('brand');   
        $price = DB::table('car_sales')->where('id', $carid)->pluck('price');   
        $modelyear = DB::table('car_sales')->where('id', $carid)->pluck('modelyear');  
        $usermail = DB::table('users')->where('id', $userid)->pluck('email');  
        
        foreach($model as $model);
        foreach($brand as $brand);
        foreach($price as $price);
        foreach($modelyear as $modelyear);
        foreach($usermail as $usermail);


        $post->model = $model;
        $post->brand = $brand;
        $post->price = $price;
        $post->modelyear = $modelyear;
        $post->user_email = $usermail;



        $post->save();

        return back()->with('success', 'Inquiry sent successfully');


    }

    public function homecarsales()
    {
        $datar = Car_Sales::where('status', 'Selling')->orderby('id','DESC')->paginate(12);
        return view('homecarsales')->with('datar', $datar);
    }

     public function welcome()
     {

        $data = Services::all();
       
        $datax = DB::table('category_services')->where('service_category', 'Bronze')->get();   
        $datasilver = DB::table('category_services')->where('service_category', 'SILVER')->get();   
        $datagold = DB::table('category_services')->where('service_category', 'GOLD')->get();   
        $dataplatz = DB::table('category_services')->where('service_category', 'PLATINUM')->get();
        $categpacks =  Categories::all();
        
        // prices
        $bronzepricesaloon = DB::table('categories')->where('name', 'Bronze')->pluck('saloon_price');   
        $bronzepricesuv = DB::table('categories')->where('name', 'Bronze')->pluck('suv_price');  

        $silverpricesaloon = DB::table('categories')->where('name', 'SILVER')->pluck('saloon_price');   
        $silverpricesuv = DB::table('categories')->where('name', 'SILVER')->pluck('suv_price');

        $goldpricesaloon = DB::table('categories')->where('name', 'GOLD')->pluck('saloon_price');   
        $goldpricesuv = DB::table('categories')->where('name', 'GOLD')->pluck('suv_price');   

        $platzpricesaloon = DB::table('categories')->where('name', 'PLATINUM')->pluck('saloon_price'); 
        $platzpricesuv = DB::table('categories')->where('name', 'PLATINUM')->pluck('suv_price'); 

        foreach ($bronzepricesaloon as $bronzepricesaloon);
        foreach ($bronzepricesuv as $bronzepricesuv);
        foreach ($silverpricesaloon as $silverpricesaloon);
        foreach ($silverpricesuv as $silverpricesuv);
        foreach ($goldpricesaloon as $goldpricesaloon);
        foreach ($goldpricesuv as $goldpricesuv);
        foreach ($platzpricesaloon as $platzpricesaloon);
        foreach ($platzpricesuv as $platzpricesuv);

        // sliders
        $dataslides = Slides::all();

        return view('welcome')->with('data', $data)->with('datax', $datax)->with('datasilver', $datasilver)->with('datagold', $datagold)->with('dataplatz', $dataplatz)
        ->with('bronzepricesaloon', $bronzepricesaloon)->with('bronzepricesuv', $bronzepricesuv)
        ->with('silverpricesaloon', $silverpricesaloon)->with('silverpricesuv', $silverpricesuv)
        ->with('goldpricesaloon', $goldpricesaloon)->with('goldpricesuv', $goldpricesuv)
        ->with('platzpricesaloon', $platzpricesaloon)->with('platzpricesuv', $platzpricesuv)

        ->with('categpacks', $categpacks)->with('dataslides', $dataslides);
     }

     public function edituserprofileview()
     {
         $user = Auth::user();
         return view('profile.edit', compact('user'));
     }
 
     public function updateuserprofileview(Request $request)
     {
         $user = Auth::user();
 
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => [
                 'required',
                 'string',
                 'email',
                 'max:255',
                 Rule::unique('users')->ignore($user->id),
             ],
             'password' => 'nullable|string|min:8|confirmed',
             'phone' => 'nullable|string|max:20',
         ]);
 
         $user->name = $request->name;
         $user->email = $request->email;
         $user->phone = $request->phone;
 
         if ($request->filled('password')) {
             $user->password = Hash::make($request->password);
         }
 
         $user->save();
 
         return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
     }
    
     public function index()
    {
        $id = Auth::id();

        $myclicks = Connection::where('sender_id', $id)->pluck('receiver_id');

        $newmarkdatax = Car_Sales::orderby('id','DESC')->paginate(4);
        // $netsuggest1 = Network_Profiles::orderby('id','DESC')->paginate(4);
        $netsuggestx = Network_profiles::whereNotIn('user_id', $myclicks)->select('*')->where('user_id', '!=', auth()->id())->orderBy('id', 'DESC')->paginate(4);    
        $datacount = Network_profiles::whereNotIn('user_id', $myclicks)->select('*')->where('user_id', '!=', auth()->id())->count();    

        $carbookingscount = Bookings::where('userid',$id)->count();
        $homecarebookingscount = Home_Care_Bookings::where('userid',$id)->count();
        $carcount = Car_Sales::where('user_id',$id)->count();
        $conn = Connection::where('sender_id',$id)->orWhere('receiver_id',$id)->count();



        return view('home')->with('newmarkdatax',$newmarkdatax)->with('netsuggestx',$netsuggestx)->with('datacount',$datacount)
        ->with('carbookingscount',$carbookingscount)->with('homecarebookingscount',$homecarebookingscount)->with('carcount',$carcount)
        ->with('conn',$conn)
        ;
    }

    public function homecare()
    {
        $data = Home_Care_Services::orderby('id','DESC')->get();
        
        return view('homecare')->with('data',$data);
    }

    public function homecaredetails($id)
    {
        $data = Home_Care_Services::where('id',$id)->get();
        
        return view('homecaredetails')->with('data',$data);
    }

    public function bookhomecare($id)
    {
        $dataamount = Home_Care_Services::where('id',$id)->pluck('price');
        foreach($dataamount as $dataamount);

        $dataamounttotal = $dataamount;

        $carwash = Car_Wash::orderby('id','DESC')->get();
        return view('bookhomecare')->with('carwash',$carwash)->with('dataamount',$dataamount)->with('dataamounttotal',$dataamounttotal);
    }

    public function gethomecarePersonnel(Request $request)
    {
        $carWashId = $request->input('carWashId');
        $personnel = Car_Wash_Personnel::where('carwash', $carWashId)->get();

        return response()->json($personnel);
    }
 
    
    public function createhomeservice(Request $request)
    {     
        
        $this->validate($request,[
           
            'item_name' => 'required',
            'itemsize' => 'required',
            'itemcolour' => 'required',
            'pickupdate' => 'required',
            'pickuptime' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'carWashSelect' => 'required',
            'personnelSelect' => 'required',
            'mylatitude' => 'required',
            'mylongitude' => 'required',
            'paymethod' => 'required',
            'subtotal' => 'required',
            'transportfee' => 'required',
            'cover_image' => 'required',
            'cover_image' => 'image|max:1999',

        ]);

        if($request->hasFile('cover_image')){
            //get filename with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            //get ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            //uplod image
            $path = $request->file('cover_image')->storeAs('/public/images/', $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.png';
        }

        $ref= substr(sha1(mt_rand()),17,10); 
        Session::put('ref', $ref);
         
        $name = Auth()->user()->name;
        $mail = Auth()->user()->email;
        $usrid = Auth()->user()->id;            
      
        $post = new Home_Care_Bookings;       
       
        $post->ref_number = $ref;
        $post->userid = Auth::user()->id;
        $post->personnel_id = $request->input('personnelSelect');
        $post->name =$request->input('item_name');
        $post->size = $request->input('itemsize');
        $post->colour = $request->input('itemcolour');
        $post->pickupdate	= $request->input('pickupdate');
        $post->contact_name	= $request->input('contact_name');
        $post->contact_phone = $request->input('contact_phone');
        $post->latitude	= $request->input('mylatitude');
        $post->longitude = $request->input('mylongitude');
        $post->Payment_method = $request->input('paymethod');
        $post->amount = $request->input('subtotal');
        $post->transport_fee = $request->input('transportfee');
        $post->pickuptime = $request->input('pickuptime');
        // $post->transport_fee = '0';
        $post->image= $fileNameToStore;

        $post->save();

        $completepaynow = $this->completepaynow($ref);


        return redirect()->route('paynow')->with('danger', 'Booking made successfully !, Proceed to make payment now !');


    }

    public function completepaynow()
    {
        
        $ref = Session::get('ref');

        $dataamount = Home_Care_Bookings::where('ref_number',$ref)->pluck('amount');
        $datauserid = Home_Care_Bookings::where('ref_number',$ref)->pluck('userid');
        $dataid = Home_Care_Bookings::where('ref_number',$ref)->pluck('id');

        foreach($dataamount as $dataamount);
        foreach($datauserid as $datauserid);
        foreach($dataid as $dataid);

        return view ('paynow')->with('dataid',$dataid)->with('dataamount',$dataamount)
        ->with('dataamount',$dataamount)->with('ref',$ref);

    }
    // pay for pending data
    public function payfromrecords($id)
    {
        
        $ref = Home_Care_Bookings::where('id',$id)->pluck('ref_number');
        foreach($ref as $ref);

        $dataamount = Home_Care_Bookings::where('ref_number',$ref)->pluck('amount');
        $datauserid = Home_Care_Bookings::where('ref_number',$ref)->pluck('userid');
        $dataid = Home_Care_Bookings::where('ref_number',$ref)->pluck('id');

        foreach($dataamount as $dataamount);
        foreach($datauserid as $datauserid);
        foreach($dataid as $dataid);

        return view ('paynow')->with('dataid',$dataid)->with('dataamount',$dataamount)
        ->with('dataamount',$dataamount)->with('ref',$ref);

    }

    public function carbookpayfromrecords($id)
    {
        
        $ref = Bookings::where('id',$id)->pluck('ref_number');
        foreach($ref as $ref);

        $dataamount = Bookings::where('ref_number',$ref)->pluck('amount');
        $datauserid = Bookings::where('ref_number',$ref)->pluck('userid');
        $dataid = Bookings::where('ref_number',$ref)->pluck('id');

        foreach($dataamount as $dataamount);
        foreach($datauserid as $datauserid);
        foreach($dataid as $dataid);

        return view ('paynow')->with('dataid',$dataid)->with('dataamount',$dataamount)
        ->with('dataamount',$dataamount)->with('ref',$ref);

    }


    public function paynowgo(Request $request){
        
        $request->validate([
           // 'userid' => 'required',
           'myphone' => 'required',
           'amount' => 'required',
           'ref' => 'required',
       ]);
       
       $phone = $request->input('myphone');   
       $amt1 = $request->input('amount');  
       $ref = $request->input('ref');  
       $source = $request->input('source');  
        $amt = (round($amt1,0));

        $id = Auth::id();
 
            $numbers = explode("\n", str_replace("\r", "", $phone));
           foreach ($numbers as $number) {
               $msisdn = preg_replace('/^(?:\254|27|0)?/','254', $number);
           }  
       
       date_default_timezone_set('Africa/Nairobi');

         # access token
         $consumerKey = 'hA5UEN10nMtnqpH199DIwgxLaI2fOcR0'; //Fill with your app Consumer Key
         $consumerSecret = 'EUySzGS2zeDCkAA4'; // Fill with your app Secret
       
         # define the variales
         # provide the following details, this part is found on your test credentials on the developer account
         $BusinessShortCode = '4092323';
         $Passkey = 'c38a3c455c7f8db56d2dd1683d35b31b8571cafba9be348cbb7b621c991224f5';  
         
         /*
           This are your info, for
           $PartyA should be the ACTUAL clients phone number or your phone number, format 2547********
           $AccountRefference, it maybe invoice number, account number etc on production systems, but for test just put anything
           TransactionDesc can be anything, probably a better description of or the transaction
           $Amount this is the total invoiced amount, Any amount here will be 
           actually deducted from a clients side/your test phone number once the PIN has been entered to authorize the transaction. 
           for developer/test accounts, this money will be reversed automatically by midnight.
         */
         
         $PartyA = $msisdn; // This is your phone number, 
         $AccountReference = $id;
         $TransactionDesc = 'eeee';
         $Amount = $amt;
        
         # Get the timestamp, format YYYYmmddhms -> 20181004151020
         $Timestamp = date('YmdHis');    
         
         # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
         $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
       
         # header for access token
         $headers = ['Content-Type:application/json; charset=utf8'];
       
           # M-PESA endpoint urls
         $access_token_url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
         $initiate_url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        
         
         
         $redirectUrl = 'https://sifahaven.com/public/callback_url.php';
       
              $age = array("id"=>$id,"ref"=>$ref,"source"=>$source);
       
               // echo json_encode($age);
       
              
               $CallBackURL = $redirectUrl . '?' . http_build_query($age);
               
               
               
         # callback url
       //   $CallBackURL = 'https://digitalafrica.co.ke/mpesa/callback_url.php'; 
               
               
       
         $curl = curl_init($access_token_url);
         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
         curl_setopt($curl, CURLOPT_HEADER, FALSE);
         curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
         $result = curl_exec($curl);
         $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
         $result = json_decode($result);
         $access_token = $result->access_token;  
         curl_close($curl);
       
         # header for stk push
         $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
       
         # initiating the transaction
         $curl = curl_init();
         curl_setopt($curl, CURLOPT_URL, $initiate_url);
         curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header
       
         $curl_post_data = array(
           //Fill in the request parameters with valid values
           'BusinessShortCode' => $BusinessShortCode,
           'Password' => $Password,
           'Timestamp' => $Timestamp,
           'TransactionType' => 'CustomerPayBillOnline',
           'Amount' => $Amount,
           'PartyA' => $PartyA,
           'PartyB' => $BusinessShortCode,
           'PhoneNumber' => $PartyA,
           'CallBackURL' => $CallBackURL,
           'AccountReference' => $AccountReference,
           'TransactionDesc' => $TransactionDesc
         );
       
         $data_string = json_encode($curl_post_data);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($curl, CURLOPT_POST, true);
         curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
         $curl_response = curl_exec($curl);
       //  print_r($curl_response);
       
       //   echo $curl_response;
       
         sleep(20);

         if($source == 'homecare'){
            return redirect()->route('checkpayment')->with('success','Payment Request Sent'); 

         }elseif($source == 'carwash'){
            return redirect()->route('checkcarwashpay')->with('success','Payment Request Sent'); 

         }elseif($source == 'bazaar'){
            return redirect()->route('checkbazarpay')->with('success','Payment Request Sent'); 

         }


        
       
   }

 
   public function checkpayment()

    {
        $paymentmethod = Home_Care_Bookings::where('userid', Auth()->user()->id)->orderby('id','DESC')->get();


        $ref = Session::get('ref');

        $id = Auth::id();
        $data = DB::table('mpesa_transactions')->where('ref_number', $ref)->count();
        $datacode = DB::table('mpesa_transactions')->where('ref_number', $ref)->get();
           
         if($data >= 1){   
            DB::table('home_care_bookings')->where('ref_number', $ref)->update(['status' => 'paid']);
            
            
            return view('homebookingrecords')->with('paymentmethod','$paymentmethod')->with('success', 'Payment Success !');

        }
                                    
        else{
            // dd('empty ' .$ref);
             return redirect()->back()->with('error', 'We have not received your payment, kindly try again !');
             

        }
        
    }

    public function checkbazarpay()
    {
        $ref = Session::get('bazarcheckoutref');

        // $paymentmethod = Bazaar_subscriptions::where('ref_number',$ref)->get();

        $now = Carbon::now();
        //dd($ref);

        $id = Auth::id();
        $data = DB::table('mpesa_transactions')->where('ref_number', $ref)->count();
        $datacode = DB::table('mpesa_transactions')->where('ref_number', $ref)->get();
           
        if($data >= 1){   
            DB::table('Bazaar_subscriptions')->where('ref_number', $ref)->update(['status' => 'active','glory_date' => $now]);
            
            
            return redirect()->route('mybazar')->with('success', 'Payment Success !');

        }
                                    
        else{
            // dd('empty ' .$ref);
             return redirect()->back()->with('error', 'We have not received your payment, kindly try again !');
             

        }
        
    }

    public function checkcarwashpay()
    {
        $ref = Session::get('carwashref');

        $id = Auth::id();
        $data = DB::table('mpesa_transactions')->where('ref_number', $ref)->count();
        $datacode = DB::table('mpesa_transactions')->where('ref_number', $ref)->get();
           
         if($data >= 1){   
            DB::table('bookings')->where('ref_number', $ref)->update(['status' => 'booked']);
            
            
            return redirect()->route('carbookings')->with('success', 'Payment Success !');

        }
                                    
        else{
            // dd('empty ' .$ref);
             return redirect()->back()->with('error', 'We have not received your payment, kindly try again !');
             

        }
        
    }

    public function bookingrecords()
    {
        $data = Home_Care_Bookings::where('userid', Auth()->user()->id)->orderby('id','DESC')->get();

        return view('homebookingrecords')->with('data',$data);

    }

    
    public function market()
    {
        $data = Car_Sales::orderby('id','DESC')->paginate('9');
        return view('market')->with('data',$data);
    }

     
    public function cardetail($id)
    {
        $data = Car_Sales::find($id);

        $carname = Car_Sales::where('id',$id)->pluck('model');
        $carbrand = Car_Sales::where('id',$id)->pluck('brand');
        $carprice = Car_Sales::where('id',$id)->pluck('price');
        $carpricetype = Car_Sales::where('id',$id)->pluck('price_type');
        $Fuel = Car_Sales::where('id',$id)->pluck('Fuel');
        $Mileage = Car_Sales::where('id',$id)->pluck('Mileage');
        $CC = Car_Sales::where('id',$id)->pluck('CC');
        $description = Car_Sales::where('id',$id)->pluck('description');
        $modelyear = Car_Sales::where('id',$id)->pluck('modelyear');
        $Colour = Car_Sales::where('id',$id)->pluck('Colour');
        $Gear = Car_Sales::where('id',$id)->pluck('Gear');
        $cover1 = Car_Sales::where('id',$id)->pluck('cover_image');
        $cover2 = Car_Sales::where('id',$id)->pluck('cover_image2');

        $userid = Car_Sales::where('id',$id)->pluck('user_id');
        foreach($userid as $userid);
        $sellername = User::where('id',$userid)->pluck('name');
        $sellerphone = User::where('id',$userid)->pluck('phone');
        foreach($sellername as $sellername);
        foreach($sellerphone as $sellerphone);



        foreach($carname as $carname);
        foreach($carbrand as $carbrand);
        foreach($carprice as $carprice);
        foreach($carpricetype as $carpricetype);
        foreach($Fuel as $Fuel);
        foreach($Mileage as $Mileage);
        foreach($CC as $CC);
        foreach($description as $description);
        foreach($modelyear as $modelyear);
        foreach($Colour as $Colour);
        foreach($Gear as $Gear);
        foreach($cover1 as $cover1);
        foreach($cover2 as $cover2);

        return view('cardetail')->with('carname',$carname)->with('carbrand',$carbrand)->with('carprice',$carprice)
        ->with('carpricetype',$carpricetype)->with('Fuel',$Fuel)->with('Mileage',$Mileage)->with('CC',$CC)
        ->with('description',$description)->with('modelyear',$modelyear)->with('Colour',$Colour)->with('Gear',$Gear)
        ->with('cover1',$cover1)->with('cover2',$cover2)->with('sellername',$sellername)->with('sellerphone',$sellerphone)
        ;
    }

    public function carbookings()
    {
        $data = Categories::orderby('id','DESC')->get();
        

        return view('carbooking')->with('data',$data);
    }
    

    public function mypackages()
    {
        $data = Hybrid_packages::where('user_id',Auth()->user()->id)->get();
        $datacount = Hybrid_packages::where('user_id',Auth()->user()->id)->count();

        $packname = Hybrid_packages::where('user_id',Auth()->user()->id)->pluck('name');  
        
        // $hps = Hybrid_packages_services::where('')

        $categoryserv = Category_services::whereStatus('Active')->orderby('id','DESC')->get();

        return view('mypackage')->with('data',$data)->with('datacount',$datacount)
        ->with('categoryserv',$categoryserv); 
    }

    public function createbazar()
    {

        return view('newcarbazar');
    }

    public function postbazar(Request $request)
    {

        $this->validate($request,[
           
           
            'bazarname' => 'required',
            'location' => 'required',
            'contact' => 'required',
            'cover_image' => 'image|max:1999',

        ]);

        if($request->hasFile('cover_image')){
            //get filename with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            //get ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            //uplod image
            $path = $request->file('cover_image')->storeAs('/public/images/', $fileNameToStore);

        }
             
        $name = Auth()->user()->name;
        $mail = Auth()->user()->email;
        $usrid = Auth()->user()->id;            
      
        $post = new Barzars;  
        $post->Barzar_owner = Auth::user()->id;
        $post->Barzar_name = $request->input('bazarname');
        $post->location = $request->input('location');
        $post->contact = $request->input('contact');
        $post->image = $fileNameToStore;
        $post->save();

        return back()->with('success','Bazar Created !');

    }


    public function savepackage(Request $request)
    {
        $request->validate([
           
            'packname' => 'required',
            'catservice' => 'required',
        ]);
        
        $catservice = $request->input('catservice');  
        $packname = $request->input('packname');  

        $checkpack = Hybrid_packages::where('name',$packname)->count();
        if($checkpack >= 1){

            return back()->with('error', 'Use a diffrent Package name !');
        }else{
            $hp = new Hybrid_packages;
            $hp->user_id = Auth()->user()->id;
            $hp->name = $packname;
            $hp->save();
    
            foreach ($catservice as $catservice => $id) {

                $catservname = Category_services::where('id',$id)->orderby('id','DESC')->pluck('service_name');
                $catservprice = Category_services::where('id',$id)->orderby('id','DESC')->pluck('price');
                foreach($catservname as $catservname);
                foreach($catservprice as $catservprice);

                $hps = new Hybrid_packages_services;
                $hps->user_id = Auth()->user()->id;
                $hps->service_id = $id;
                $hps->package_name = $packname;
                $hps->service_name = $catservname;
                $hps->fee = $catservprice;
                $hps->save();
                
            }
               return back()->with('success',' Package Create Success !');   
        }

            
        
    }

    public function carbookingcheckout($id)
    {
        
        $carwash = Car_Wash::orderby('id','DESC')->get();
        $bookidname = Categories::where('id',$id)->pluck('name');
        $bookiddatacarselect1 = Categories::where('id',$id)->pluck('saloon_price');
        $bookiddatacarselect2 = Categories::where('id',$id)->pluck('suv_price');

        foreach($bookiddatacarselect1 as $bookiddatacarselect1)
        foreach($bookiddatacarselect2 as $bookiddatacarselect2)
        foreach($bookidname as $bookidname)
        $bookiddata = Categories::where('id',$id)->get();


        $personnel = Car_Wash_Personnel::all();


        return view('carbookingcheckout')->with('carwash',$carwash)->with('bookiddata',$bookiddata)
        ->with('bookiddatacarselect1',$bookiddatacarselect1)->with('bookiddatacarselect2',$bookiddatacarselect2)
        ->with('bookidname',$bookidname)
        ;
    }

    public function getPersonnel(Request $request)
    {
        $carWashId = $request->input('carWashId');
        $personnel = Car_Wash_Personnel::where('carwash', $carWashId)->get();

        return response()->json($personnel);
    }

    public function carbookingreq(Request $request)
    {     
        
        $this->validate($request,[
           
            'package' => 'required',
            'package_type' => 'required',
            'carselection' => 'required',
            'personnelSelect' => 'required',
            'pickupdate' => 'required',
            'pickuptime' => 'required',
            'paymethod' => 'required',
            'totalamount' => 'required',
            

        ]);

       $mt = $request->input('carselection');
        //  dd($mt);

        $ref= substr(sha1(mt_rand()),17,10); 
        Session::put('ref', $ref);
         
        $name = Auth()->user()->name;
        $mail = Auth()->user()->email;
        $usrid = Auth()->user()->id;            
      
        $post = new Bookings;       
       
        $post->ref_number = $ref;
        $post->userid = Auth::user()->id;
        $post->package = $request->input('package');
        $post->package_type =$request->input('package_type');
        $post->amount = $request->input('carselection');
        $post->personnel_id = $request->input('personnelSelect');
        $post->payment_method = $request->input('paymethod');
        $post->pickuptime = $request->input('pickuptime');
        $post->pickupdate = $request->input('pickupdate');
             
        $post->save();
        $completepaynow = $this->completecarbookingpaynow($ref);


        return redirect()->route('paycarbookingnow')->with('danger', 'Booking made successfully !, Proceed to make payment now !');


    }

    
    public function completecarbookingpaynow()
    {
        
        $ref = Session::get('ref');

        $dataamount = Bookings::where('ref_number',$ref)->pluck('amount');
        $datauserid = Bookings::where('ref_number',$ref)->pluck('userid');
        $dataid = Bookings::where('ref_number',$ref)->pluck('id');

        foreach($dataamount as $dataamount);
        foreach($datauserid as $datauserid);
        foreach($dataid as $dataid);

        return view ('paynow')->with('dataid',$dataid)->with('dataamount',$dataamount)
        ->with('dataamount',$dataamount)->with('ref',$ref);

    }

   

    public function mypackcarbookingcheckout($id)
    {
        $dataname = Hybrid_packages::where('id',$id)->pluck('name');
        foreach($dataname as $dataname)
        

        $hbnprice = Hybrid_packages_services::where('package_name',$dataname)->sum('fee');
        // $hbnprice = Hybrid_packages_services::where('id',$id)->sum('fee');

        // dd($hbn);

        $carwash = Car_Wash::orderby('id','DESC')->get();
        $bookidname = Categories::where('id',$id)->pluck('name');
       
        // foreach($hbn as $hbn)
        // foreach($hbnprice as $hbnprice)
        $bookiddata = Categories::where('id',$id)->get();


        $personnel = Car_Wash_Personnel::all();


        return view('mypackcarbookingcheckout')->with('carwash',$carwash)
        ->with('bookidname',$bookidname)->with('dataname',$dataname)->with('hbnprice',$hbnprice)->with('id',$id)
        ;
    }
    public function mypackcarbookingreq(Request $request)
    {     
        
        $this->validate($request,[
           
            'package' => 'required',
            'package_type' => 'required',
            'pickupdate' => 'required',
            'pickuptime' => 'required',
            'paymethod' => 'required',
            'totalamount' => 'required',
            

        ]);

        // Session::put('ref', $ref);
        // $ref = Session::get('ref');


       $mt = $request->input('totalamount');       //   dd($mt);

        $carwashref= substr(sha1(mt_rand()),17,10); 
        Session::put('carwashref', $carwashref);
         
        $name = Auth()->user()->name;
        $mail = Auth()->user()->email;
        $usrid = Auth()->user()->id;            
      
        $post = new Bookings;       
       
        $post->ref_number = $carwashref;
        $post->userid = Auth::user()->id;
        $post->package = $request->input('package');
        $post->package_type =$request->input('package_type');
        $post->amount = $mt;
        $post->personnel_id = $request->input('personnelSelect');
        $post->payment_method = $request->input('paymethod');
        $post->pickuptime = $request->input('pickuptime');
        $post->pickupdate = $request->input('pickupdate');
             
        $post->save();
        $completepaynow = $this->mpesapayforhybrid($carwashref);


        return redirect()->route('hybridsentpay')->with('danger', 'Booking made successfully !, Proceed to make payment now !');


    }


    public function mpesapayforhybrid()
    {
        
        $ref = Session::get('carwashref');

        $dataamount = Bookings::where('ref_number',$ref)->pluck('amount');
        $datauserid = Bookings::where('ref_number',$ref)->pluck('userid');
        $dataid = Bookings::where('ref_number',$ref)->pluck('id');

        foreach($dataamount as $dataamount);
        foreach($datauserid as $datauserid);
        foreach($dataid as $dataid);

        return view ('paynow')->with('dataid',$dataid)->with('dataamount',$dataamount)
        ->with('dataamount',$dataamount)->with('ref',$ref);

    }



    public function networkconnect()
    {
        $id = Auth::id();

        $myclicks = Connection::where('sender_id', $id)->pluck('receiver_id');

        $datacount = Network_profiles::whereNotIn('user_id', $myclicks)->select('*')->where('user_id', '!=', auth()->id())->count();    
        $data = Network_profiles::whereNotIn('user_id', $myclicks)->select('*')->where('user_id', '!=', auth()->id())->orderBy('id', 'DESC')->paginate(9);    
     
        
        $chaeckuserprof = Network_profiles::where('user_id',Auth()->user()->id)->count();

        return view('networkconnect')->with('data',$data)->with('datacount',$datacount)->with('chaeckuserprof',$chaeckuserprof);
    }

    public function connect($id)
    {
           $sender_id = Auth()->user()->id;
           $receiverid = $id;

          

            $connections = Connection::where(function ($query) use ($sender_id, $id) {
                $query->where('sender_id', $sender_id)
                    ->where('receiver_id', $id);
            })
            ->orWhere(function ($query) use ($sender_id, $id) {
                $query->where('sender_id', $id)
                    ->where('receiver_id', $sender_id);
            })
            ->count();
            if($connections >= 1){
                return back()->with('error','Connection already exists !');

            }else{
                $data = new Connection;
                $data->sender_id = $sender_id;
                $data->receiver_id = $id;
                $data->type = 'business';
                $data->save();

                return back()->with('success','Invitation Sent !');
           
            }
           

    }   
    
    public function managenetwork()
    {
        $id = Auth::id();

        $myconn = Connection::where('status','Connected')->where('sender_id', $id)->orWhere('receiver_id', $id)->paginate(9);
        $myconncount = Connection::where('status','Connected')->where('sender_id', $id)->orWhere('receiver_id', $id)->count();


        return view('managenetwork')->with('myconn',$myconn)->with('myconncount',$myconncount)->with('id',$id);
    }

    public function invitations()
    {
        $id = Auth::id();

        $sentinvite = Connection::where('sender_id', $id)->paginate(9);
        $reveivedinvite = Connection::where('receiver_id', $id)->paginate(9);

        $sentinvitecount = Connection::where('sender_id', $id)->count();
        $reveivedinvitecount = Connection::where('receiver_id', $id)->count();

        return view('invitations',compact('sentinvite','reveivedinvite','sentinvitecount','reveivedinvitecount'));
    }

    public function withdraw($id)
    {
        $data = Connection::find($id);
        $data->delete();

        return back()->with('success','Invite Removed !');
    }

    public function udeletehome($id)
    {
        $data = Home_Care_Bookings::find($id);
        $data->delete();

        return back()->with('error','Removed !');
    }

    public function usedeletebooking($id)
    {
        $data = Bookings::find($id);
        $data->delete();

        return back()->with('error','Removed !');
    }

    public function deletebazar($id)
    {
        $data = Barzars::find($id);
        $data->delete();

        return back()->with('error','Bazar Removed !');
    }
    public function deletecar($id)
    {
        $data = Car_Sales::find($id);
        $data->delete();

        return back()->with('success','Car Removed !');
    }

    public function accept($id)
    {
        $data = Connection::find($id);
        $data->status ='Connected';
        $data->save();

        return back()->with('success','Invite Accepted !');
    }

    public function decline($id)
    {
        $data = Connection::find($id);
        $data->delete();

        return back()->with('error','Invite Removed !');
    }

    public function viewprofile($id)
    {
        $data = Network_Profiles::where('user_id',$id)->get();
       return view('viewprofile',compact('data'));
    }

    public function carbazar()
    {
        $data = Barzars::where('status','Approved')->get();
        return view('carbazar',compact('data'));
    }

    public function carbazarlist($id)
    {
        $bazarname = Barzars::where('id',$id)->pluck('Barzar_name');
        foreach($bazarname as $bazarname)

        $data = Car_Sales::where('barzar_id',$id)->orderby('id','DESC')->paginate('9');
        return view('carbazarlist',compact('data','bazarname'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function postcontact(Request $request)
    {
        $this->validate($request,[
           
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
                       

        ]);

         $data = new Contact;
         $data->email = $request->input('email');
         $data->message = $request->input('subject');
         $data->desc = $request->input('message');
         $data->save();

         return back()->with('success','Message sent success !');


    }

    public function myprofile ()
    {
        

        return view('myprofile');
    }

    public function privacy ()
    {

        $data = Privacy::where('id','1')->pluck('Description');
        foreach($data as $data)
        return view('privacy',compact('data'));
    }

    
    public function about ()
    {

        return view('about');
    }
   

    public function updateimages(Request $request)
    {     
        
        $this->validate($request,[
           
           
            'cover_image' => 'image|max:1999',
            'bannerimage' => 'image|max:1999',

        ]);

        if($request->hasFile('cover_image')){
            //get filename with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            //get ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            //uplod image
            $path = $request->file('cover_image')->storeAs('/public/images/', $fileNameToStore);

        }else{
            $fileNameToStore = 'noprofile.PNG';
        }

        if($request->hasFile('bannerimage')){
            //get filename with ext
            $filenameWithExt = $request->file('bannerimage')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            //get ext
            $extension = $request->file('bannerimage')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore2 = $filename .'_'.time().'.'.$extension;
            //uplod image
            $path = $request->file('bannerimage')->storeAs('/public/images/', $fileNameToStore2);

        }else{
            $fileNameToStore = 'nobanner.JPG';
        }
         
        $data = Network_Profiles::where('user_id',Auth()->user()->id)->count();
        $dataprofid = Network_Profiles::where('user_id',Auth()->user()->id)->pluck('id');
        foreach($dataprofid as $dataprofid)

        $userid =Auth()->user()->id;
        $username =Auth()->user()->name;
        $im1 =  $fileNameToStore;
        $im1 =  $fileNameToStore2;

        if($data <1){

            $post = new Network_Profiles;             
            $post->user_id= Auth()->user()->id;
            $post->Name= Auth()->user()->name;
            $post->Profile_image= $fileNameToStore;
            $post->Banner_image= $fileNameToStore2;
        
            $post->save();
            return back()->with('success','Profile updated !');

        
       }else{
        $post = Network_Profiles::find($dataprofid);             
        $post->Profile_image= $fileNameToStore;
        $post->Banner_image= $fileNameToStore2;
        $post->save();

        return back()->with('success','Profile updated !');

       }
       

    }
   
    public function saveprofiles(Request $request)
    {
        $this->validate($request,[
           
           
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'profession' => 'required',
            'location' => 'required',
            'about' => 'required',

        ]);

        $data = Network_Profiles::where('user_id',Auth()->user()->id)->count();
        $dataprofid = Network_Profiles::where('user_id',Auth()->user()->id)->pluck('id');
        foreach($dataprofid as $dataprofid)

        $userid =Auth()->user()->id;
        $username =Auth()->user()->name;

        $user = User::find($userid);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();
       
        if($data <1){
            $fx = new Network_Profiles;
            $fx->Profession = $request->input('profession');
            $fx->user_id = $userid;
            $fx->Name = $request->input('name');
            $fx->Location = $request->input('location');
            $fx->About = $request->input('about');

        }else{

            $fx = Network_Profiles::find($dataprofid);             
            $fx->Profession= $request->input('profession');
            $fx->Name= $request->input('name');
            $fx->Location = $request->input('location');
            $fx->About = $request->input('about');

            $fx->save();
    
            return back()->with('success','Profile updated !');
    

        }

       

        return back()->with('success','Message sent success !');


    }

    public function saveexper(Request $request)
    {
        $this->validate($request,[
           
           
            'work_position' => 'required',
            'Company' => 'required',
            'fromdate' => 'required',
            'todate' => 'required',
            'location' => 'required',
            'description' => 'required',
            'skills' => 'required',
            'education' => 'required',

        ]);

        $userid =Auth()->user()->id;
        $username =Auth()->user()->name;

            $fx = new Network__experiences;
            $fx->user_id = $userid;
            $fx->Work_position = $request->input('work_position');
            $fx->Company = $request->input('Company');
            $fx->From_date = $request->input('fromdate');
            $fx->To_date = $request->input('todate');   
            $fx->Location = $request->input('location');   
            $fx->Description = $request->input('description');   
            $fx->Skills = $request->input('skills');   
            $fx->Education = $request->input('education');   

            $fx->save();
    
       

        return back()->with('success','Data save success !');


    }

    public function mybazar ()
    {
        $data = Barzars::where('Barzar_owner',Auth()->user()->id)->get();
        $datacount = Barzars::where('Barzar_owner',Auth()->user()->id)->count();
        return view('mycarbazar',compact('data','datacount'));
    }

    public function bazardetails($id)
    {
        Session::put('bazarid', $id);
        $now = Carbon::now();
        $data = Barzars::where('id',$id)->get();
        $bazsubs = Bazaar_subscriptions::where('bazaar_id',$id)->orderby('id','DESC')->get();
        $bazsubscount = Bazaar_subscriptions::where('bazaar_id',$id)->count();
        
        $brands = Vehicle_makes::orderby('name')->get();
        $models = Vehicle_models::orderby('make')->get();

        
        return view('bazardetails',compact('data','bazsubs','bazsubscount','id','brands','models','now'));
    }

    public function getcarmodelx($makeId)
    {
        //  dd($selectedOption);
        
        $personnel = Vehicle_models::where('make', $makeId)->get();
        $personnelcount = Vehicle_models::where('make', $makeId)->count();

        // dd($personnelcount);

        return response()->json($personnel);
    }

   
    public function addbazarpack($id)
    {
        $bazarid = Session::get('bazarid');

        $data = Bazaar_package::orderby('id','DESC')->get();
        $datacount = Bazaar_package::count();
        // $bazarid = $id;


        return view('addbazarpack',compact('data','datacount','bazarid'));
    }

    public function checkoutbazarpack($id)
    {
        $bazarid = Session::get('bazarid');

        $bazarcheckoutref= substr(sha1(mt_rand()),17,10); 
        $bazarpack_price = Bazaar_package::where('id',$id)->pluck('amount');
        $bazarpack_cars = Bazaar_package::where('id',$id)->pluck('number_of_cars');
        $bazarpack_period = Bazaar_package::where('id',$id)->pluck('period');
        foreach($bazarpack_price as $bazarpack_price)
        foreach($bazarpack_cars as $bazarpack_cars)
        foreach($bazarpack_period as $bazarpack_period)
        $now = Carbon::now();

        $save = new Bazaar_subscriptions;
        $save->ref_number = $bazarcheckoutref;
        $save->bazaar_id = $bazarid;
        $save->package = $id;
        $save->amount = $bazarpack_price;
        $save->cars	 = $bazarpack_cars;
        $save->glory_date = $now;
        $save->expiry_date = $now->addMonths($bazarpack_period);
        $save->save();

        $packprice = Bazaar_package::where('id',$id)->pluck('amount');
        foreach($packprice as $packprice)
        $packageid = $id;
        // $ref= substr(sha1(mt_rand()),17,10); 
        Session::put('bazarcheckoutref', $bazarcheckoutref);


         
        return view('checkoutbazarpack',compact('packageid','packprice','bazarid','bazarcheckoutref'));

    }

    public function deletepack($id){
        $data = Bazaar_subscriptions::find($id);
        $data->delete();

        return back()->with('success','Package Removed !');


        
    }

    public function adcartobazar($id)
    {
        $bazarid = Session::get('bazarid');
        $bazarsub = Bazaar_subscriptions::where('bazaar_id',$id)->pluck('id');
        $brands = Vehicle_makes::orderby('name')->get();
        $models = Vehicle_models::orderby('make')->get();

        return view('addcartobazar',compact('brands','models','id','bazarid'));
    }

    public function getcarmodel(Request $request)
    {
        $carWashId = $request->input('carWashId');
        $personnel = Vehicle_models::where('make', $carWashId)->get();

        return response()->json($personnel);
    }
  


    public function postaddcartobazar(Request $request)
    {
        $this->validate($request,[
           
            'carbrand' => 'required',
             'carmodel' => 'required',
            'desc' => 'required',
            'modelyear' => 'required',
            'price' => 'required',
            'pricetype' => 'required',
            'location' => 'required',
            'fuel' => 'required',
            'mileage' => 'required',
            'CC' => 'required',
            'colour' => 'required',
            'gear' => 'required',
            'cover_image' => 'image|max:1999',
            'cover_image2' => 'image|max:1999',
            

        ]);

        if($request->hasFile('cover_image')){
            //get filename with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            //get ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            //uplod image
            $path = $request->file('cover_image')->storeAs('/public/images/', $fileNameToStore);

        }  
        if($request->hasFile('cover_image2')){
            //get filename with ext
            $filenameWithExt = $request->file('cover_image2')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            //get ext
            $extension = $request->file('cover_image2')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore2 = $filename .'_'.time().'.'.$extension;
            //uplod image
            $path = $request->file('cover_image2')->storeAs('/public/images/', $fileNameToStore2);

        }

        $bazid = $request->input('bazid');
        $subid = $request->input('subid');
        $getname =  $request->input('carbrand');
        $brand = Vehicle_makes::where('makeid',$getname)->pluck('name');
        foreach($brand as $brand)

        $mt = new Car_Sales;
       $mt->user_id = Auth()->user()->id;
       $mt->brand = $brand;
       $mt->model = $request->input('carmodel');
       $mt->description = $request->input('desc');
       $mt->modelyear = $request->input('modelyear');
       $mt->price = $request->input('price');
       $mt->price_type = $request->input('pricetype');
       $mt->Location = $request->input('location');
       $mt->Fuel = $request->input('fuel');
       $mt->Mileage = $request->input('mileage');
       $mt->CC = $request->input('CC');
       $mt->Colour = $request->input('colour');
       $mt->Gear = $request->input('gear');
       $mt->cover_image = $fileNameToStore;
       $mt->cover_image2 = $fileNameToStore2;
       $mt->barzar_id = $bazid;
       $mt->subscription_id = $subid;

       $mt->save();

    return redirect()->route('mybazar')->with('success','Car Upload Success !');
    }

    public function carsonmybazar($id)
    {
        $data = Car_Sales::where('barzar_id',$id)->get();
        $datacount = Car_Sales::where('barzar_id',$id)->get();
        return view('carsonmybazar',compact('data','datacount','id'));
    }

    public function editcaronbazar($id)
    {
        $brands = Vehicle_makes::orderby('name')->get();
        $models = Vehicle_models::orderby('make')->get();

        $data = Car_Sales::find($id);
        $posterid = Car_Sales::where('id',$id)->pluck('user_id');
        foreach($posterid as $posterid)

        $authuserid = Auth()->user()->id;
        
        return view('editcaronbazar',compact('data','id','brands','models','authuserid','posterid'));
    }



    public function editcaronbazarpost(Request $request)
    {
        $this->validate($request,[
           
            'carbrand' => 'required',
             'carmodel' => 'required',
            'desc' => 'required',
            'modelyear' => 'required',
            'price' => 'required',
            'pricetype' => 'required',
            'location' => 'required',
            'fuel' => 'required',
            'mileage' => 'required',
            'CC' => 'required',
            'colour' => 'required',
            'gear' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'cover_image2' => 'image|nullable|max:1999',
            

        ]);

        if($request->hasFile('cover_image')){
            //get filename with ext
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            //get ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            //uplod image
            $path = $request->file('cover_image')->storeAs('/public/images/', $fileNameToStore);

        }  
        if($request->hasFile('cover_image2')){
            //get filename with ext
            $filenameWithExt = $request->file('cover_image2')->getClientOriginalName();
            //get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME );
            //get ext
            $extension = $request->file('cover_image2')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore2 = $filename .'_'.time().'.'.$extension;
            //uplod image
            $path = $request->file('cover_image2')->storeAs('/public/images/', $fileNameToStore2);

        }

        $bazid = $request->input('bazid');
        $subid = $request->input('subid');
        $carsaleid =  $request->input('carsaleid');

       $mt =  Car_Sales::find($carsaleid);
       $mt->user_id = Auth()->user()->id;
       $mt->brand = $request->input('carbrand');
       $mt->model = $request->input('carmodel');
       $mt->description = $request->input('desc');
       $mt->modelyear = $request->input('modelyear');
       $mt->price = $request->input('price');
       $mt->price_type = $request->input('pricetype');
       $mt->Location = $request->input('location');
       $mt->Fuel = $request->input('fuel');
       $mt->Mileage = $request->input('mileage');
       $mt->CC = $request->input('CC');
       $mt->Colour = $request->input('colour');
       $mt->Gear = $request->input('gear');
       if($request->hasFile('cover_image')){
       $mt->cover_image = $fileNameToStore;
       $mt->cover_image2 = $fileNameToStore2;
       }
    //    $mt->barzar_id = $bazid;
    //    $mt->subscription_id = $subid;

       $mt->save();

    return back()->with('success','Car Update Success !');
    }

    public function mycarbookings()
    {
        $data = Bookings::where('userid', Auth()->user()->id)->orderby('id','DESC')->paginate(20);
        $datacount = Bookings::where('userid', Auth()->user()->id)->count();
        return view('mycarbookings',compact('data','datacount'));
    }

    public function myhomebookings()
    {
      
        $data = Home_Care_Bookings::where('userid', Auth()->user()->id)->orderby('id','DESC')->paginate(20);
        $datacount = Home_Care_Bookings::where('userid', Auth()->user()->id)->count();
        return view('myhomebookings',compact('data','datacount'));



    }
    

}


