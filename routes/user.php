<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\MembershipController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\HelpSupportController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Payment\DepositController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/user/register/form', [\App\Http\Controllers\UserController::class, 'userRegister']);
Route::post('/user/register', [\App\Http\Controllers\UserController::class, 'userRegisterStore']);

Route::get('/post/job', [\App\Http\Controllers\UserController::class, 'showPostJob']);
Route::post('/post/store', [\App\Http\Controllers\Backend\JobController::class, 'postStore']);
Route::get('/account/varify', [\App\Http\Controllers\UserController::class, 'showAccountVarify']);
Route::post('/account/varify/store', [\App\Http\Controllers\UserController::class, 'storeAccountVerify']);
Route::get('/my/task', [\App\Http\Controllers\UserController::class, 'showMyTask']);
Route::get('/accepted/task', [\App\Http\Controllers\UserController::class, 'showAcceptedTask']);
Route::get('/job/details/{id}', [\App\Http\Controllers\UserController::class, 'showJobDetails']);
Route::get('/job/report/{id}', [\App\Http\Controllers\UserController::class, 'showJobReport']);
Route::post('/report/submit/{id}', [\App\Http\Controllers\UserController::class, 'submitJobReport']);
Route::get('/my/post', [\App\Http\Controllers\UserController::class, 'showMyPost']);
Route::post('/post/submit/{id}', [\App\Http\Controllers\UserController::class, 'postSubmit']);
Route::get('/submitted/job', [\App\Http\Controllers\UserController::class, 'showSubmittedJob']);

//Deposit and Withdraw...
Route::get('/instant/deposit', [App\Http\Controllers\Payment\DepositController::class, 'showDeposit']);
Route::post('/store/deposit', [App\Http\Controllers\Payment\DepositController::class, 'storeDeposit']);
Route::get('/instant/withdraw', [App\Http\Controllers\Payment\DepositController::class, 'showWithdraw']);
Route::post('/withdraw/earning', [App\Http\Controllers\Payment\DepositController::class, 'withdrawEarning']);

//Notification Seen....
Route::get('/nid_notification_seen/{id}', [\App\Http\Controllers\UserController::class, 'nidNotificationSeen']);
Route::get('/deposit_notification_seen/{id}', [\App\Http\Controllers\UserController::class, 'depositNotificationSeen']);
Route::get('/withdraw_notification_seen/{id}', [\App\Http\Controllers\UserController::class, 'withdrawNotificationSeen']);
