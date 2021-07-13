<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->route()->parameter('name'));
        if(strtolower($request->route()->parameter('name')) == 'tamer'){
            return $next($request);

        }
        else {
            return redirect()->route('news.home');
        }

        // return redirect()->route('news.home');
            // return $next($request);
    }
}
