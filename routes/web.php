<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



        Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('/');


        Route::get('/unauthorized', function () {
            return 'unauthorized';
        })->name('unauthorized');

        Auth::routes(['verify' => true]);
        Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
        Route::post('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
        

        Route::get('/userprofileview', [App\Http\Controllers\HomeController::class, 'edituserprofileview'])->name('profile.edit');
        Route::post('/updateuserprofileview', [App\Http\Controllers\HomeController::class, 'updateuserprofileview'])->name('profile.update');

        Route::get('/allcarbarzars', [App\Http\Controllers\HomeController::class, 'allcarbarzars'])->name('allcarbarzars');
        Route::get('viewbazar/{id}', [App\Http\Controllers\HomeController::class, 'viewbazar'])->name('viewbazar');
        Route::get('bazarcardetail/{id}', [App\Http\Controllers\HomeController::class, 'bazarcardetail'])->name('bazarcardetail');
        Route::post('/carinquirypost', [App\Http\Controllers\HomeController::class, 'carinquirypost'])->name('carinquirypost');
        Route::get('/homecareallservices', [App\Http\Controllers\HomeController::class, 'homecareallservices'])->name('homecareallservices');
        Route::get('/homecarsales', [App\Http\Controllers\HomeController::class, 'homecarsales'])->name('homecarsales');
        Route::get('/carinquirys/{id}', [App\Http\Controllers\HomeController::class, 'carinquiry'])->name('carinquirys');

        
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
        Route::get('/homecare', [App\Http\Controllers\HomeController::class, 'homecare'])->name('homecare');
        Route::get('/homecaredetails/{id}', [App\Http\Controllers\HomeController::class, 'homecaredetails'])->name('homecaredetails');
        Route::get('/bookhomecare/{id}', [App\Http\Controllers\HomeController::class, 'bookhomecare'])->name('bookhomecare');

        Route::post('/createhomeservice', [App\Http\Controllers\HomeController::class, 'createhomeservice'])->name('createhomeservice');
        Route::get('/paynow', [App\Http\Controllers\HomeController::class, 'completepaynow'])->name('paynow');
        Route::get('/paycarbookingnow', [App\Http\Controllers\HomeController::class, 'completecarbookingpaynow'])->name('paycarbookingnow');
        Route::post('/paynowgo', [App\Http\Controllers\HomeController::class, 'paynowgo'])->name('paynowgo');

        Route::get('/hybridsentpay', [App\Http\Controllers\HomeController::class, 'mpesapayforhybrid'])->name('hybridsentpay');

        Route::get('/checkpayment', [App\Http\Controllers\HomeController::class, 'checkpayment'])->name('checkpayment');
        Route::get('/checkcarwashpay', [App\Http\Controllers\HomeController::class, 'checkcarwashpay'])->name('checkcarwashpay');
        Route::get('/checkbazarpay', [App\Http\Controllers\HomeController::class, 'checkbazarpay'])->name('checkbazarpay');
        Route::get('/bookingrecords', [App\Http\Controllers\HomeController::class, 'bookingrecords'])->name('bookingrecords');

        Route::get('/market', [App\Http\Controllers\HomeController::class, 'market'])->name('market');
        Route::get('/cardetail/{id}', [App\Http\Controllers\HomeController::class, 'cardetail'])->name('cardetail');

        Route::get('/carbookings', [App\Http\Controllers\HomeController::class, 'carbookings'])->name('carbookings');

        Route::get('/mypackages', [App\Http\Controllers\HomeController::class, 'mypackages'])->name('mypackages');
        Route::post('/savepackage', [App\Http\Controllers\HomeController::class, 'savepackage'])->name('savepackage');

        Route::get('/carbookingcheckout/{id}', [App\Http\Controllers\HomeController::class, 'carbookingcheckout'])->name('carbookingcheckout');
        Route::get('/mypackcarbookingcheckout/{id}', [App\Http\Controllers\HomeController::class, 'mypackcarbookingcheckout'])->name('mypackcarbookingcheckout');
        Route::get('/get-personnel', [App\Http\Controllers\HomeController::class, 'getPersonnel'])->name('getPersonnel');

        Route::post('/carbookingreq', [App\Http\Controllers\HomeController::class, 'carbookingreq'])->name('carbookingreq');
        Route::post('/mypackcarbookingreq', [App\Http\Controllers\HomeController::class, 'mypackcarbookingreq'])->name('mypackcarbookingreq');

        Route::get('/networkconnect', [App\Http\Controllers\HomeController::class, 'networkconnect'])->name('networkconnect');
        Route::get('/connect/{id}', [App\Http\Controllers\HomeController::class, 'connect'])->name('connect');

        Route::get('/managenetwork', [App\Http\Controllers\HomeController::class, 'managenetwork'])->name('managenetwork');
        Route::get('/invitations', [App\Http\Controllers\HomeController::class, 'invitations'])->name('invitations');
        Route::get('/withdraw/{id}', [App\Http\Controllers\HomeController::class, 'withdraw'])->name('withdraw');
        Route::get('/accept/{id}', [App\Http\Controllers\HomeController::class, 'accept'])->name('accept');
        Route::get('/decline/{id}', [App\Http\Controllers\HomeController::class, 'declinebazar'])->name('decline');
        Route::get('/viewprofile/{id}', [App\Http\Controllers\HomeController::class, 'viewprofile'])->name('viewprofile');
        Route::get('/myprofile', [App\Http\Controllers\HomeController::class, 'myprofile'])->name('myprofile');
        Route::get('/carbazar', [App\Http\Controllers\HomeController::class, 'carbazar'])->name('carbazar');
        Route::get('/carbazarlist/{id}', [App\Http\Controllers\HomeController::class, 'carbazarlist'])->name('carbazarlist');

        Route::get('/privacy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy');
        Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
        Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
        Route::post('/postcontact', [App\Http\Controllers\HomeController::class, 'postcontact'])->name('postcontact');
        Route::post('/updateimages', [App\Http\Controllers\HomeController::class, 'updateimages'])->name('updateimages');
        Route::post('/saveprofiles', [App\Http\Controllers\HomeController::class, 'saveprofiles'])->name('saveprofiles');
        Route::post('/saveexper', [App\Http\Controllers\HomeController::class, 'saveexper'])->name('saveexper');

        Route::get('/mybazar', [App\Http\Controllers\HomeController::class, 'mybazar'])->name('mybazar');
        Route::get('/bazardetails/{id}', [App\Http\Controllers\HomeController::class, 'bazardetails'])->name('bazardetails');
        Route::get('/addbazarpack/{id}', [App\Http\Controllers\HomeController::class, 'addbazarpack'])->name('addbazarpack');
        Route::get('/checkoutbazarpack/{id}', [App\Http\Controllers\HomeController::class, 'checkoutbazarpack'])->name('checkoutbazarpack');

        Route::get('/checkbazarpay', [App\Http\Controllers\HomeController::class, 'checkbazarpay'])->name('checkbazarpay');
        Route::get('/deletepack/{id}', [App\Http\Controllers\HomeController::class, 'deletepack'])->name('deletepack');

        Route::get('/createbazar', [App\Http\Controllers\HomeController::class, 'createbazar'])->name('createbazar');
        Route::post('/postbazar', [App\Http\Controllers\HomeController::class, 'postbazar'])->name('postbazar');

        Route::get('/getcarmodel', [App\Http\Controllers\HomeController::class, 'getcarmodel'])->name('getcarmodel');

        Route::get('/adcartobazar/{id}', [App\Http\Controllers\HomeController::class, 'adcartobazar'])->name('adcartobazar');
        Route::post('/postaddcartobazar', [App\Http\Controllers\HomeController::class, 'postaddcartobazar'])->name('postaddcartobazar');

        Route::get('/carsonmybazar/{id}', [App\Http\Controllers\HomeController::class, 'carsonmybazar'])->name('carsonmybazar');
        Route::get('/editcaronbazar/{id}', [App\Http\Controllers\HomeController::class, 'editcaronbazar'])->name('editcaronbazar');

        Route::post('/editcaronbazarpost', [App\Http\Controllers\HomeController::class, 'editcaronbazarpost'])->name('editcaronbazarpost');

        Route::get('/deletecar/{id}', [App\Http\Controllers\HomeController::class, 'deletecar'])->name('deletecar');
        Route::get('/deletebazar/{id}', [App\Http\Controllers\HomeController::class, 'deletebazar'])->name('deletebazar');

        Route::get('/mycarbookings', [App\Http\Controllers\HomeController::class, 'mycarbookings'])->name('mycarbookings');
        Route::get('/usedeletebooking/{id}', [App\Http\Controllers\HomeController::class, 'usedeletebooking'])->name('usedeletebooking');

        Route::get('/myhomebookings', [App\Http\Controllers\HomeController::class, 'myhomebookings'])->name('myhomebookings');
        Route::get('/udeletehome/{id}', [App\Http\Controllers\HomeController::class, 'usedeletebooking'])->name('udeletehome');
        // pay for pending data
        Route::get('/makepayment/{id}', [App\Http\Controllers\HomeController::class, 'payfromrecords'])->name('makepayment');
        Route::get('/makepayment2/{id}', [App\Http\Controllers\HomeController::class, 'carbookpayfromrecords'])->name('makepayment2');


        //network connect chat
        Route::get('/network', [App\Http\Controllers\NetworkController::class, 'index'])->name('network');
        Route::get('/chat/{user_id}', [App\Http\Controllers\NetworkController::class, 'chat'])->name('chat');
        Route::post('/postmsg', [App\Http\Controllers\NetworkController::class, 'insertMessage'])->name('postmsg');
        Route::get('/getchats/{user_id}', [App\Http\Controllers\NetworkController::class, 'getchats'])->name('getchats');
        Route::post('/searchUsers', [App\Http\Controllers\NetworkController::class, 'searchUsers'])->name('search.users');
        Route::get('/getMessages', [App\Http\Controllers\NetworkController::class, 'getMessages'])->name('getMessages');

        // Rider routes
 
    Route::group(['prefix' => 'rider', 'middleware' => 'rider'], function () {

        Route::get('/rider', [App\Http\Controllers\RiderController::class, 'index'])->name('rider');
        Route::get('/pendingriderdelivery', [App\Http\Controllers\RiderController::class, 'pendingriderdelivery'])->name('pendingriderdelivery');
        Route::get('/completeriderdelivery', [App\Http\Controllers\RiderController::class, 'completeriderdelivery'])->name('completeriderdelivery');
        Route::get('/pickorder/{id}', [App\Http\Controllers\RiderController::class, 'pickorder'])->name('pickorder');
        Route::get('/riderdelivered/{id}', [App\Http\Controllers\RiderController::class, 'riderdelivered'])->name('riderdelivered');
        Route::get('/ridertransactions', [App\Http\Controllers\RiderController::class, 'transcations'])->name('ridertransactions');
        Route::post('/debitnow', [App\Http\Controllers\RiderController::class, 'withdraw'])->name('debitnow');
        Route::get('/contactus', [App\Http\Controllers\RiderController::class, 'contactus'])->name('contactus');
        Route::get('/privacypolicy', [App\Http\Controllers\RiderController::class, 'privacypolicy'])->name('privacypolicy');
        
        Route::get('/riderprofileedit', [App\Http\Controllers\RiderController::class, 'editProfile'])->name('riderprofileedit');
        Route::post('/rider/profile/update',[App\Http\Controllers\RiderController::class, 'updateProfile'])->name('rider.profile.update');
        
        
    });

    Route::group(['prefix' => 'rider'], function () {


            Route::get('/login',  [App\Http\Controllers\RiderController::class, 'showLoginForm'])->name('rider.login');
            Route::post('/login',  [App\Http\Controllers\RiderController::class, 'login']);
            Route::post('/logout',  [App\Http\Controllers\RiderController::class, 'logout'])->name('rider.logout');
            
            Route::get('/register',  [App\Http\Controllers\RiderController::class, 'showRegistrationForm'])->name('rider.register');
            // Route for handling registration form submission
            Route::post('/register',  [App\Http\Controllers\RiderController::class, 'register']);
    
        
        
    }); 


        // end of rider

        Route::middleware(['admin'])->group(function () {

            // admin routes
            Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
            Route::get('/addnewcarwash', [App\Http\Controllers\AdminController::class, 'addnewcarwash'])->name('addnewcarwash');
            Route::post('/addnewcarwashpost', [App\Http\Controllers\AdminController::class, 'addnewcarwashpost'])->name('addnewcarwashpost');
            Route::get('/admineditcarwash/{id}', [App\Http\Controllers\AdminController::class, 'admineditcarwash'])->name('admineditcarwash');
            Route::post('/admineditcarwashpost', [App\Http\Controllers\AdminController::class, 'admineditcarwashpost'])->name('admineditcarwashpost');
            Route::get('/carwashlist', [App\Http\Controllers\AdminController::class, 'carwashlist'])->name('carwashlist');
            Route::get('/deletecarwash/{id}', [App\Http\Controllers\AdminController::class, 'deletecarwash'])->name('deletecarwash');

            Route::get('/makeadmin/{id}', [App\Http\Controllers\AdminController::class, 'makeadmin'])->name('makeadmin');
            Route::get('/makecleaner/{id}', [App\Http\Controllers\AdminController::class, 'makecleaner'])->name('makecleaner');
            Route::get('/makeuser/{id}', [App\Http\Controllers\AdminController::class, 'makeuser'])->name('makeuser');
            Route::get('/makecleaner/{id}', [App\Http\Controllers\AdminController::class, 'makecleaner'])->name('makecleaner');

            // admin data
            // Route::get('/admins', [App\Http\Controllers\AdminController::class, 'index'])->name('admins');
            Route::get('/staff', [App\Http\Controllers\AdminController::class, 'staff'])->name('staff');
            Route::get('/branch', [App\Http\Controllers\AdminController::class, 'branch'])->name('branch');
            Route::post('/poststaff', [App\Http\Controllers\AdminController::class, 'poststaff'])->name('poststaff');
            Route::get('/services', [App\Http\Controllers\AdminController::class, 'services'])->name('services');
            Route::get('/viewservice/{id}', [App\Http\Controllers\AdminController::class, 'viewservice'])->name('viewservice');
            Route::get('/editservice/{id}', [App\Http\Controllers\AdminController::class, 'editservice'])->name('editservice');
            Route::post('/editservicepost', [App\Http\Controllers\AdminController::class, 'editservicepost'])->name('editservicepost');
            Route::get('/delservice/{id}', [App\Http\Controllers\AdminController::class, 'destroyservice'])->name('delservice');
            Route::get('/addservice', [App\Http\Controllers\AdminController::class, 'addservice'])->name('addservice');
            Route::post('/addservicepost', [App\Http\Controllers\AdminController::class, 'addservicepost'])->name('addservicepost');

            Route::get('/categories', [App\Http\Controllers\AdminController::class, 'categories'])->name('categories');
            Route::get('/addcategories', [App\Http\Controllers\AdminController::class, 'addcategories'])->name('addcategories');
            Route::get('/delcategs/{id}', [App\Http\Controllers\AdminController::class, 'delcategs'])->name('delcategs');
            Route::get('/editcat/{id}', [App\Http\Controllers\AdminController::class, 'editcat'])->name('editcat');
            Route::post('/editcatpost', [App\Http\Controllers\AdminController::class, 'editcatpost'])->name('editcatpost');
            Route::post('/postcategory', [App\Http\Controllers\AdminController::class, 'postcategory'])->name('postcategory');
            Route::get('/addcategoryservices', [App\Http\Controllers\AdminController::class, 'addcategoryservices'])->name('addcategoryservices');
            Route::post('/postcatservices', [App\Http\Controllers\AdminController::class, 'postcatservices'])->name('postcatservices');
            Route::get('/categoryservices', [App\Http\Controllers\AdminController::class, 'categoryservices'])->name('categoryservices');
            Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
            Route::get('/messages', [App\Http\Controllers\AdminController::class, 'messages'])->name('messages');
            Route::get('/bookings', [App\Http\Controllers\AdminController::class, 'bookings'])->name('bookings');

            Route::get('/pendingbookings', [App\Http\Controllers\AdminController::class, 'pendingbookings'])->name('pendingbookings');
            Route::get('/carwashpacks', [App\Http\Controllers\AdminController::class, 'categories'])->name('carwashpacks');
            Route::get('/carwashbranches', [App\Http\Controllers\AdminController::class, 'carwashbranches'])->name('carwashbranches');
            Route::get('/carwashservices', [App\Http\Controllers\AdminController::class, 'carwashservices'])->name('carwashservices');
            Route::get('/carwashpersonel', [App\Http\Controllers\AdminController::class, 'carwashpersonel'])->name('carwashpersonel');

            Route::get('/editcategory/{id}', [App\Http\Controllers\AdminController::class, 'editcategory'])->name('editcategory');
            Route::post('/posteditcategory', [App\Http\Controllers\AdminController::class, 'posteditcategory'])->name('posteditcategory');
            Route::get('/deletecarwashpack/{id}', [App\Http\Controllers\AdminController::class, 'deletecarwashpack'])->name('deletecarwashpack');



            Route::get('/delusers/{id}', [App\Http\Controllers\AdminController::class, 'delusers'])->name('delusers');
            Route::get('/declinebazar/{id}', [App\Http\Controllers\AdminController::class, 'declinebazar'])->name('declinebazar');
            Route::get('/declinebazar/{id}', [App\Http\Controllers\AdminController::class, 'declinebazar'])->name('declinebazar');

            Route::post('/createservice', [App\Http\Controllers\AdminController::class, 'createservice'])->name('createservice');

            Route::get('/editbook/{id}', [App\Http\Controllers\AdminController::class, 'editbook'])->name('editbooking');
            Route::post('/updatebookingpost', [App\Http\Controllers\AdminController::class, 'updatebookingpost'])->name('updatebookingpost');
            Route::get('/delbooks/{id}', [App\Http\Controllers\AdminController::class, 'delbooks'])->name('delbooks');
            Route::get('/homecareservices', [App\Http\Controllers\AdminController::class, 'homecareservices'])->name('homecareservices');
            Route::get('/addhomecareservice', [App\Http\Controllers\AdminController::class, 'addhomecareservice'])->name('addhomecareservice');
            Route::post('/admincreatehomeservice', [App\Http\Controllers\AdminController::class, 'admincreatehomeservice'])->name('admincreatehomeservice');
            Route::get('/listedcars', [App\Http\Controllers\AdminController::class, 'listedcars'])->name('listedcars');
            Route::get('/editlisting/{id}', [App\Http\Controllers\AdminController::class, 'editlisting'])->name('editlisting');
            Route::post('/updatelistingpost', [App\Http\Controllers\AdminController::class, 'updatelistingpost'])->name('updatelistingpost');
            Route::get('/dellisting/{id}', [App\Http\Controllers\AdminController::class, 'dellisting'])->name('dellisting');
            Route::get('/homecarebookings', [App\Http\Controllers\AdminController::class, 'homecarebookings'])->name('homecarebookings');
            Route::get('/bazarpackages', [App\Http\Controllers\AdminController::class, 'bazarpackages'])->name('bazarpackages');
            Route::get('/bazarsubscriptions', [App\Http\Controllers\AdminController::class, 'bazarsubscriptions'])->name('bazarsubscriptions');

            Route::get('/viewuserprofile/{id}', [App\Http\Controllers\AdminController::class, 'viewuserprofile'])->name('viewuserprofile');
            Route::get('/networkprofiles', [App\Http\Controllers\AdminController::class, 'networkprofiles'])->name('networkprofiles');
            Route::get('/networkexperience', [App\Http\Controllers\AdminController::class, 'networkexperience'])->name('networkexperience');
            Route::get('/connections', [App\Http\Controllers\AdminController::class, 'connections'])->name('connections');
            Route::get('/hybridpacks', [App\Http\Controllers\AdminController::class, 'hybridpacks'])->name('hybridpacks');
            Route::get('/hybridpackservices', [App\Http\Controllers\AdminController::class, 'hybridpackservices'])->name('hybridpackservices');

            Route::get('/riderreferees', [App\Http\Controllers\AdminController::class, 'riderreferees'])->name('riderreferees');
            Route::get('/riderwallets', [App\Http\Controllers\AdminController::class, 'riderwallets'])->name('riderwallets');
            Route::get('/ridertrans', [App\Http\Controllers\AdminController::class, 'ridertrans'])->name('ridertrans');
            Route::get('/vmodels', [App\Http\Controllers\AdminController::class, 'vmodels'])->name('vmodels');
            Route::get('/vmakes', [App\Http\Controllers\AdminController::class, 'vmakes'])->name('vmakes');

            Route::get('/edithomecareservice/{id}', [App\Http\Controllers\AdminController::class, 'edithomecareservice'])->name('edithomecareservice');
            Route::get('/delhomecarebook/{id}', [App\Http\Controllers\AdminController::class, 'delhomecarebook'])->name('delhomecarebook');
            Route::post('/edithomecareservicepost', [App\Http\Controllers\AdminController::class, 'edithomecareservicepost'])->name('edithomecareservicepost');
            Route::get('/slides', [App\Http\Controllers\AdminController::class, 'slides'])->name('slides');
            Route::get('/addslides', [App\Http\Controllers\AdminController::class, 'addslides'])->name('addslides');
            Route::get('/editslide/{id}', [App\Http\Controllers\AdminController::class, 'editslide'])->name('editslide');
            Route::post('/addslidespost', [App\Http\Controllers\AdminController::class, 'addslidespost'])->name('addslidespost');
            Route::post('/editslidespost', [App\Http\Controllers\AdminController::class, 'editslidespost'])->name('editslidespost');
            Route::get('/delslide/{id}', [App\Http\Controllers\AdminController::class, 'delslide'])->name('delslide');
            Route::get('/riders', [App\Http\Controllers\AdminController::class, 'riders'])->name('riders');
            Route::post('/addrider', [App\Http\Controllers\AdminController::class, 'addrider'])->name('addrider');
            Route::post('/updateridernow', [App\Http\Controllers\AdminController::class, 'updateridernow'])->name('updateridernow');

            Route::get('/editrider/{id}', [App\Http\Controllers\AdminController::class, 'editrider'])->name('editrider');

            Route::get('/delrider/{id}', [App\Http\Controllers\AdminController::class, 'delrider'])->name('delrider');
            Route::get('/carinquiry', [App\Http\Controllers\AdminController::class, 'carinquiry'])->name('carinquiry');
            Route::get('/carinquirymark/{id}', [App\Http\Controllers\AdminController::class, 'carinquirymark'])->name('carinquirymark');
            Route::get('/delinq/{id}', [App\Http\Controllers\AdminController::class, 'delinq'])->name('delinq');
            Route::get('/markmessage/{id}', [App\Http\Controllers\AdminController::class, 'markmessage'])->name('markmessage');
            Route::get('/editrider/{id}', [App\Http\Controllers\AdminController::class, 'editrider'])->name('editrider');
            Route::post('/updateriderpost', [App\Http\Controllers\AdminController::class, 'updateriderpost'])->name('updateriderpost');
            Route::post('/addproductpost', [App\Http\Controllers\AdminController::class, 'addproductpost'])->name('addproductpost');
            Route::get('/product', [App\Http\Controllers\AdminController::class, 'product'])->name('product');
            Route::get('/editproduct/{id}', [App\Http\Controllers\AdminController::class, 'editproduct'])->name('editproduct');
            Route::get('/deleteproduct/{id}', [App\Http\Controllers\AdminController::class, 'deleteproduct'])->name('deleteproduct');
            Route::post('/updateproductpost', [App\Http\Controllers\AdminController::class, 'updateproductpost'])->name('updateproductpost');
            Route::get('/barzarslist', [App\Http\Controllers\AdminController::class, 'barzarslist'])->name('barzarslist');
            Route::get('/pendingbarzars', [App\Http\Controllers\AdminController::class, 'pendingbarzars'])->name('pendingbarzars');
            Route::get('/declinedbarzars', [App\Http\Controllers\AdminController::class, 'declinedbarzars'])->name('declinedbarzars');
            Route::get('/approvebazar/{id}', [App\Http\Controllers\AdminController::class, 'approvebazar'])->name('approvebazar');
            Route::get('/denybazar/{id}', [App\Http\Controllers\AdminController::class, 'denybazar'])->name('denybazar');
            Route::post('/addbranch', [App\Http\Controllers\AdminController::class, 'addbranch'])->name('addbranch');
            Route::post('/createrole', [App\Http\Controllers\AdminController::class, 'createrole'])->name('createrole');


            Route::get('/edituser/{id}', [App\Http\Controllers\AdminController::class, 'edituser'])->name('edituser');
            Route::get('/editreferee/{id}', [App\Http\Controllers\AdminController::class, 'showRiderReferees'])->name('editreferee');
            Route::post('/updateRiderReferee', [App\Http\Controllers\AdminController::class, 'updateRiderReferee'])->name('updateRiderReferee');
            Route::get('/delreferees/{id}', [App\Http\Controllers\AdminController::class, 'delreferees'])->name('delreferees');
            Route::get('/showriderwallet/{id}', [App\Http\Controllers\AdminController::class, 'showriderwallet'])->name('showriderwallet');
            Route::post('/updateRiderwallet', [App\Http\Controllers\AdminController::class, 'updateRiderwallet'])->name('updateRiderwallet');

            Route::get('/editwallettrans/{id}', [App\Http\Controllers\AdminController::class, 'editwallettrans'])->name('editwallettrans');
            Route::post('/updateRidertrans', [App\Http\Controllers\AdminController::class, 'updateRidertrans'])->name('updateRidertrans');
            Route::get('/deletetrans/{id}', [App\Http\Controllers\AdminController::class, 'deletetrans'])->name('deletetrans');

            Route::get('/createnewbazar', [App\Http\Controllers\AdminController::class, 'createnewbazar'])->name('createnewbazar');
            Route::post('/createnewbazarpost', [App\Http\Controllers\AdminController::class, 'createnewbazarpost'])->name('createnewbazarpost');
            Route::get('/editbazar/{id}', [App\Http\Controllers\AdminController::class, 'editbazar'])->name('editbazar');
            Route::post('/bazarupdate', [App\Http\Controllers\AdminController::class, 'bazarupdate'])->name('bazarupdate');
            Route::get('/deletetrans/{id}', [App\Http\Controllers\AdminController::class, 'deletetrans'])->name('deletetrans');

            Route::get('/editbazarpackage/{id}', [App\Http\Controllers\AdminController::class, 'editbazarpackage'])->name('editbazarpackage');
            Route::post('/editbazarpackagepost', [App\Http\Controllers\AdminController::class, 'editbazarpackagepost'])->name('editbazarpackagepost');
            Route::get('/deletebazarpack/{id}', [App\Http\Controllers\AdminController::class, 'deletebazarpack'])->name('deletebazarpack');

            Route::post('/updateuserprof', [App\Http\Controllers\AdminController::class, 'updateuserprof'])->name('updateuserprof');
            Route::post('/updateuserimages', [App\Http\Controllers\AdminController::class, 'updateuserimages'])->name('updateuserimages');
            Route::post('/updateuserexp', [App\Http\Controllers\AdminController::class, 'updateuserexp'])->name('updateuserexp');


            Route::get('/adduser', [App\Http\Controllers\AdminController::class, 'adduser'])->name('adduser');
            Route::post('/adduserpost', [App\Http\Controllers\AdminController::class, 'adduserpost'])->name('adduserpost');

            Route::get('/createbazar', [App\Http\Controllers\AdminController::class, 'createbazar'])->name('createbazar');
            Route::post('/createbazapackage', [App\Http\Controllers\AdminController::class, 'createbazapackage'])->name('createbazapackage');


            Route::get('/approvetrans/{id}', [App\Http\Controllers\AdminController::class, 'approvetrans'])->name('approvetrans');
            Route::get('/createrider', [App\Http\Controllers\AdminController::class, 'createrider'])->name('createrider');
            Route::get('/editbazarsubs/{id}', [App\Http\Controllers\AdminController::class, 'editbazarsubs'])->name('editbazarsubs');
            Route::get('/editbazarsubspost', [App\Http\Controllers\AdminController::class, 'editbazarsubspost'])->name('editbazarsubspost');
            Route::get('/delsbazasubs/{id}', [App\Http\Controllers\AdminController::class, 'delsbazasubs'])->name('delsbazasubs');


            // Route to handle the form submission and update the subscription
            Route::put('/subscriptions/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('subscriptions.update');
            Route::get('/addnewcarwashpack', [App\Http\Controllers\AdminController::class, 'addnewcarwashpack'])->name('addnewcarwashpack');
            Route::post('/addnewcarwashpackpost', [App\Http\Controllers\AdminController::class, 'addnewcarwashpackpost'])->name('addnewcarwashpackpost');


            Route::get('/createnewbranch', [App\Http\Controllers\AdminController::class, 'createnewbranch'])->name('createnewbranch');
            Route::post('/createnewbranchpost', [App\Http\Controllers\AdminController::class, 'createnewbranchpost'])->name('createnewbranchpost');
            Route::get('/editbranch/{id}', [App\Http\Controllers\AdminController::class, 'editbranch'])->name('editbranch');
            Route::post('/branchupdatepost', [App\Http\Controllers\AdminController::class, 'branchupdatepost'])->name('branchupdatepost');
            Route::get('/deletebranch/{id}', [App\Http\Controllers\AdminController::class, 'deletebranch'])->name('deletebranch');

            Route::get('/addnewservice', [App\Http\Controllers\AdminController::class, 'addnewservice'])->name('addnewservice');
            Route::post('/createnewservicepost', [App\Http\Controllers\AdminController::class, 'createnewservicepost'])->name('createnewservicepost');
            Route::get('/editcarwashservice/{id}', [App\Http\Controllers\AdminController::class, 'editcarwashservice'])->name('editcarwashservice');
            Route::post('/updateservicepost', [App\Http\Controllers\AdminController::class, 'updateservicepost'])->name('updateservicepost');
            Route::get('/delecarwashserv/{id}', [App\Http\Controllers\AdminController::class, 'delecarwashserv'])->name('delecarwashserv');

            Route::get('/addnewpersonnel', [App\Http\Controllers\AdminController::class, 'addnewpersonnel'])->name('addnewpersonnel');
            Route::post('/createnewpersonnel', [App\Http\Controllers\AdminController::class, 'createnewpersonnel'])->name('createnewpersonnel');
            Route::get('/editpersonnel/{id}', [App\Http\Controllers\AdminController::class, 'editpersonnel'])->name('editpersonnel');
            Route::post('/updatepersonnel', [App\Http\Controllers\AdminController::class, 'updatepersonnel'])->name('updatepersonnel');
            Route::get('/deletepersonnel/{id}', [App\Http\Controllers\AdminController::class, 'deletepersonnel'])->name('deletepersonnel');

            Route::get('/deletebooking/{id}', [App\Http\Controllers\AdminController::class, 'deletebooking'])->name('deletebooking');
            Route::get('/approvebooking/{id}', [App\Http\Controllers\AdminController::class, 'approvebooking'])->name('approvebooking');

            Route::get('/createnewhomecareservice', [App\Http\Controllers\AdminController::class, 'createnewhomecareservice'])->name('createnewhomecareservice');
            Route::post('/createnewhomecareservicepost', [App\Http\Controllers\AdminController::class, 'createnewhomecareservicepost'])->name('createnewhomecareservicepost');
            Route::get('/adminedithomecareservice/{id}', [App\Http\Controllers\AdminController::class, 'adminedithomecareservice'])->name('adminedithomecareservice');
            Route::post('/adminedithomecareservicepost', [App\Http\Controllers\AdminController::class, 'adminedithomecareservicepost'])->name('adminedithomecareservicepost');
            Route::get('/deletehcs/{id}', [App\Http\Controllers\AdminController::class, 'deletehcs'])->name('deletehcs');

            Route::get('/markhomecareaspaid/{id}', [App\Http\Controllers\AdminController::class, 'markhomecareaspaid'])->name('markhomecareaspaid');
            Route::get('/deletehcb/{id}', [App\Http\Controllers\AdminController::class, 'deletehcb'])->name('deletehcb');
            Route::get('/assignrider/{id}', [App\Http\Controllers\AdminController::class, 'assignrider'])->name('assignrider');
            Route::post('/assignriderpost', [App\Http\Controllers\AdminController::class, 'assignriderpost'])->name('assignriderpost');
            Route::get('/assignedorders/{id}', [App\Http\Controllers\AdminController::class, 'assignedorders'])->name('assignedorders');

            Route::get('/editlisting/{id}', [App\Http\Controllers\AdminController::class, 'editlisting'])->name('editlisting');

            Route::get('/addvmake', [App\Http\Controllers\AdminController::class, 'addvmake'])->name('addvmake');
            Route::post('/addvmakepost', [App\Http\Controllers\AdminController::class, 'addvmakepost'])->name('addvmakepost');
            Route::get('/deletemake/{id}', [App\Http\Controllers\AdminController::class, 'deletemake'])->name('deletemake');
            Route::get('/editvmake/{id}', [App\Http\Controllers\AdminController::class, 'editvmake'])->name('editvmake');
            Route::post('/editvmakepost', [App\Http\Controllers\AdminController::class, 'editvmakepost'])->name('editvmakepost');

            Route::get('/addvmodels', [App\Http\Controllers\AdminController::class, 'addvmodels'])->name('addvmodels');
            Route::post('/addvmodelpost', [App\Http\Controllers\AdminController::class, 'addvmodelpost'])->name('addvmodelpost');
            Route::get('/deletevmodel/{id}', [App\Http\Controllers\AdminController::class, 'deletevmodel'])->name('deletevmodel');

            Route::get('/deletebpack/{id}', [App\Http\Controllers\AdminController::class, 'deletebpack'])->name('deletebpack');
            Route::get('/activatehpack/{id}', [App\Http\Controllers\AdminController::class, 'addvmodels'])->name('activatehpack');
            Route::get('/deactivatehpack/{id}', [App\Http\Controllers\AdminController::class, 'deactivatehpack'])->name('deactivatehpack');

            Route::get('/deletebpackservice/{id}', [App\Http\Controllers\AdminController::class, 'deletebpackservice'])->name('deletebpackservice');
            Route::get('/deleteprofile/{id}', [App\Http\Controllers\AdminController::class, 'deleteprofile'])->name('deleteprofile');
            Route::get('/updateuserprofile/{id}', [App\Http\Controllers\AdminController::class, 'updateuserprofile'])->name('updateuserprofile');
            Route::get('/deleteexp/{id}', [App\Http\Controllers\AdminController::class, 'deleteexp'])->name('deleteexp');
            Route::get('/deleteconn/{id}', [App\Http\Controllers\AdminController::class, 'deleteconn'])->name('deleteconn');


            Route::get('/approveconnection/{id}', [App\Http\Controllers\AdminController::class, 'approveconnection'])->name('approveconnection');
            Route::get('/disconectconnection/{id}', [App\Http\Controllers\AdminController::class, 'disconectconnection'])->name('disconectconnection');
            Route::get('/createproduct', [App\Http\Controllers\AdminController::class, 'createproduct'])->name('createproduct');
            Route::post('/createproductpost', [App\Http\Controllers\AdminController::class, 'createproductpost'])->name('createproductpost');
            Route::get('/editproduct/{id}', [App\Http\Controllers\AdminController::class, 'editproduct'])->name('editproduct');
            Route::post('/editproductpost', [App\Http\Controllers\AdminController::class, 'updateproductpost'])->name('editproductpost');
            Route::get('/deleteproduct/{id}', [App\Http\Controllers\AdminController::class, 'deleteproduct'])->name('deleteproduct');

            Route::get('/createslide', [App\Http\Controllers\AdminController::class, 'createslide'])->name('createslide');
            Route::post('/updateprivacy', [App\Http\Controllers\AdminController::class, 'updateprivacy'])->name('updateprivacy');
            Route::get('/adminpolicy', [App\Http\Controllers\AdminController::class, 'privacy'])->name('adminpolicy');
        });

    //   cleaner route
        Route::group(['prefix' => 'cleaner', 'middleware' => 'cleaners'], function () {

            Route::get('/dashboard',  [App\Http\Controllers\CleanerController::class, 'dashboard'])->name('cleaner.dashboard');
            
            Route::get('/completedclbooking',  [App\Http\Controllers\CleanerController::class, 'completed'])->name('cleaner.completedclbooking');
            Route::get('/pendingclbookng',  [App\Http\Controllers\CleanerController::class, 'pending'])->name('cleaner.pendingclbookng');
            Route::get('/dashboard',  [App\Http\Controllers\CleanerController::class, 'dashboard'])->name('cleaner.dashboard');
            Route::get('/dashboard',  [App\Http\Controllers\CleanerController::class, 'dashboard'])->name('cleaner.dashboard');
            


        });


Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');