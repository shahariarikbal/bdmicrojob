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
<<<<<<< HEAD
Route::post('/post/store', [\App\Http\Controllers\Backend\JobController::class, 'postStore']);
=======
>>>>>>> 6dd5d474db8f6bc609689756f926541030880e95
Route::get('/account/varify', [\App\Http\Controllers\UserController::class, 'showAccountVarify']);
Route::get('/my/task', [\App\Http\Controllers\UserController::class, 'showMyTask']);
Route::get('/accepted/task', [\App\Http\Controllers\UserController::class, 'showAcceptedTask']);
Route::get('/job/details', [\App\Http\Controllers\UserController::class, 'showJobDetails']);
Route::get('/job/report', [\App\Http\Controllers\UserController::class, 'showJobReport']);

//Deposit...
Route::get('/instant/deposit', [App\Http\Controllers\Payment\DepositController::class, 'showDeposit']);
Route::post('/store/deposit', [App\Http\Controllers\Payment\DepositController::class, 'storeDeposit']);
