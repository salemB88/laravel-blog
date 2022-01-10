<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocal
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
if(in_array(request()->segment(1), ['en','ar'])) {
    app()->setLocale(request()->segment(1));
}

        return $next($request);
    }
}
