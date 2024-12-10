<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Task_bar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::guard('admin')->check()) {
            view()->share('layout', 'admin.TaskBar');
        } 
        // إذا كان المستخدم عادي
        elseif (Auth::guard("web")->check()) {
            view()->share('layout', 'index');
        } 


        elseif(auth()->guard("super_admin")->check()){

            view()->share('layout', 'super_admin.TaskBar');


        }

        // إذا لم يكن مسجل دخول
        else {
            return redirect()->route('my_index');
        }


        return $next($request);


    }
}
