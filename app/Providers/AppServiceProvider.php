<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
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
            }
        });
    }
}
