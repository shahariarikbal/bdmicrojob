<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\PostSubmit;
use App\Models\NidVerification;
use App\Models\Withdraw;
use Auth;
use DB;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);

        view()->composer('*', function($view){
            if(Auth::check()){
                $view->with('total_deposit',User::where('id',Auth::user()->id)->first(['total_deposit']));
                $view->with('verification',NidVerification::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->first());
                $view->with('verification_requested',NidVerification::where('user_id',Auth::user()->id)->count());
                $view->with('withdraw', Withdraw::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->first());
                $view->with('withdraw_requested', Withdraw::where('user_id',Auth::user()->id)->count());
            }
        });

        view()->composer('*', function($view){
            if(Auth::check()){
                $view->with('total_income',User::where('id',Auth::user()->id)->first(['total_income']));

                $view->with('user_notification_count', DB::table('notifications')->
                where('specific_user_id',Auth::user()->id)
                ->where('notification_for','user')->where('is_seen','!=','1')->count());

                $view->with('user_notifications', DB::table('notifications')
                ->where('specific_user_id',Auth::user()->id)->where('notification_for','user')
                ->where('is_seen','!=','1')->orderBy('created_at','desc')->get());

                $view->with('submitted_pending_job', PostSubmit::where('job_owner_id', Auth::user()->id)->where('status','0')->count());
            }
            $view->with('setting', DB::table('settings')->first());
        });
    }
}
