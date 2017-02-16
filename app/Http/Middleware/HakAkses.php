<?php

namespace App\Http\Middleware;

use Closure;

class HakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $akses)
    {
        $respon         =   $next($request);
        if(\Auth::user()->akses!=$akses){
            $respon     =   response(view('errors.404'));
        }
        
        return $respon;
    }
}
