<?php

namespace App\Http\Middleware;

use Closure;


use Session;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd(session()->get('admin_name') );
        if(Session::has('admin_id')){
            return $next($request);
        }

        Session::flash('Error', 'Unauthorised !! Please login first');
        return redirect('/admin/login');
    }
}
