<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }
        
        // For now, we'll assume all authenticated users are admins
        // In the future, we can add role checking here
        // if (!Auth::user()->isAdmin()) {
        //     return redirect()->route('home')->with('error', 'You do not have admin access');
        // }
        
        return $next($request);
    }
}
