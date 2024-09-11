<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AgentCommissionController;
use App\Http\Controllers\Admin\AirbusController;
use App\Http\Controllers\Admin\AirbusTypeController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\BenifitsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyprofileController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TravellerController;
use App\Http\Controllers\Admin\TripClassController;
use App\Http\Controllers\Admin\TripController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\WelcomeController;
use App\Http\Controllers\Website\BookingController;
use App\Http\Controllers\Website\CustomerController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about_us');
Route::get('/gallery/page', [HomeController::class, 'galleryPage'])->name('gallery.page');
Route::get('/video-gallery', [HomeController::class, 'videoGallery'])->name('videoGallery');
Route::get('/our-services', [HomeController::class, 'ourServices'])->name('ourServices');
Route::get('/service-details/{id}', [HomeController::class, 'serviceDetails'])->name('serviceDetails');
Route::get('/contact/page', [HomeController::class, 'contact'])->name('contact.page');
Route::post('/send/message', [HomeController:: class, 'sendMessage'])->name('send.message');
Route::get('/flight-list', [HomeController:: class, 'flightList'])->name('flightList');

Route::get('/flight-booking/{id}', [HomeController:: class, 'flightBooking'])->name('flightBooking');
Route::get('/booking-info', [HomeController:: class, 'BookingInfo'])->name('BookingInfo');
Route::get('/booking-confirm', [HomeController:: class, 'BookingConfirm'])->name('BookingConfirm');
Route::get('/booking-success', [HomeController:: class, 'BookingSuccess'])->name('BookingSuccess');
Route::get('/flight-details', [HomeController:: class, 'flightDetails'])->name('flightDetails');

Route::get('/get-location', [HomeController::class, 'getLocation'])->name('getLocation');
Route::get('/get-location-area', [HomeController::class, 'getLocationArea'])->name('getLocationArea');

//order tracking

Route::get('/tracking', [HomeController::class, 'tracking'])->name('tracking');
Route::post('/order/tracking', [HomeController::class, 'trackingOrder'])->name('order.tracking');

// Search trip
Route::post('/search-trip', [HomeController::class, 'searchTrip'])->name('searchTrip');

Route::get('/select-booking', [BookingController::class, 'selectBooking'])->name('selectBooking');
Route::post('/confirm-booking', [BookingController::class, 'confirmBooking'])->name('confirmBooking');


//user login and registration

Route::get('/agent/login', [CustomerController::class, 'customerLogin'])->name('customerLogin');
Route::post('/customer-login-check', [CustomerController::class, 'customerLoginCheck'])->name('customerLoginCheck');
Route::get('/registration-page', [CustomerController::class, 'customerRegister'])->name('customerRegister');
Route::post('/registration-store', [CustomerController::class, 'customerStore'])->name('customerStore');
Route::get('/my-booking', [CustomerController::class, 'myBooking'])->name('myBooking');
Route::get('/payment-details', [CustomerController::class, 'paymentDetails'])->name('paymentDetails');
Route::get('/travelers', [CustomerController::class, 'travelers'])->name('travelers');


Route::group(['middleware' => 'customerCheck'], function () {
    Route::get('/customer-logout', [CustomerController::class, 'logout'])->name('customer.logout');
    Route::get('/agent-dashboard', [CustomerController::class, 'customerDashboard'])->name('customerDashboard');
    Route::post('/customer-update', [CustomerController::class, 'customerUpdate'])->name('auth.customer.update');
    Route::post('/customer-password-update', [CustomerController::class, 'customerPasswordUpdate'])->name('customerPasswordUpdate');
    Route::post('/customer-address', [CustomerController::class, 'addressChange'])->name('auth.customer.address');
});



Route::group(['middleware' => 'guest'], function() {
    // Authentication
    Route::get('/admin', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'authCheck'])->name('login.check');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/password', [AuthenticationController::class, 'passwordUpdate'])->name('password.change');
    Route::get('/profile', [AuthenticationController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthenticationController::class, 'profileUpdate'])->name('profile.update');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('admin.logout');

    //Category Routes
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/delete', [CategoryController::class, 'destroy'])->name('category.delete');

    //Welcome Routes
    Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome.index');
    Route::post('/welcome/update/{id}', [WelcomeController::class, 'update'])->name('welcome.update');
    

    //Slider Routes
    Route::get('/sliders', [SliderController::class, 'index'])->name('slider.index');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::post('/slider/delete', [SliderController::class, 'destroy'])->name('slider.delete');
    
    //Traveller Say Routes
    Route::get('/traveller', [TravellerController::class, 'index'])->name('traveller.index');
    Route::post('/traveller/store', [TravellerController::class, 'store'])->name('traveller.store');
    Route::get('/traveller/edit/{id}', [TravellerController::class, 'edit'])->name('traveller.edit');
    Route::post('/traveller/update/{id}', [TravellerController::class, 'update'])->name('traveller.update');
    Route::post('/traveller/delete', [TravellerController::class, 'destroy'])->name('traveller.delete');

    //Company Profile Routes
    Route::get('/company/profile', [CompanyprofileController::class, 'index'])->name('company.profile');
    Route::post('/company/profile/update/{id}', [CompanyprofileController::class, 'update'])->name('company.profile.update');
    
    //About Routes
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
    
    //Gallery Routes
    Route::get('/photo/gallery', [GalleryController::class, 'index'])->name('photo.gallery');
    Route::post('/photo/store', [GalleryController::class, 'store'])->name('photo.gallery.store');
    Route::get('/photo/edit/{id}', [GalleryController::class, 'edit'])->name('photo.gallery.edit');
    Route::post('/photo/gallery/update/{id}', [GalleryController::class, 'update'])->name('photo.gallery.update');
    Route::post('/photo/gallery/delete', [GalleryController::class, 'destroy'])->name('photo.gallery.delete');

    //video Gallery Routes
    Route::get('/video/gallery', [VideoController::class, 'index'])->name('video.gallery');
    Route::post('/video/store', [VideoController::class, 'store'])->name('video.gallery.store');
    Route::get('/video/edit/{id}', [VideoController::class, 'edit'])->name('video.gallery.edit');
    Route::post('/video/gallery/update/{id}', [VideoController::class, 'update'])->name('video.gallery.update');
    Route::post('/video/gallery/delete', [VideoController::class, 'destroy'])->name('video.gallery.delete');

  


    //service Routes
    Route::get('/services', [ServicesController::class, 'index'])->name('service.index');
    Route::post('/services/store', [ServicesController::class, 'store'])->name('service.store');
    Route::get('/services/edit/{id}', [ServicesController::class, 'edit'])->name('service.edit');
    Route::post('/services/update/{id}', [ServicesController::class, 'update'])->name('service.update');
    Route::post('/services/delete', [ServicesController::class, 'destroy'])->name('service.delete');

    //benefits Routes
    Route::get('/benefits', [BenifitsController::class, 'index'])->name('benefit.index');
    // Route::post('/benefits/store', [BenifitsController::class, 'store'])->name('benefit.store');
    // Route::get('/benefits/edit/{id}', [BenifitsController::class, 'edit'])->name('benefit.edit');
    Route::post('/benefits/update', [BenifitsController::class, 'update'])->name('benefit.update');
    // Route::post('/benefits/delete', [BenifitsController::class, 'destroy'])->name('benefit.delete');
    
    // Public Message Routes
    Route::get('/messages', [ContactController::class, 'index'])->name('messages.index');
    Route::post('/message/delete', [ContactController::class, 'destroy'])->name('message.delete');

 
    //airbus type Routes
    Route::get('/airbus-type', [AirbusTypeController::class, 'index'])->name('airbusType.index');
    Route::post('/airbus-type/store', [AirbusTypeController::class, 'store'])->name('airbusType.store');
    Route::get('/airbus-type/edit/{id}', [AirbusTypeController::class, 'edit'])->name('airbusType.edit');
    Route::post('/airbus-type/update/{id}', [AirbusTypeController::class, 'update'])->name('airbusType.update');
    Route::post('/airbus-type/delete', [AirbusTypeController::class, 'destroy'])->name('airbusType.delete');


    //Trip Class Routes
    Route::get('/trip-class', [TripClassController::class, 'index'])->name('tripClass.index');
    Route::post('/tripClass/store', [TripClassController::class, 'store'])->name('tripClass.store');
    Route::get('/trip-class/edit/{id}', [TripClassController::class, 'edit'])->name('tripClass.edit');
    Route::post('/tripClass/update/{id}', [TripClassController::class, 'update'])->name('tripClass.update');
    Route::post('/tripClass/delete', [TripClassController::class, 'destroy'])->name('tripClass.delete');

    //location Routes
    Route::get('/location', [LocationController::class, 'index'])->name('location.index');
    Route::post('/location/store', [LocationController::class, 'store'])->name('location.store');
    Route::get('/location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');
    Route::post('/location/update/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::post('/location/delete', [LocationController::class, 'destroy'])->name('location.delete');


    //airbus Routes
    Route::get('/airbus', [AirbusController::class, 'index'])->name('airbus.index');
    Route::post('/airbus/store', [AirbusController::class, 'store'])->name('airbus.store');
    Route::get('/airbus/edit/{id}', [AirbusController::class, 'edit'])->name('airbus.edit');
    Route::post('/airbus/update/{id}', [AirbusController::class, 'update'])->name('airbus.update');
    Route::post('/airbus/delete', [AirbusController::class, 'destroy'])->name('airbus.delete');

    
    //Trip Class Routes
    Route::get('/trip-entry', [TripController::class, 'index'])->name('trip.index');
    Route::get('/trip-booking/{id}', [TripController::class, 'tripbooking'])->name('trip.booking');
    Route::post('/trip/store', [TripController::class, 'store'])->name('trip.store');
    Route::get('/trip/edit/{id}', [TripController::class, 'edit'])->name('trip.edit');
    Route::get('/bookintrip/edit/{id}', [TripController::class, 'bookintrip'])->name('bookintrip.edit');
    Route::post('/trip/update/{id}', [TripController::class, 'update'])->name('trip.update');
    Route::post('/trip/delete', [TripController::class, 'destroy'])->name('trip.delete');

    Route::get('/get-airbus/{id}', [TripController::class, 'getAirbus'])->name('getAirbus');

    // booking list
    Route::get('/booking-list', [BookingController::class, 'bookingList'])->name('bookingList');
    Route::get('/booking-pending-list', [BookingController::class, 'bookingPendingList'])->name('bookingPendingList');
    Route::get('/agent-booking-list', [BookingController::class, 'agentBookingList'])->name('agentBookingList');

    Route::get('/booking-view/{id}', [BookingController::class, 'bookingView'])->name('bookingView');
    Route::get('/trip-booking-view/{id}', [BookingController::class, 'tripBookingView'])->name('tripBookingView');
    Route::post('/booking-delete', [BookingController::class, 'bookingDelete'])->name('bookingDelete');
    Route::post('/booking-delete', [BookingController::class, 'bookingDelete'])->name('bookingDelete');
    Route::get('/order/confirm/{id}',[BookingController::class,'orderConfirm'])->name('orderConfirm');

    //agent emtry
    Route::get('/add-agent', [CustomerController::class, 'addAgent'])->name('addAgent');
    Route::post('/store-agent', [CustomerController::class, 'storeAgent'])->name('storeAgent');
    Route::get('/edit-agent/{id}', [CustomerController::class, 'editAgent'])->name('editAgent');
    Route::post('/delete-agent', [CustomerController::class, 'deleteAgent'])->name('deleteAgent');
    Route::get('/agent-list', [CustomerController::class, 'agentList'])->name('agentList');
    Route::get('/agentDue-list', [CustomerController::class, 'agentDueList'])->name('agentDueList');



    Route::get('/get-agent', [CustomerController::class, 'getAgent'])->name('getAgent');



    Route::get('/agent/inactive/{id}', [CustomerController::class, 'inactive'])->name('agent.inactive');
    Route::get('/agent/active/{id}', [CustomerController::class, 'active'])->name('agent.active');

    //agent commission emtry
    Route::get('/agent-commission', [AgentCommissionController::class, 'agentCommission'])->name('agentCommission');
    Route::post('/agent-commission/store', [AgentCommissionController::class, 'agentCommissionStore'])->name('agentCommissionStore');
    Route::get('/agent-commission/edit/{id}', [AgentCommissionController::class, 'agentCommissionEdit'])->name('agentCommissionEdit');
    Route::post('/agent-commission/update/{id}', [AgentCommissionController::class, 'agentCommissionUpdate'])->name('agentCommissionUpdate');
    Route::post('/agent-commission/delte', [AgentCommissionController::class, 'agentCommissionDelete'])->name('agentCommissionDelete');

   
    
});
Route::post('/update-agent/{id}', [CustomerController::class, 'updateAgent'])->name('updateAgent');
