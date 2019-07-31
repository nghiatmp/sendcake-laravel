<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class LoginMiddleware
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
        if(Auth::check()){
             if(Auth::user()->quyen == 1 || Auth::user()->quyen == 2){
                return $next($request);
            }else{
                return redirect('trangchu');
            }
            
        }else{
            return redirect('admin/dangnhap');
        }
        
    }
}
