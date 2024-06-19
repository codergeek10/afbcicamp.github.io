<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        
        $user = Auth::user();
        $userType = $user->user_type;

        if($userType == 2)
        {
            return $next($request);
        }

        if($userType == 1)
        {
            return redirect()->route('dashboard');
        }

        if($userType == 3)
        {
            return redirect()->route('dashboard');
        }

        return abort(401, 'Unauthorized action.');
    }
}
