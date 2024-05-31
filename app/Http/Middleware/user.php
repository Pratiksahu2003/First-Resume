<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
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
        if (Auth::check()) {
            $user = Auth::user();

           if ($user->role == 'user') {
                return $next($request);
            }

            if($user->role == 'admin')
            {
                return redirect('admin/home');
            }

            return redirect('/')->with('error', 'Invalid user type');
        }

        return redirect('/')->with('error', 'You must be logged in');
    }
}
