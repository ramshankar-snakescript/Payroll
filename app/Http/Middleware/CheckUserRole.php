<?php


namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Check if the user has the role of 1 (or any other role you want to allow)
        if (auth()->user()->role != 1) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    
    }
}

