<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use View;
use App\Http\Controllers\Controller;
use App;
use Redirect;
use Illuminate\Support\Facades\Session;
use Input;
use Entity;
use Illuminate\Http\Request;

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
        if (Auth::user() &&  Auth::user()->type == 1) {
            return $next($request);
     }

        return Redirect::to('/errors');
    }
}
