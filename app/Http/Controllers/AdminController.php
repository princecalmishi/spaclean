<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car_Wash;
use App\Models\Bookings;
use App\Models\Services;
use App\Models\User;
use App\Models\Barzars;
use App\Models\Car_Sales;
use App\Models\Branch;
use App\Models\Role;
use App\Models\Staff;
use App\Models\Riders;
use App\Models\Products;
use App\Models\Slides;
use App\Models\Categories;
use App\Models\HomeCareServices;
use App\Models\Category_services;
use App\Models\Car_Wash_Personnel;
use App\Models\Home_Care_Bookings;
use App\Models\Bazaar_package;
use App\Models\Bazaar_subscriptions;
use App\Models\CarInquiries;
use App\Models\Network_Profiles;
use App\Models\Network__experiences;
use App\Models\Connection;
use App\Models\Hybrid_packages_services;
use App\Models\Hybrid_packages;
use App\Models\Rider_referees;
use App\Models\Rider_wallet_transactions;
use App\Models\Rider_wallets;
use App\Models\Vehicle_makes;
use App\Models\Vehicle_models;
use App\Models\Privacy;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Str;
use DB;


class AdminController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
    public function index()
    {      

            
            $allusers = User::orderby('id','DESC')->paginate(4);
            $recentbooks = Bookings::orderby('id','DESC')->paginate(4);

            $users = User::count();
            $servs = Services::count();
            $carsal = Car_Sales::count();
            $riders = Riders::count();
            $books = Bookings::count();
            $assignedbook = DB::table('bookings')->where('Status', 'booked')->count();     
            $completednedbook = DB::table('bookings')->where('Status', 'booked')->sum('amount');     
            $carsales = DB::table('car_sales')->where('Status', 'Sold')->sum('price');     
            $hmcs = DB::table('home_care_bookings')->where('Status', 'paid')->sum('amount');     
            $pendingbook = DB::table('bookings')->where('Status', 'pending')->count();     
            $bazars = Barzars::count();     

            return view('admin.index')->with('users', $users)->with('servs', $servs)->with('books', $books)
            ->with('assignedbook', $assignedbook)->with('completednedbook', $completednedbook)
            ->with('pendingbook', $pendingbook)->with('bazars', $bazars)->with('carsal', $carsal)
            ->with('riders', $riders) ->with('carsales', $carsales)->with('hmcs', $hmcs)
            ->with('allusers', $allusers)->with('recentbooks', $recentbooks);      
        
    }

    public function services()
    {        
            $data = Services::orderby('id','DESC')->paginate(20);            
            return view('admin.services')->with('data', $data);       
        
    }
    public function viewservice($id)
    {       
           
            $datax = DB::table('services')->where('id', $id)->get(); 
            return view('admin.viewservice')->with('datax', $datax);      
        
    }

    public function editservice($id)
    {      
            $serv = Services::find($id);            
            return view('admin.editservices')->with('serv', $serv);             

    }

    public function addservicepost(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'desc' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

         //handle file upload
        

        $post = new Services;
        $post->name =$request->input('name');
        $post->service_desc = $request->input('desc');

        if($request->hasFile('cover_image')){
        $rareImageName = time() . '_rarezxczsddss.' . $request->file('cover_image')->getClientOriginalExtension();
        $request->file('cover_image')->move(public_path('storage/images'), $rareImageName);
        $post->featured_image = $rareImageName;     

        }
        $post->save();

        return back()->with('success','Saved !');



    }

    public function editservicepost(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'desc' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
       //handle file upload
        //handle file upload
        

        $id = $request->input('id');
        
        $post = Services::find($id);
        $post->name =$request->input('name');
        $post->service_desc = $request->input('desc');
        if($request->hasFile('cover_image')){
            $rareImageName = time() . '_rarezxczsddss.' . $request->file('cover_image')->getClientOriginalExtension();
            $request->file('cover_image')->move(public_path('storage/images'), $rareImageName);
            $post->featured_image = $rareImageName;     
    
        }

       
        $post->save();

        return back()->with('success','Saved !');

    }

    public function destroyservice($id)
    {
        $servdel = Services::find($id);
        $servdel->delete();

        return back()->with('success', 'Service deleted !');      
        
    }

    public function deletecarwashpack($id)
    {
        $servdel = Categories::find($id);
        $servdel->delete();

        return back()->with('success', 'deleted !');      
        
    }

    public function addservice()
    {
            $data = Role::all();
            
            return view('admin.addservice', compact('data'));       
        
    }

    public function carwashbranches()
    {
        $data = Branch::orderby('id','DESC')->paginate(20);

        return view('admin.carwashbranches',compact('data'));
    }

    public function carwashservices()
    {
        $data = Category_services::orderby('id','DESC')->paginate(40);

        return view('admin.carwashservices',compact('data'));
    }

    public function carwashpersonel()
    {
        $data = Car_Wash_Personnel::orderby('id','DESC')->paginate(20);

        return view('admin.carwashpersonel',compact('data'));
    }

    public function categories()
    {
        $data = Categories::orderby('id','DESC')->paginate(20);         
            
        return view('admin.categories')->with('data', $data);       
        
    }

    public function editcategory($id)
    {
        $data = Categories::find($id);
        return view('admin.editcategory',compact('data'));
    }

    public function posteditcategory(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'saloon_price' => 'required',
            'suv_price' => 'required',
        ]);

        $id = $request->input('id');

        $post = Categories::find($id);
        $post->name	=$request->input('name');
        $post->saloon_price = $request->input('saloon_price');
        $post->suv_price = $request->input('suv_price');
        $post->save();

        return back()->with('success', 'Updated successfully');

    }

    public function addcategories()
    {    
            return view('admin.addcategory');    
        
    }

    public function postcategory(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
        ]);

        $post = new Category;
        $post->name	=$request->input('name');
        $post->price = $request->input('price');
        $post->save();

        return view('admin.addcategory')->with('success', 'Category created successfully');
    }

    public function editcat($id)
    {
        $cat = Category::find($id);
        return view('admin.editcat')->with('cat', $cat);
    }

    public function editcatpost(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
        ]);
        
        $id = $request->input('id');
        $post = Category::find($id);
        $post->name	=$request->input('name');
        $post->price = $request->input('price');
        $post->save();

        // return back()->with('success', 'message sent !');

        return back()->with('success', 'Category updated successfully');
    }

    public function delcategs($id)
    {
        $userdel = Category::find($id);
        
        $userdel->delete();
         
        return back()->with('error', 'Category deleted !');

        
        
    }

    public function categoryservices()
    {
        $data = CategoryServices::all();

        return view('admin.categoryservices')->with('data', $data);
       
        
    }

    public function addcategoryservices()
    {
        $data= Category::all();
        return view('admin.addcategoryservices')->with('data', $data);       
        
    }

    public function postcatservices(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'category' => 'required',
        ]);

        $post = new CategoryServices;
        $post->service_name	=$request->input('name');
        $post->service_category	= $request->input('category');
        $post->save();

        return back()->with('success', ' Saved Successfully !');
    }

    public function users()
    {

         $users = User::orderBy('id','DESC')->paginate(20);
        //  dd($users);     
            
            return view('admin.users')->with('users', $users);
       
        
    }

    public function delusers($id)
    {
        $userdel = User::find($id);
        $users = User::all();
        if(auth()->user()->role == 'admin'){
            $userdel->delete();
            
            return back()->with('error','User Deleted successfuly !');
        }else{

        return back()->with('error', 'You have no previldges !!');
        }
        
    }


    public function delreferees($id)
    {
        $userdel = Rider_referees::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }


    
    public function messages()
    {

       $data = Contact::orderBy('id', 'DESC')->get();
            
        return view('admin.messages')->with('data', $data);
       
        
    }

    public function markmessage($id)
    {
        $data = Contact::find($id);
        $data->status = 'Read';
        $data->save();

        return back()->with('sucess','Message marked as read !');
    }

    public function bookings()
    {
            $data = Bookings::where('status','booked')->orderBy('id', 'DESC')->paginate(20);
            return view('admin.bookings')->with('data', $data);       
        
    }

    public function pendingbookings()
    {
            $data = Bookings::where('status','unpaid')->orderBy('id', 'DESC')->paginate(20);
            return view('admin.pendingbookings')->with('data', $data);       
        
    }

    // public function carwashpacks()
    // {
    //         $data = Bookings::where('status','unpaid')->orderBy('id', 'DESC')->paginate(20);
    //         return view('admin.pendingbookings')->with('data', $data);       
        
    // }

    public function createservice(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'desc' => 'required',
            'assign' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
       //handle file upload
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
            $path = $request->file('cover_image')->storeAs('/public/servicepics', $fileNameToStore);

        }else {
            $fileNameToStore = 'noimage.jpg';
        }


        $post = new Services;
        $post->name	 =$request->input('name');
        $post->service_desc = $request->input('desc');
        $post->Assigned_role = $request->input('assign');
        $post->featured_image= $fileNameToStore;
        $post->save();

        return back()->with('success', 'Saved');
       
    }

    public function addbranch(Request $request)
    {
        $this->validate($request,[
            'branch' => 'required',
            'location' => 'required',
            'phone' => 'required',
        ]);

        
        $post = new Branch;
        $post->Name	 =$request->input('branch');
        $post->Location = $request->input('location');
        $post->Contact = $request->input('phone');
        $post->save();

        return back()->with('success', 'Saved');
       
    }

    public function mypackage()
    {
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editbook($id)
    {
        $data = Booking::find($id);

        $prodss= Products::all();

        return view('admin.editbooking')->with('data', $data)->with('prodss', $prodss);

    }

    public function delbooks($id)
    {
        $userdel = Booking::find($id);
            $userdel->delete();
            
        return back()->with('error','Booking Deleted successfuly !');
       
        
    }



    public function updatebookingpost(Request $request)
    {
        $this->validate($request,[
            'date' => 'required',
            'time' => 'required',
            'status' => 'required',
        ]);
        $stat = $request->input('status');
        $pack = $request->input('package');
        $prodid = $request->input('prodid');
        
        
        $id = $request->input('id');
        $post = Booking::find($id);
        $post->date	=$request->input('date');
        $post->time = $request->input('time');
        $post->status = $request->input('status');
        $post->save();

        // return back()->with('success', 'message sent !');

        return back()->with('success', 'Booking updated successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function homecareservices()
    {
        $data = HomeCareServices::orderby('id','DESC')->paginate(20);
        return view('admin.homecareservices')->with('data', $data);
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function admincreatehomeservice(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'assign' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
       //handle file upload
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
            $path = $request->file('cover_image')->storeAs('/public/servicepics', $fileNameToStore);

        }
        // else {
        //     $fileNameToStore = 'noimage.jpg';
        // }


        $post = new HomeCareServices;
        $post->name	 =$request->input('name');
        $post->desc = $request->input('desc');
        $post->price = $request->input('price');
        $post->Assign_to = $request->input('assign');
        $post->image= $fileNameToStore;
        $post->save();

        return back()->with('success', 'Service created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listedcars()
    {
        $data = Car_Sales::all();
        return view('admin.listedcars')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editlisting($id)
    {
        $carSale = Car_Sales::find($id);

        return view('admin.editlisting')->with('carSale', $carSale);

    }

    public function updatelistingpost(Request $request)
    {
        $this->validate($request,[
            'brand' => 'required',
            'model' => 'required',
            'description' => 'required',
            'modelyear' => 'required',
            'price' => 'required',
            'price_type' => 'required',
            'status' => 'required',
            'location' => 'required',
            'Fuel' => 'required',
            'Mileage' => 'required',
            'CC' => 'required',
            'Colour' => 'required',
            'Gear' => 'required',
           
        ]);
        
        $id = $request->input('id');
        $post = Car_Sales::find($id);
        $post->brand	=$request->input('brand');
        $post->model = $request->input('model');
        $post->description = $request->input('description');
        $post->modelyear = $request->input('modelyear');
        $post->price = $request->input('price');
        $post->price_type = $request->input('price_type');
        $post->status = $request->input('status');
        $post->Location = $request->input('location');
        $post->Fuel = $request->input('Fuel');
        $post->Mileage = $request->input('Mileage');
        $post->CC = $request->input('CC');
        $post->Colour = $request->input('Colour');
        $post->Gear = $request->input('Gear');

        if ($request->hasFile('cover_image')) {
         
            $rareImageName = time() . '_rare.' . $request->file('cover_image')->getClientOriginalExtension();
            $request->file('cover_image')->move(public_path('storage/images'), $rareImageName);
            $post->cover_image = $rareImageName;

        }
        if ($request->hasFile('cover_image2')) {
         
            $rareImageName = time() . '_rare.' . $request->file('cover_image2')->getClientOriginalExtension();
            $request->file('cover_image2')->move(public_path('storage/images'), $rareImageName);
            $post->cover_image2 = $rareImageName;

        }

        $post->save();

        // return back()->with('success', 'message sent !');

        return redirect()->route('listedcars')->with('success', 'Lisiting updated successfully');
    }
    public function dellisting($id)
    {
        $userdel = Car_Sales::find($id);
        
        $userdel->delete();
         
        return back()->with('error', 'Listing deleted !');

        
        
    }

    public function homecarebookings()
    {
        $data = Home_Care_Bookings::orderBy('id', 'DESC')->paginate(20);
        return view('admin.homecareservicebookings')->with('data', $data);
    }

    public function edithomecareservice($id)
    {
        $riders = Riders::all();

        $data = HomeCareBooking::find($id);
        return view('admin.edithomecareservice')->with('data', $data)->with('riders', $riders);

    }

    public function edithomecareservicepost(Request $request)
    {
        $this->validate($request,[
           
            'date' => 'required',
            'rider' => 'required',
            'status' => 'required',
        ]);
        
        $id = $request->input('id');
        $post = HomeCareBooking::find($id);
       
        $post->date = $request->input('date');
        $post->rider = $request->input('rider');
        $post->status = $request->input('status');
        $post->save();

        // return back()->with('success', 'message sent !');

        return redirect()->route('homecarebookings')->with('success', 'Booking updated successfully');
    }
    public function delhomecarebook($id)
    {
        $userdel = HomeCareBooking::find($id);
        
        $userdel->delete();
         
        return back()->with('error', 'Booking deleted !');

        
        
    }

    public function slides()
    {
        $data = Slides::orderby('id','DESC')->paginate(20);
        return view('admin.slides')->with('data', $data);
    }

    public function editslide($id)
    {
        $data = Slides::find($id);
        return view('admin.editslide')->with('data', $data);
    }

    public function createslide()
    {
        return view('admin.addsliders');
    }

    public function addslidespost(Request $request)
    {
        $this->validate($request,[
            'head' => 'required',
            'subhead' => 'required',
            'desc' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       //handle file upload
       if ($request->hasFile('cover_image')) {
         
        $rareImageName = time() . '_rare.' . $request->file('cover_image')->getClientOriginalExtension();
        $request->file('cover_image')->move(public_path('storage/images'), $rareImageName);

        }

        $post = new Slides;
        $post->heading	 =$request->input('head');
        $post->subheading = $request->input('subhead');
        $post->desc = $request->input('desc');
        $post->image = $rareImageName;

        $post->save();

        return back()->with('success', 'Slide created');
    }

    public function editslidespost(Request $request)
    {
        $this->validate($request,[
            'head' => 'required',
            'subhead' => 'required',
            'desc' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       //handle file upload
      

        $id = $request->input('id');
        $post = Slides::find($id);
        $post->heading	 =$request->input('head');
        $post->subheading = $request->input('subhead');
        $post->desc = $request->input('desc');
        if ($request->hasFile('cover_image')) {         
            $rareImageName = time() . '_rare.' . $request->file('cover_image')->getClientOriginalExtension();
            $request->file('cover_image')->move(public_path('storage/images'), $rareImageName);
            $post->image = $rareImageName;
    
            }

        $post->save();

        return back()->with('success', 'Slide updated');
    }
    public function delslide($id)
    {
        $userdel = Slides::find($id);
        
        $userdel->delete();
         
        return back()->with('error', 'Slide deleted !');

        
        
    }
    public function riders()
    {
        $data = Riders::orderBy('id', 'DESC')->paginate('20');
        return view('admin.riders')->with('data',$data);
    }

    public function showRiderReferees($id)
    {
        $riderReferees = Rider_referees::where('id', $id)->get();

        return view('admin.editreferee', compact('riderReferees','id'));
    }

    public function showriderwallet($id)
    {
               
        $riderReferees = Rider_wallets::where('id', $id)->get();

        return view('admin.editwallet', compact('riderReferees','id'));
    }

    public function updateRiderwallet(Request $request)
     {
        $refereeId=  $request->input('refereeId');
        $referee = Rider_wallets::find($refereeId);


        if (!$referee) {
            // Handle case where referee is not found
            return redirect()->back()->with('error', 'Wallet not found.');
        }

        // Validate and update the referee data
        $validatedData = $request->validate([
        
            'balance' => 'required|string',
            // Add other fields as needed
        ]);

        $referee->update($validatedData);

        return redirect()->back()->with('success', 'Updated successfully.');
    }

    public function editwallettrans($id)
    {
               
        $riderReferees = Rider_wallet_transactions::where('id', $id)->get();

        return view('admin.editwallettrans', compact('riderReferees','id'));
    }

    public function updateRidertrans(Request $request)
    {
        $refereeId=  $request->input('refereeId');
        $referee = Rider_wallet_transactions::find($refereeId);


        if (!$referee) {
            // Handle case where referee is not found
            return redirect()->back()->with('error', 'Transaction not found.');
        }

        // Validate and update the referee data
        $validatedData = $request->validate([
        
            'amount' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
            // Add other fields as needed
        ]);

        $referee->update($validatedData);

    return redirect()->back()->with('success', 'Updated successfully.');
    }
    public function deletetrans($id)
    {
        $userdel = Rider_wallet_transactions::find($id);
        
        $userdel->delete();
         
        return back()->with('error', 'Deleted !');
        
        
    }

    public function staff()
    {
        $data = Staff::orderBy('id', 'DESC')->get();

        $data2 = Services::all();
        $data3 = HomeCareServices::all();
        $data4 = Branch::all();
        $data5 = Role::all();
        return view('admin.staff')->with('data',$data)->with('data2',$data2)->with('data3',$data3)
        ->with('data4',$data4)->with('data5',$data5);
    }
    public function branch()
    {
        $data = Branch::orderBy('id', 'DESC')->get();
        return view('admin.branch')->with('data',$data);
    }

    public function addriderx(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'plate' => 'required',
            'rating' => 'required',
            'phone' => 'required',
            'payment_method' => 'required',
           
        ]);      

        $post = new Riders;
        $post->name	 =$request->input('name');
        $post->email = $request->input('email');
        $post->plate_number = $request->input('plate');
        $post->rating = $request->input('rating');
        $post->phone = $request->input('phone');
        $post->payment_method = $request->input('payment_method');
       
        $post->save();

        return back()->with('success', 'Rider added !');
    }
    public function createrole(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            
           
        ]);   
        $post = new Role;
        $post->Name	 =$request->input('name');
        
       
        $post->save();

        return back()->with('success', 'Role Created !');

    }

    public function poststaff(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'branch' => 'required',
            // 'carwashserv' => 'required',
            // 'homecare_serv' => 'required',
           
        ]);      

        $post = new Staff;
        $post->Staff_name	 =$request->input('name');
        $post->Email = $request->input('email');
        $post->Phone = $request->input('phone');
        $post->Role = $request->input('role');
        $post->branch = $request->input('branch');

        //$post->Staff_service = $request->input('carwashserv');

        // $post->Homecare_service = $request->input('homecare_serv');
       
        $post->save();

        return back()->with('success', 'Staff added !');
    }

    public function delrider($id)
    {
        $userdel = Riders::find($id);
        
        $userdel->delete();
         
        return back()->with('error', 'Rider deleted !');

        
        
    }

    public function carinquiry()
    {
        $data = CarInquiries::orderBy('id', 'DESC')->paginate(20);        

        return view('admin.carinquiries')->with('data', $data);
    }

    public function viewuserprofile($id)
    {
        $data = user::where('id', $id)->get();

        

        return view('admin.viewuserprofile')->with('data', $data);
    }

    public function carinquirymark($id)
    {

        $data = CarInquiries::find($id);
        $data->status = 'Attended';
        $data->save();
        return back()->with('success', 'Inquiry marked as attended to !');


    }


    public function delinq($id)
    {
        $data =  CarInquiries::find($id);
        $data->delete();
        return back()->with('error', 'Inquiry deleted !');

    }

    public function deletebazarpack($id)
    {
        $data =  Bazaar_package::find($id);
        $data->delete();
        return back()->with('error', 'deleted !');
    }

    public function delsbazasubs($id)
    {
        $data =  Bazaar_subscriptions::find($id);
        $data->delete();
        return back()->with('error', 'deleted !');
    }
    public function approvetrans($id)
    {
        $data =  Rider_wallet_transactions::find($id);
        $data->status = 'complete';
        $data->save();
        return back()->with('success','Approved !');
    }
   

    public function editrider($id)
    {
        $rider = Riders::find($id);

        if (!$rider) {
            return back()->with('error', 'Rider not found');
        }

        return view('admin.editrider', ['rider' => $rider]);
    }
    public function editbazar($id)
    {
       
        $riderReferees = Barzars::findOrFail($id);
        $barzar = Barzars::findOrFail($id);
        return view('admin.editbazar', compact('riderReferees','barzar'));

        // return view('admin.editbazar', ['rider' => $rider]);
    }

    public function bazarupdate(Request $request)
    {
        $id = $request->input('refereeId');

        // Validate the form data
        $request->validate([
            'Barzar_name' => 'required|string|max:255',
            // 'Barzar_owner' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Fetch the existing Barzar record
        $barzar = Barzars::findOrFail($id);

        // Update the record with the new data
        $barzar->Barzar_name = $request->input('Barzar_name');
        // $barzar->Barzar_owner = $request->input('Barzar_owner');
        $barzar->location = $request->input('location');
        $barzar->contact = $request->input('contact');
        $barzar->status = $request->input('status');

        // Handle image upload
        if ($request->hasFile('image')) {
         
            $rareImageName = time() . '_rare.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/images'), $rareImageName);
            $barzar->image = $rareImageName;

        }


        // Save the changes
        $barzar->save();

        return back()->with('success', 'Barzar updated successfully!');
    }

    public function createbazar()
    {
        return view('admin.createbazar');
    }

    public function createbazapackage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'number_of_cars' => 'required',
            'period' => 'required',
        ]);

        // Create a new BazarPackage instance
        $package = Bazaar_package::create($request->all());

        // Redirect to a success page or wherever you'd like
        return back()->with('success', 'Bazar Package created successfully');
    }

    public function editbazarpackage($id)
    {
        $package = Bazaar_package::find($id);
        return view('admin.editbazarpackages',compact('package','id'));
    }

    public function editbazarpackagepost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|integer',
            'number_of_cars' => 'required|integer',
            'period' => 'required|integer',
        ]);

        $bazarid = $request->input('id');

        $post = Bazaar_package::find($bazarid);
        $post->name	=$request->input('name');
        $post->amount = $request->input('amount');
        $post->number_of_cars = $request->input('number_of_cars');
        $post->period = $request->input('period');
        $post->save();

        return back()->with('success','Updated Successfully !');
        
    }

    public function editbazarsubs($id)
    {

        $subscription = Bazaar_subscriptions::find($id);
        return view('admin.editbazarsubs',compact('subscription','id'));
    }

    public function editbazarsubspost(Request $request)
    {

    }

    public function updatebazar(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|integer',
            'number_of_cars' => 'required|integer',
            'period' => 'required|integer',
        ]);

        $package = Bazaar_package::find($id);
        $package->update($request->all());

        returnback()->with('success', 'Package updated successfully.');
    }
 

    public function updateriderpost(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'paymethod' => 'required',
            'balance' => 'required',
        ]);
        
        $id = $request->input('id');
        $post = Riders::find($id);
        $post->name	=$request->input('name');
        $post->email = $request->input('email');
        $post->phone = $request->input('phone');
        $post->payment_method = $request->input('paymethod');
        $post->wallet_balance = $request->input('balance');
        $post->save();

        // return back()->with('success', 'message sent !');

        return back()->with('success', 'Rider details updated successfully');
    }


    public function updateridernow(Request $request)
    {
        $id = $request->input('riderid');
        $rider = Riders::find($id);

        if (!$rider) {
            return redirect()->back()->with('error', 'Rider not found');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:riders,email,' . $rider->id,
            'phone' => 'required|string|max:15',
            'national_id' => 'required|numeric',
            'town' => 'required|string|max:255',
            'plate_number' => 'required|string|max:20',
            'color' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'rare_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'front_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'good_conduct' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'insurance' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update existing fields
        $rider->name = $request->input('name');
        $rider->email = $request->input('email');
        $rider->phone = $request->input('phone');
        $rider->national_id = $request->input('national_id');
        $rider->town = $request->input('town');
        $rider->plate_number = $request->input('plate_number');
        $rider->color = $request->input('color');

        // Update password if provided
        if ($request->filled('password')) {
            $rider->password = bcrypt($request->input('password'));
        }

        // Update images if provided
        if ($request->hasFile('rare_image')) {

            $rareImageName = time() . '_rare.' . $request->file('rare_image')->getClientOriginalExtension();
            $request->file('rare_image')->move(public_path('storage/images'), $rareImageName);
            $rider->rare_image = $rareImageName;
            }
            if ($request->hasFile('front_image')) {
            $frontImageName = time() . '_front.' . $request->file('front_image')->getClientOriginalExtension();
            $request->file('front_image')->move(public_path('storage/images'), $frontImageName);
            $rider->front_image = $frontImageName;
            }
            if ($request->hasFile('good_conduct')) {
    
            $gcImageName = time() . '_gc.' . $request->file('good_conduct')->getClientOriginalExtension();
            $request->file('good_conduct')->move(public_path('storage/images'), $gcImageName);
            $rider->good_conduct = $gcImageName;
            }
            if ($request->hasFile('insurance')) {
    
            $insuranceImageName = time() . '_insurance.' . $request->file('insurance')->getClientOriginalExtension();
            $request->file('insurance')->move(public_path('storage/images'), $insuranceImageName);
            $rider->insurance = $insuranceImageName;
            }
            if ($request->hasFile('license')) {
    
            $licenseImageName = time() . '_license.' . $request->file('license')->getClientOriginalExtension();
            $request->file('license')->move(public_path('storage/images'), $licenseImageName);
            $rider->license = $licenseImageName;
            }
    
            $rider->save();

        $rider->save();

        return back()->with('success', 'Rider updated successfully');
    }


    public function product()
    {
        $data = Products::orderBy('id','DESC')->paginate(50);
        $datacount = Products::count();

        return view('admin.products')->with('data', $data)->with('datacount', $datacount);
    }

    public function addproductpost(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
           
           
        ]);      

        $post = new Products;
        $post->name	 =$request->input('name');
        $post->quantity = $request->input('quantity');
        $post->price = $request->input('price');
        
       
        $post->save();

        return back()->with('success', 'Product added !');
    }

    public function editproduct($id)
    {
        $data = Products::find($id);
        return view('admin.editproduct')->with('data', $data)->with('id', $id);
    }

    public function updateproductpost(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            
        ]);
        
        $id = $request->input('id');
        $post = Products::find($id);
        $post->name	=$request->input('name');
        $post->price = $request->input('price');
        $post->quantity = $request->input('quantity');
       
        $post->save();

        // return back()->with('success', 'message sent !');

        return back()->with('success', 'Product details updated successfully');
    }
    public function deleteproduct($id)
    {
        $userdel = Products::find($id);
        
        $userdel->delete();
         
        return back()->with('error', 'Product deleted !');

        
    }

    public function barzarslist()
    {
        // $data = Barzars::orderBy('id', 'DESC')->get();
        $data = Barzars::where('status','Approved')->orderBy('id', 'DESC')->paginate(20);
        $datacount = Barzars::count();

        return view('admin.barzarslist')->with('data', $data)->with('datacount', $datacount);
    }

    
    public function pendingbarzars()
    {
        // $data = Barzars::orderBy('id', 'DESC')->get();
        $data = Barzars::where('status','Pending')->orderBy('id', 'DESC')->paginate(20);
        $datacount = Barzars::count();

        return view('admin.pendingbarzars')->with('data', $data)->with('datacount', $datacount);
    }

    public function declinedbarzars()
    {
        // $data = Barzars::orderBy('id', 'DESC')->get();
        $data = Barzars::where('status','Declined')->orderBy('id', 'DESC')->paginate(20);
        $datacount = Barzars::count();

        return view('admin.declinedbarzars')->with('data', $data)->with('datacount', $datacount);
    }

    public function bazarpackages()
    {
        // $data = Barzars::orderBy('id', 'DESC')->get();
        $data = Bazaar_package::orderBy('id', 'DESC')->paginate(20);
        $datacount = Bazaar_package::count();

        return view('admin.bazarpackages')->with('data', $data)->with('datacount', $datacount);
    }

    public function bazarsubscriptions()
    {
        // $data = Barzars::orderBy('id', 'DESC')->get();
        $data = Bazaar_subscriptions::orderBy('id', 'DESC')->paginate(20);
        $datacount = Bazaar_subscriptions::count();

        return view('admin.bazarsubscriptions')->with('data', $data)->with('datacount', $datacount);
    }


    public function approvebazar($id)
    {
        $data = Barzars::find($id);
        $data->status = 'Approved';
        $data->save();

        return back()->with('success', 'Updated');
    }

    public function declinebazar($id)
    {
        $data = Barzars::find($id);
        $data->status = 'Declined';
        $data->save();

        return back()->with('success', 'Updated');
    }

    public function denybazar($id)
    {

        $data = Barzars::find($id);
        $data->status = 'Denied';
        $data->save();

        return back()->with('success', 'Updated');
    }

    public function networkprofiles()
    {
        $data = Network_Profiles::orderby('id','DESC')->paginate(20);
        return view('admin.networkprofiles',compact('data'));
    }

    public function networkexperience()
    {
        $data = Network__experiences::orderby('id','DESC')->paginate(20);
        return view('admin.networkexperience',compact('data'));
    }

    public function connections()
    {
        $data = Connection::orderby('id','DESC')->paginate(20);
        return view('admin.connections',compact('data'));
    }

    public function hybridpacks()
    {
        $data = Hybrid_packages::orderby('id','DESC')->paginate(50);
        return view('admin.hybridpacks',compact('data'));
    }

    public function hybridpackservices()
    {
        $data = Hybrid_packages_services::orderby('id','DESC')->paginate(20);
        return view('admin.hybridpackservices',compact('data'));
    }

    public function deletebpackservice($id)
    {
        $userdel = Hybrid_packages_services::find($id);
        $userdel->delete();

        return back()->with('error','Deleted !');
    }
    public function deleteprofile($id)
    {
        $userdel = Network_Profiles::find($id);
        $userdel->delete();

        return back()->with('error','Deleted !');
    }

    public function riderreferees()
    {
        $data = Rider_referees::orderby('id','DESC')->paginate(20);
        return view('admin.riderreferees',compact('data'));
    }
    public function riderwallets()
    {
        $data = Rider_wallets::orderby('id','DESC')->paginate(20);
        return view('admin.riderwallets',compact('data'));
    }
    public function ridertrans()
    {
        $data = Rider_wallet_transactions::orderby('id','DESC')->paginate(20);
        return view('admin.ridertrans',compact('data'));
    }

    public function vmodels()
    {
        $data = Vehicle_models::orderby('make','ASC')->paginate(50);
        return view('admin.vmodels',compact('data'));
    }

    public function vmakes()
    {
        $data = Vehicle_makes::orderby('makeid','ASC')->paginate(50);
        return view('admin.vmakes',compact('data'));
    }

    public function edituser($id)
    {
        $networkexpertableid = Network__experiences::where('user_id',$id)->pluck('id');
        $networkexpertableidcount = Network__experiences::where('user_id',$id)->count();
        if($networkexpertableidcount >=1){
            foreach($networkexpertableid as $networkexpertableid);

        }else{
            $networkexpertableid ='N/A';
        }
        
        return view('admin.edituser',compact('id','networkexpertableid'));
    }
  
    public function updateuserimages(Request $request)
    {     
        $request->validate([
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'bannerimage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'id' => 'required|exists:network_profiles,user_id',
        ]);

        $user_id = $request->input('id');
        $networkProfile = Network_Profiles::where('user_id', $user_id)->first();

        if (!$networkProfile) {
            return redirect()->back()->with('error', 'Network profile not found');
        }

        // Handle cover image update
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image')->store('public/images');
            $networkProfile->Profile_image = basename($coverImage);
        }

        // Handle banner image update
        if ($request->hasFile('bannerimage')) {
            $bannerImage = $request->file('bannerimage')->store('public/images');
            $networkProfile->Banner_image = basename($bannerImage);
        }

        $networkProfile->save();

        return redirect()->back()->with('success', 'Images updated successfully');
    

    }

    public function updateuserprof(Request $request)
    {
        $this->validate($request,[          
           
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'profession' => 'required',
            'location' => 'required',
            'about' => 'required',

        ]);

        $useridup = $request->input('id');
        $data = Network_Profiles::where('user_id',$useridup)->count();

        // dd($data);
        $dataprofid = Network_Profiles::where('user_id',$useridup)->pluck('id');
        foreach($dataprofid as $dataprofid)

        $userid =$useridup;
        $username =User::where('id',$useridup)->pluck('name');
        foreach($username as $username)

        $userid = $useridup;
        $user = User::find($userid);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();
       
        $networkprofile = Network_Profiles::find($request->input('netid'));

        if ($networkprofile) {

            $fx = Network_Profiles::find($dataprofid);             
            $fx->Profession= $request->input('profession');
            $fx->Name= $request->input('name');
            $fx->Location = $request->input('location');
            $fx->About = $request->input('about');
            $fx->save();
    
            return back()->with('success','Profile updated !');
        }
        return redirect()->back()->with('error', 'Network Profile not found');


       

    }

    public function updateuserexp(Request $request)
    {
        // Validate the form data
        $request->validate([
            'work_position' => 'required|string|max:255',
            'Company' => 'required|string|max:255',
            'fromdate' => 'required|date',
            'todate' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'skills' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
        ]);

        // Find the Network__experiences model by ID
        $networkExperience = Network__experiences::find($request->input('networkexpertableid'));

        if ($networkExperience) {
           

            $data = Network__experiences::find($request->input('networkexpertableid'));
            $data->Work_position = $request->input('work_position');
            $data->Company = $request->input('Company');
            $data->From_date = $request->input('fromdate');
            $data->To_date = $request->input('todate');
            $data->Location = $request->input('location');
            $data->Description = $request->input('description');
            $data->Skills = $request->input('skills');
            $data->Education = $request->input('education');
            $data->save();

            // Redirect with a success message
            return redirect()->back()->with('success', 'Experience details updated successfully');
        }

        // Redirect with an error message if the model is not found
        return redirect()->back()->with('error', 'Experience not found');
    }

    public function adduser()
    {

        return view('admin.createuser');
    }
    public function createrider()
    {

        return view('admin.createrider');
    }

    public function adduserpost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $ref= substr(sha1(mt_rand()),17,10); 


        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'unique_id' => $ref,
            'password' => bcrypt($request->input('password')),
        ]);
        
        

        Network_Profiles::create([
            'user_id' => $user->id,
            'Name' => $user->name,
            'unique_id' => $user->unique_id,

        ]);

        Network__experiences::create([
            'user_id' => $user->id,
            
        ]);
           
        return back()->with('success', 'User created successfully');
    }


    public function xaddrider(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:riders,email',
            'phone' => 'required|string|max:15',
            'national_id' => 'required|numeric',
            'town' => 'required|string|max:255',
            'plate_number' => 'required|string|max:20',
            'color' => 'required|string|max:255',
            'rare_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'front_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'good_conduct' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'insurance' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:6',
        ]);

        // Handle file uploads
        $rareImage = $request->file('rare_image')->store('rider_images');
        $frontImage = $request->file('front_image')->store('rider_images');
        $goodConduct = $request->file('good_conduct')->store('rider_images');
        $insurance = $request->file('insurance')->store('rider_images');
        $license = $request->file('license')->store('rider_images');

        // Create the Rider model
        Riders::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'national_id' => $request->input('national_id'),
            'town' => $request->input('town'),
            'plate_number' => $request->input('plate_number'),
            'color' => $request->input('color'),
            'rare_image' => $rareImage,
            'front_image' => $frontImage,
            'good_conduct' => $goodConduct,
            'insurance' => $insurance,
            'license' => $license,
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->back()->with('success', 'Rider created successfully');
    }
    public function addrider(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:riders,email',
            'phone' => 'required|string|max:15',
            'national_id' => 'required|numeric',
            'town' => 'required|string|max:255',
            'plate_number' => 'required|string|max:20',
            'color' => 'required|string|max:255',
            'rare_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'front_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'good_conduct' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'insurance' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|string|min:6',
        ]);

        $rider = new Riders();
        $rider->name = $request->input('name');
        $rider->email = $request->input('email');
        $rider->phone = $request->input('phone');
        $rider->national_id = $request->input('national_id');
        $rider->town = $request->input('town');
        $rider->plate_number = $request->input('plate_number');
        $rider->color = $request->input('color');

        // Upload images and store file names
        // $rider->rare_image = $request->file('rare_image')->store('storage/images');
        // $rider->front_image = $request->file('front_image')->store('storage/images');
        // $rider->good_conduct = $request->file('good_conduct')->store('storage/images');
        // $rider->insurance = $request->file('insurance')->store('storage/images');
        // $rider->license = $request->file('license')->store('storage/images');

         // Handle image uploads
         $rareImageName = time() . '_rare.' . $request->file('rare_image')->getClientOriginalExtension();
         $request->file('rare_image')->move(public_path('storage/images'), $rareImageName);
         $rider->rare_image = $rareImageName;
 
         $frontImageName = time() . '_front.' . $request->file('front_image')->getClientOriginalExtension();
         $request->file('front_image')->move(public_path('storage/images'), $frontImageName);
         $rider->front_image = $frontImageName;

         $gcImageName = time() . '_gc.' . $request->file('good_conduct')->getClientOriginalExtension();
         $request->file('good_conduct')->move(public_path('storage/images'), $gcImageName);
         $rider->good_conduct = $gcImageName;

         $insuranceImageName = time() . '_insurance.' . $request->file('insurance')->getClientOriginalExtension();
         $request->file('insurance')->move(public_path('storage/images'), $insuranceImageName);
         $rider->insurance = $insuranceImageName;

         $licenseImageName = time() . '_license.' . $request->file('license')->getClientOriginalExtension();
         $request->file('license')->move(public_path('storage/images'), $licenseImageName);
         $rider->license = $licenseImageName;




        $rider->password = bcrypt($request->input('password'));

        $rider->save();

        return back()->with('success', 'Rider created successfully');
    }

     

    public function updaterider(Request $request, $id)
    {
        $rider = Rider::find($id);

        if (!$rider) {
            return redirect()->back()->with('error', 'Rider not found');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:riders,email,' . $rider->id,
            'phone' => 'required|string|max:15',
            'national_id' => 'required|numeric',
            'town' => 'required|string|max:255',
            'plate_number' => 'required|string|max:20',
            'color' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
            'rare_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'front_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'good_conduct' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'insurance' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update existing fields
        $rider->name = $request->input('name');
        $rider->email = $request->input('email');
        $rider->phone = $request->input('phone');
        $rider->national_id = $request->input('national_id');
        $rider->town = $request->input('town');
        $rider->plate_number = $request->input('plate_number');
        $rider->color = $request->input('color');

        // Update password if provided
        if ($request->has('password')) {
            $rider->password = bcrypt($request->input('password'));
        }

        // Update images if provided
       
        

        

        
        if ($request->hasFile('rare_image')) {

        $rareImageName = time() . '_rare.' . $request->file('rare_image')->getClientOriginalExtension();
        $request->file('rare_image')->move(public_path('storage/images'), $rareImageName);
        $rider->rare_image = $rareImageName;
        }
        if ($request->hasFile('front_image')) {
        $frontImageName = time() . '_front.' . $request->file('front_image')->getClientOriginalExtension();
        $request->file('front_image')->move(public_path('storage/images'), $frontImageName);
        $rider->front_image = $frontImageName;
        }
        if ($request->hasFile('good_conduct')) {

        $gcImageName = time() . '_gc.' . $request->file('good_conduct')->getClientOriginalExtension();
        $request->file('good_conduct')->move(public_path('storage/images'), $gcImageName);
        $rider->good_conduct = $gcImageName;
        }
        if ($request->hasFile('insurance')) {

        $insuranceImageName = time() . '_insurance.' . $request->file('insurance')->getClientOriginalExtension();
        $request->file('insurance')->move(public_path('storage/images'), $insuranceImageName);
        $rider->insurance = $insuranceImageName;
        }
        if ($request->hasFile('license')) {

        $licenseImageName = time() . '_license.' . $request->file('license')->getClientOriginalExtension();
        $request->file('license')->move(public_path('storage/images'), $licenseImageName);
        $rider->license = $licenseImageName;
        }

        $rider->save();

        return redirect()->route('rider.index')->with('success', 'Rider updated successfully');
    }

    public function addnewcarwashpack()
    {
        return view('admin.addnewcarwashpack');
    }

    public function addnewcarwashpackpost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'saloon_price' => 'required|numeric',
            'suv_price' => 'required|numeric',
            // Add more validation rules as per your database structure
        ]);

        // Create a new category
        $category = Categories::create([
            'name' => $request->input('name'),
            'saloon_price' => $request->input('saloon_price'),
            'suv_price' => $request->input('suv_price'),
            // Add more fields as per your database structure
        ]);

        // Redirect back with a success message
        return back()->with('success', 'Category created successfully.');
    
    }

    public function createnewbazar()
    {
        $users = User::all();

        return view('admin.createnewbazar',compact('users'));
    }

    public function createnewbazarpost(Request $request)
    {
          // Validate the form data
          $request->validate([
            'Barzar_name' => 'required|string|max:255',
            'Barzar_owner' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Fetch the existing Barzar record
        $barzar = new Barzars;

        // Update the record with the new data
        $barzar->Barzar_name = $request->input('Barzar_name');
        $barzar->Barzar_owner = $request->input('Barzar_owner');
        $barzar->location = $request->input('location');
        $barzar->contact = $request->input('contact');
        $barzar->status = $request->input('status');

        // Handle image upload
        if ($request->hasFile('image')) {
         
            $rareImageName = time() . '_rare.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/images'), $rareImageName);
            $barzar->image = $rareImageName;

        }


        // Save the changes
        $barzar->save();

        return back()->with('success', 'Barzar Created successfully!');

    }

    public function createnewbranch()
    {

        return view('admin.createnewbranch');
    }

    public function createnewbranchpost(Request $request)
    {
          // Validate the form data
          $request->validate([
            'branch_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
          
        ]);

        // Fetch the existing Barzar record
        $barzar = new Branch;

        // Update the record with the new data
        $barzar->Name = $request->input('branch_name');
        $barzar->Location = $request->input('location');
        $barzar->Contact = $request->input('contact');

        // Save the changes
        $barzar->save();

        return back()->with('success', 'Branch Created successfully!');

    }
    public function deletebranch($id)
    {
        $userdel = Branch::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }

    public function editbranch($id)
    {
        $data = Branch::find($id);

        return view('admin.editbranch',compact('data'));
    }

    public function branchupdatepost(Request $request)
    {
          // Validate the form data
          $request->validate([
            'branch_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
          
        ]);
        $id = $request->input('id');

        // Fetch the existing Barzar record
        $barzar = Branch::find($id);

        // Update the record with the new data
        $barzar->Name = $request->input('branch_name');
        $barzar->Location = $request->input('location');
        $barzar->Contact = $request->input('contact');

        // Save the changes
        $barzar->save();

        return back()->with('success', 'Updated successfully!');

    }

    public function addnewservice()
    {
        $cat = Categories::all();
        return view('admin.createnewservice',compact('cat'));
    }

    public function createnewservicepost(Request $request)
    {
          // Validate the form data
          $request->validate([
            'service_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'status' => 'required|string|max:255',
          
        ]);

        // Fetch the existing Barzar record
        $barzar = new Category_services;

        // Update the record with the new data
        $barzar->service_name = $request->input('service_name');
        $barzar->service_category = $request->input('category');
        $barzar->price = $request->input('price');
        $barzar->status = $request->input('status');

        // Save the changes
        $barzar->save();

        return back()->with('success', 'Created successfully!');

    }
    public function editcarwashservice($id)
    {
        $data = Category_services::find($id);
        $cat = Categories::all();

        return view('admin.editcarwashservice',compact('data','cat'));
    }
    
    public function updateservicepost(Request $request)
    {
          // Validate the form data
          $request->validate([
            'service_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'status' => 'required|string|max:255',
          
        ]);
        $id = $request->input('id');

        // Fetch the existing Barzar record
        $barzar = Category_services::find($id);
        if($barzar){
             // Update the record with the new data
        $barzar->service_name = $request->input('service_name');
        $barzar->service_category = $request->input('category');
        $barzar->price = $request->input('price');
        $barzar->status = $request->input('status');

        // Save the changes
        $barzar->save();

        return back()->with('success', 'Updated successfully!');
        }
        

       

    }
    public function delecarwashserv($id)
    {
        $userdel = Category_services::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }

    public function addnewpersonnel()
    {
        $carwash = Car_Wash::all();
        $roles = Role::all();
        return view('admin.createnewpersonnel',compact('carwash','roles'));
    }

    public function addnewcarwash()
    {
        $carwash = Car_Wash::all();
        $roles = Role::all();
        return view('admin.createnewcarwash',compact('carwash','roles'));
    }

    public function carwashlist()
    {
        $carwash = Car_Wash::orderby('id','DESC')->paginate(20);
        return view('admin.carwashlist',compact('carwash'));
    }

    public function deletecarwash($id)
    {
        $userdel = Car_Wash::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }
  

    public function addnewcarwashpost(Request $request)
    {
          // Validate the form data
          $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);

        // Fetch the existing Barzar record
        $barzar = new Car_Wash;

        // Update the record with the new data
        $barzar->name = $request->input('name');
        $barzar->location = $request->input('location');
        $barzar->contact = $request->input('contact');
        $barzar->latitude = $request->input('latitude');
        $barzar->longitude = $request->input('longitude');

        if ($request->hasFile('image')) {
         
            $rareImageName = time() . '_rare.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/images'), $rareImageName);
            $barzar->image = $rareImageName;


        }


        // Save the changes
        $barzar->save();

        return back()->with('success', 'Created successfully!');

    }
    public function admineditcarwash($id)
    {
        $carwash = Car_Wash::find($id);
        return view('admin.admineditcarwash',compact('carwash'));
    }
    public function admineditcarwashpost(Request $request)
    {
          // Validate the form data
          $request->validate([
            'name' => 'string|max:255',
            'location' => 'string|max:255',
            'contact' => 'string|max:255',
            'latitude' => 'string|max:255',
            'longitude' => 'string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);

        $id =$request->input('id');

        // Fetch the existing Barzar record
        $barzar = Car_Wash::find($id);

        // Update the record with the new data
        $barzar->name = $request->input('name');
        $barzar->location = $request->input('location');
        $barzar->contact = $request->input('contact');
        $barzar->latitude = $request->input('latitude');
        $barzar->longitude = $request->input('longitude');

        if ($request->hasFile('image')) {
         
            $rareImageName = time() . '_rare.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/images'), $rareImageName);
            $barzar->image = $rareImageName;

        }

        // Save the changes
        $barzar->save();
        return back()->with('success', 'Updated successfully!');

    }


    public function createnewpersonnel(Request $request)
    {
          // Validate the form data
          $request->validate([
            'name' => 'required|string|max:255',
            'carwash' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);

        // Fetch the existing Barzar record
        $barzar = new Car_Wash_Personnel;

        // Update the record with the new data
        $barzar->name = $request->input('name');
        $barzar->carwash = $request->input('carwash');
        $barzar->role = $request->input('role');

        if ($request->hasFile('image')) {
         
            $rareImageName = time() . '_rare.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/images'), $rareImageName);
            $barzar->image = $rareImageName;


        }


        // Save the changes
        $barzar->save();

        return back()->with('success', 'Created successfully!');

    }
    public function editpersonnel($id)
    {
        $carwash = Car_Wash::all();
        $roles = Role::all();
        $data = Car_Wash_Personnel::find($id);
        return view('admin.editpersonnel',compact('carwash','roles','id','data'));
    }
    
    public function updatepersonnel(Request $request)
    {
          // Validate the form data
          $request->validate([
            'name' => 'required|string|max:255',
            'carwash' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);
        $id = $request->input('id');
        // Fetch the existing Barzar record
        $barzar = Car_Wash_Personnel::find($id);

        // Update the record with the new data
        $barzar->name = $request->input('name');
        $barzar->carwash = $request->input('carwash');
        $barzar->role = $request->input('role');

        if ($request->hasFile('image')) {
         
            $rareImageName = time() . '_rare.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/images'), $rareImageName);
            $barzar->image = $rareImageName;
        }

        // Save the changes
        $barzar->save();

        return back()->with('success', 'Updated successfully!');
        

    }

    public function deletepersonnel($id)
    {
        $userdel = Car_Wash_Personnel::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }
  
    public function deletebooking($id)
    {
        $userdel = Bookings::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }

    public function approvebooking($id)
    {
        $data =  Bookings::find($id);
        $data->status = 'booked';
        $data->save();
        return back()->with('success','Approved !');
    }

    public function createnewhomecareservice()
    {

        return view('admin.createnewhomecareservice');
    }
    //
    public function createnewhomecareservicepost(Request $request)
    {
          // Validate the form data
          $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);

        // Fetch the existing Barzar record
        $barzar = new HomeCareServices;

        // Update the record with the new data
        $barzar->name = $request->input('name');
        $barzar->desc = $request->input('desc');
        $barzar->price = $request->input('price');

        if ($request->hasFile('image')) {
         
            $rareImageName = time() . '_rare.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/images'), $rareImageName);
            $barzar->image = $rareImageName;


        }


        // Save the changes
        $barzar->save();

        return back()->with('success', 'Created successfully!');

    }
    //edithomecareservice
    public function adminedithomecareservice($id)
    {
        
        $carwash = Car_Wash::all();
        $roles = Role::all();
        $data = HomeCareServices::find($id);
        return view('admin.edithomecareservice',compact('carwash','roles','id','data'));
    }

    public function adminedithomecareservicepost(Request $request)
    {
          // Validate the form data
          $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
        ]);

        $id = $request->input('id');

        // Fetch the existing Barzar record
        $barzar = HomeCareServices::find($id);

        // Update the record with the new data
        $barzar->name = $request->input('name');
        $barzar->desc = $request->input('desc');
        $barzar->price = $request->input('price');

        if ($request->hasFile('image')) {
         
            $rareImageName = time() . '_rare.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('storage/images'), $rareImageName);
            $barzar->image = $rareImageName;


        }


        // Save the changes
        $barzar->save();

        return back()->with('success', 'Updated successfully!');

    }
    public function deletehcs($id)
    {
        $userdel = HomeCareServices::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }

    public function markhomecareaspaid($id)
    {
        $data =  Home_Care_Bookings::find($id);
        $data->status = 'paid';
        $data->save();
        return back()->with('success','Approved !');
    }

    public function assignrider($id)
    {
        $data = Home_Care_Bookings::find($id);
        $riders = Riders::orderby('id','DESC')->get();
        return view('admin.assignrider',compact('data','riders'));
    }

    public function assignriderpost(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255',
            'rider' => 'required|string|max:255',
            'tfee' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'time' => 'required|string|max:255',
         
        ]);

        $id = $request->input('id');

        // Fetch the existing Barzar record
        $barzar = Home_Care_Bookings::find($id);

        // Update the record with the new data
        $barzar->status = $request->input('status');
        $barzar->rider = $request->input('rider');
        $barzar->transport_fee = $request->input('tfee');
        $barzar->pickupdate = $request->input('date');
        $barzar->pickuptime = $request->input('time');

        $barzar->save();

        return back()->with('success','Saved successfuly !');

    }


    public function deletehcb($id)
    {
        $userdel = Home_Care_Bookings::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }

    public function assignedorders($id)
    {
        $data = Home_Care_Bookings::where('rider',$id)->paginate(20);
        $datacount = Home_Care_Bookings::where('rider',$id)->orderby('id','DESC')->count();
        return view('admin.assignedorders',compact('data','datacount'));
    }

    public function addvmake()
    {
        return view('admin.addvmake');
    }

    public function addvmakepost(Request $request)
    {
        $request->validate([
            'makeid' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
                     
        ]);
        // Fetch the existing Barzar record
        $barzar = new Vehicle_makes;

        // Update the record with the new data
        $barzar->makeid = $request->input('makeid');
        $barzar->name = $request->input('name');
        $barzar->country = $request->input('country');
        $barzar->save();

        return back()->with('success','Created Successfully !');

    }
    public function deletemake($id)
    {
        $userdel = Vehicle_makes::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }

    public function editvmake($id)
    {
        $data = Vehicle_makes::find($id);
        return view('admin.editvmake',compact('data'));

    }

    public function editvmakepost(Request $request)
    {
        $request->validate([
            'makeid' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
                     
        ]);
        // Fetch the existing Barzar record
        $id = $request->input('id');
        $barzar = Vehicle_makes::find($id);

        // Update the record with the new data
        $barzar->makeid = $request->input('makeid');
        $barzar->name = $request->input('name');
        $barzar->country = $request->input('country');
        $barzar->save();

        return back()->with('success','Updated Successfully !');

    }

    public function addvmodels()
    {
        return view('admin.addvmodels');
    }

    public function addvmodelpost(Request $request)
    {
        $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
                     
        ]);
        // Fetch the existing Barzar record
        $barzar = new Vehicle_models;

        // Update the record with the new data
        $barzar->make = $request->input('make');
        $barzar->name = $request->input('model');
        $barzar->save();

        return back()->with('success','Created Successfully !');

    }

    public function deletevmodel($id)
    {
        $userdel = Vehicle_models::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }
    //Hybrid_packages deletebpack

    public function activatehpack($id)
    {
        $data =  Hybrid_packages::find($id);
        $data->status = 'active';
        $data->save();
        return back()->with('success','Approved !');
    }

    public function deactivatehpack($id)
    {
        $data =  Hybrid_packages::find($id);
        $data->status = 'deactivated';
        $data->save();
        return back()->with('success','Done !');
    }

    
    public function deletebpack($id)
    {
        $data =  Hybrid_packages::find($id);
        $data->delete();
        return back()->with('success','Done !');
    }
   
    public function deleteexp($id)
    {
        $userdel = Network__experiences::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }

    public function deleteconn($id)
    {
        $userdel = Connection::find($id);
        $userdel->delete();
            
        return back()->with('error','Deleted successfuly !');
        
    }

    public function approveconnection($id)
    {
        $data =  Connection::find($id);
        $data->status = 'Connceted';
        $data->save();
        return back()->with('success','Connected !');
    }
    public function disconectconnection($id)
    {
        $data =  Connection::find($id);
        $data->status = 'Pending';
        $data->save();
        return back()->with('success','Disconnected !');
    }

    public function createproduct()
    {
        return view('admin.createproduct');
    }

    public function privacy()
    {
        $data = Privacy::where('id','1')->pluck('Description');
        foreach($data as $data)
        return view('admin.privacy',compact('data'));
    }

    public function updateprivacy(Request $request)
    {
        
        $request->validate([
            'data' => 'required|string|max:255',
                     
        ]);
        // Fetch the existing Barzar record
        $id = '1';
        $barzar = Privacy::find($id);

        // Update the record with the new data
        $barzar->Description = $request->input('data');
        $barzar->save();

        return back()->with('success','Updated Successfully !');

    }

    public function makeadmin($id)
    {
      
        $data = User::find($id);
        $data->role = 'Admin';
        $data->save();

        return back()->with('success','Updated !');
    }

    public function makeuser($id)
    {
      
        $data = User::find($id);
        $data->role = 'user';
        $data->save();

        return back()->with('success','Updated !');
    }

    public function makecleaner($id)
    {
      
        $data = User::find($id);
        $data->role = 'Cleaner';
        $data->save();

        return back()->with('success','Updated !');
    }







   
    





}
