<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Admin
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('User type: ' . $request->user()->usertype);
        if(Auth::user()->usertype != '1'){
            Log::info('User type: ' . $request->user()->usertype);
            return redirect('home');
            // return redirect('dashboard');
        }
        
        return $next($request);
    }
}
