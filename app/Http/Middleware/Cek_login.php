<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  $roles
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        // Check if user is logged in. If not, redirect to login page
        if (!Auth::check()) {
            return redirect('login');
        }
        
        // Get the user data
        $user = Auth::user();
        
        // If the user has the specified role, continue with the request
        if ($user->level_id == $roles) {
            return $next($request);
        }
        
        // If the user doesn't have access, redirect to login page with an error message
        return redirect('login')->with('error', 'Maaf, anda tidak memiliki akses');
    }
}
