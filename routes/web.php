<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\MembershipController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\HelpSupportController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\TermConditionController;
use App\Http\Controllers\Backend\PrivacyPolicyController;
use App\Http\Controllers\Backend\MarqueeController;
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

// ======================== Static Routes ===================================== //
Route::get('/about', [FrontendController::class, 'aboutUs']);
Route::get('/contact', [FrontendController::class, 'contactUs']);
Route::post('/contact/store', [FrontendController::class, 'contactStore']);
Route::get('/faq', [FrontendController::class, 'showFaq']);
Route::get('/terms/conditions', [FrontendController::class, 'showTermsConditions']);
Route::get('/privacy/policy', [FrontendController::class, 'showPrivacyPolicy']);
Route::get('/user-forum', [FrontendController::class, 'showForum']);
Route::get('/all-blog', [FrontendController::class, 'showBlog']);
Route::get('/blog/details/{id}', [FrontendController::class, 'showBlogDetails']);

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
	Route::get('/visitor/view/{id}', [AdminController::class, 'visitorView']);
	Route::get('/users', [AdminController::class, 'users']);
	Route::get('/all-users', [AdminController::class, 'allUsers']);
	Route::get('/active/{user}', [AdminController::class, 'active']);
	Route::get('/inactive/{user}', [AdminController::class, 'inactive']);
	Route::get('/delete/{user}', [AdminController::class, 'destroy']);
	Route::get('/inactive/users/list', [AdminController::class, 'showInactiveUsers']);
	Route::post('/logout', [AdminController::class, 'logout']);
	Route::get('/profile/update', [AdminController::class, 'adminProfileUpdate']);
	Route::post('/profile/update/{id}', [AdminController::class, 'storeProfileUpdate']);

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
   Route::get('/category/active/{id}', [CategoryController::class,'activeCategory']);
   Route::get('/category/inactive/{id}', [CategoryController::class,'inactiveCategory']);
   Route::get('/category/edit/{id}', [CategoryController::class,'editCategory']);
   Route::post('/category/update/{id}', [CategoryController::class,'updateCategory']);
   //Jobs....
   Route::get('/jobs', [JobController::class,'showJob']);
   Route::get('/pending/jobs', [JobController::class,'showPendingJob']);
   Route::get('/job/details/{id}', [JobController::class,'showJobDetails']);
   Route::get('/job/approve/{id}', [JobController::class,'approveJob']);
   Route::get('/job/reject/{id}', [JobController::class,'rejectJob']);

   //Advertisements....
   Route::get('/advertisements', [AdvertisementController::class,'showAdvertisement']);

   //Advertisements....
   Route::get('/help-support', [HelpSupportController::class,'showHelpSupport']);

   //Deposit Requests....
   Route::get('/deposit/request', [PaymentController::class,'showDepositRequest']);
   Route::get('/deposit/approve/{id}', [PaymentController::class,'approveDeposit']);
   Route::get('/deposit/reject/{id}', [PaymentController::class,'rejectDeposit']);

   //Withdraw Requests....
   Route::get('/withdraw/request', [PaymentController::class,'showWithdrawRequest']);
   Route::get('/withdraw/approve/{id}', [PaymentController::class,'approveWithdraw']);

   //NID Verification Requests....
   Route::get('/nid_verification/request', [AdminController::class,'showVerificationRequest']);
   Route::get('/nid_verification/details/{id}', [AdminController::class,'showVerificationRequestDetails']);
   Route::get('/nid_verification/approve/{id}', [AdminController::class,'approveNidRequest']);
   Route::get('/nid_verification/reject/{id}', [AdminController::class,'rejectNidRequest']);

   //Setting....
   Route::get('/settings', [SettingController::class,'showSetting']);
   Route::post('/settings/update', [SettingController::class,'updateSetting']);

   //Contact Us...
   Route::get('/contacts', [AdminController::class,'showContact']);
   Route::get('/contact/delete/{id}', [AdminController::class,'deleteContact']);

   //Home Page....
   Route::get('/homepage', [AdminController::class,'showHomePage']);
   Route::post('/homepage/update', [AdminController::class,'updateHomePage']);

   //Faq
    Route::get('/faqs', [FaqController::class, 'faqs']);
    Route::get('/faq/create', [FaqController::class, 'createFaq']);
    Route::post('/faq/store', [FaqController::class, 'faqStore']);
    Route::get('/faq/edit/{faq}', [FaqController::class, 'faqEdit']);
    Route::post('/faq/update/{faq}', [FaqController::class, 'faqPost']);
    Route::get('/faq/delete/{faq}', [FaqController::class, 'faqDelete']);

    //Tips....
    Route::get('/tip/{user_id}', [AdminController::class, 'showTip']);
    Route::post('/tip/store/{user_id}', [AdminController::class, 'storeTip']);

    //About Us....
    Route::get('/about-us', [AdminController::class, 'showAboutUs']);
    Route::get('/edit/about-us/{id}', [AdminController::class, 'editAboutUs']);
    Route::post('/update/about-us/{id}', [AdminController::class, 'updateAboutUs']);

    //Term Condition....
    Route::get('/term-condition', [TermConditionController::class, 'showTermCondition']);
    Route::get('/create/term-condition', [TermConditionController::class, 'createTermCondition']);
    Route::post('/store/term-condition', [TermConditionController::class, 'storeTermCondition']);
    Route::get('/edit/term-condition/{id}', [TermConditionController::class, 'editTermCondition']);
    Route::post('/update/term-condition/{id}', [TermConditionController::class, 'updateTermCondition']);
    Route::get('/delete/term-condition/{id}', [TermConditionController::class, 'deleteTermCondition']);

    //Privacy Policy....
    Route::get('/privacy-policy', [PrivacyPolicyController::class, 'showPrivacyPolicy']);
    Route::get('/create/privacy-policy', [PrivacyPolicyController::class, 'createPrivacyPolicy']);
    Route::post('/store/privacy-policy', [PrivacyPolicyController::class, 'storePrivacyPolicy']);
    Route::get('/edit/privacy-policy/{id}', [PrivacyPolicyController::class, 'editPrivacyPolicy']);
    Route::post('/update/privacy-policy/{id}', [PrivacyPolicyController::class, 'updatePrivacyPolicy']);
    Route::get('/delete/privacy-policy/{id}', [PrivacyPolicyController::class, 'deletePrivacyPolicy']);

    //Marquee Text....
    Route::get('/marque-text', [MarqueeController::class, 'showMarqueeText']);
    Route::get('/edit/marque-text/{id}', [MarqueeController::class, 'editMarqueeText']);
    Route::post('/update/marque-text/{id}', [MarqueeController::class, 'updateMarqueeText']);

    //Forum....
    Route::get('/all-forum', [AdminController::class, 'showForum']);
    Route::get('/forum/details/comments/{id}', [AdminController::class, 'showForumDetails']);

    //Blog....
    Route::get('/all-blog', [AdminController::class, 'showBlog']);
    Route::get('/blog/details/{id}', [AdminController::class, 'showBlogDetails']);
    Route::get('create/blog', [AdminController::class, 'createBlog']);
    Route::post('/store/blog', [AdminController::class, 'storeBlog']);
    Route::get('/edit/blog/{id}', [AdminController::class, 'editBlog']);
    Route::post('/update/blog/{id}', [AdminController::class, 'updateBlog']);
    Route::get('/delete/blog/{id}', [AdminController::class, 'deleteBlog']);

});
