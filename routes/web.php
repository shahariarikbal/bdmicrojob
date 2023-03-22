<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\MembershipController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\HelpSupportController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;




Route::get('cache', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});
Route::get('flush', function() {

   session()->flush();

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Flushed!";

});


Route::get('/', [FrontendController::class, 'index']);


Auth::routes();

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/video-ads', [HomeController::class, 'ads']);
Route::get('/my-code', [HomeController::class, 'code']);
Route::get('/user/subscription/{id}', [HomeController::class, 'subscription']);
Route::get('/user/membership', [HomeController::class, 'membership']);
Route::get('/user/settings', [HomeController::class, 'profileSettings']);
Route::post('/user/profile/update/{id}', [HomeController::class, 'profileUpdate']);
Route::post('/user/password/update/{id}', [HomeController::class, 'passwordUpdate']);
Route::get('/user/watched-video/{user_id}/{video_id}', [HomeController::class, 'watched_video']);


// ======================== Admin Routes ===================================== //
Route::get('/admin/login', [AdminController::class, 'showLoginForm']);
Route::post('/admin/login', [AdminController::class, 'login']);

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function(){


	Route::get('/dashboard', [AdminController::class, 'dashboard']);
	Route::get('/users', [AdminController::class, 'users']);
	Route::get('/active/{user}', [AdminController::class, 'active']);
	Route::get('/inactive/{user}', [AdminController::class, 'inactive']);
	Route::get('/delete/{user}', [AdminController::class, 'destroy']);
	Route::post('/logout', [AdminController::class, 'logout']);

   Route::get('/video/index', [VideoController::class, 'index']);
   Route::get('/video/create', [VideoController::class, 'create']);
   Route::post('/video/store', [VideoController::class, 'store']);
   Route::get('/video/edit/{id}', [VideoController::class, 'edit']);
   Route::post('/video/update/{id}', [VideoController::class, 'update']);
   Route::post('/video/delete/{id}', [VideoController::class, 'delete']);

   Route::get('/membership/index', [MembershipController::class, 'index']);
   Route::get('/membership/create', [MembershipController::class, 'create']);
   Route::post('/membership/store', [MembershipController::class, 'store']);
   Route::get('/membership/edit/{id}', [MembershipController::class, 'edit']);
   Route::post('/membership/update/{id}', [MembershipController::class, 'update']);
   Route::post('/membership/delete/{id}', [MembershipController::class, 'delete']);

   //Categories....
   Route::get('/categories', [CategoryController::class,'showCategory']);
   Route::get('/category/create', [CategoryController::class,'createCategory']);
   Route::post('/category/store', [CategoryController::class,'storeCategory']);
   //Jobs....
   Route::get('/jobs', [JobController::class,'showJob']);

   //Advertisements....
   Route::get('/advertisements', [AdvertisementController::class,'showAdvertisement']);

   //Advertisements....
   Route::get('/help-support', [HelpSupportController::class,'showHelpSupport']);

   //Deposit Requests....
   Route::get('/deposit/request', [PaymentController::class,'showDepositRequest']);
   Route::get('/deposit/approve/{id}', [PaymentController::class,'approveDeposit']);



});
