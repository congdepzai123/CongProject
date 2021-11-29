<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


class AccessPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request  $request, Closure $next)
    {
        if(Auth::user()->hasAnyRoles(['admin','author'])){
            return $next($request);
        }
        return redirect('/dashboard');
    }
}
