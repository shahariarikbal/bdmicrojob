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
Route::get('/verification/{token}', [\App\Http\Controllers\UserController::class, 'verification']);
Route::get('/forgot/password', [\App\Http\Controllers\UserController::class, 'showForgotPassword']);
Route::post('/store/forgot/password', [\App\Http\Controllers\UserController::class, 'storeForgotPassword']);

Route::get('/post/job', [\App\Http\Controllers\UserController::class, 'showPostJob']);
Route::post('/post/store', [\App\Http\Controllers\Backend\JobController::class, 'postStore']);
Route::get('/account/varify', [\App\Http\Controllers\UserController::class, 'showAccountVarify']);
Route::post('/account/varify/store', [\App\Http\Controllers\UserController::class, 'storeAccountVerify']);
Route::get('/account/varify/history', [\App\Http\Controllers\UserController::class, 'historyAccountVerify']);
Route::get('/my/task', [\App\Http\Controllers\UserController::class, 'showMyTask']);
Route::get('/accepted/task', [\App\Http\Controllers\UserController::class, 'showAcceptedTask']);
Route::get('/job/details/{id}', [\App\Http\Controllers\UserController::class, 'showJobDetails']);
Route::get('/job/report/{id}', [\App\Http\Controllers\UserController::class, 'showJobReport']);
Route::post('/report/submit/{id}', [\App\Http\Controllers\UserController::class, 'submitJobReport']);
Route::get('/my/post', [\App\Http\Controllers\UserController::class, 'showMyPost']);
Route::post('/post/submit/{id}', [\App\Http\Controllers\UserController::class, 'postSubmit']);
Route::get('/submitted/job/pending', [\App\Http\Controllers\UserController::class, 'showSubmittedPendingJob']);
Route::get('/submitted/job/approved', [\App\Http\Controllers\UserController::class, 'showSubmittedApprovedJob']);
Route::get('/submitted/job/rejected', [\App\Http\Controllers\UserController::class, 'showSubmittedRejectedJob']);
// Route::get('/post/delete/{id}', [\App\Http\Controllers\UserController::class, 'postDelete']);
Route::get('/post/edit/{id}', [\App\Http\Controllers\UserController::class, 'postEdit']);
Route::get('/submitted/job', [\App\Http\Controllers\UserController::class, 'showSubmittedJob']);
Route::get('/submitted/job/details/{id}', [\App\Http\Controllers\UserController::class, 'showSubmittedJobDetails']);
Route::get('/submitted/job/approve/{id}', [\App\Http\Controllers\UserController::class, 'submittedJobApprove']);
Route::get('/submitted/job/reject/{id}', [\App\Http\Controllers\UserController::class, 'submittedJobReject']);
Route::get('/profile/update', [\App\Http\Controllers\UserController::class, 'userProfileUpdate']);
Route::post('/profile/update/{id}', [\App\Http\Controllers\UserController::class, 'storeProfileUpdate']);
Route::post('/password/update/{id}', [\App\Http\Controllers\UserController::class, 'storePasswordUpdate']);

//Deposit and Withdraw...
Route::get('/instant/deposit', [App\Http\Controllers\Payment\DepositController::class, 'showDeposit']);
Route::post('/store/deposit', [App\Http\Controllers\Payment\DepositController::class, 'storeDeposit']);
Route::get('/instant/withdraw', [App\Http\Controllers\Payment\DepositController::class, 'showWithdraw']);
Route::post('/withdraw/earning', [App\Http\Controllers\Payment\DepositController::class, 'withdrawEarning']);
Route::get('/instant/deposit/history', [App\Http\Controllers\Payment\DepositController::class, 'showDepositHistory']);
Route::get('/instant/withdraw/history', [App\Http\Controllers\Payment\DepositController::class, 'showWithdrawHistory']);

//Notification Seen....
Route::get('/nid_notification_seen/{id}', [\App\Http\Controllers\UserController::class, 'nidNotificationSeen']);
Route::get('/deposit_notification_seen/{id}', [\App\Http\Controllers\UserController::class, 'depositNotificationSeen']);
Route::get('/withdraw_notification_seen/{id}', [\App\Http\Controllers\UserController::class, 'withdrawNotificationSeen']);
Route::get('/tip_notification_seen/{id}', [\App\Http\Controllers\UserController::class, 'tipNotificationSeen']);
