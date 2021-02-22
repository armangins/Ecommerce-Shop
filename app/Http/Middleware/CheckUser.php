<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckUser
{

    public function handle($request, Closure $next)
    {
        
        if (Session::has('id')) {

            return redirect('/home');
        } else {

            return $next($request);

        }

    }
}
