<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Tests\HttpCache\request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            // return redirect('/');
            return redirect()->back();
        }           
            return $next($request); 
    }
}
