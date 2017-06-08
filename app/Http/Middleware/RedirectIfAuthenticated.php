<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        switch ($guard) {

            case 'client':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('client.dashboard');
                }
                break;

            case 'provider':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('provider.dashboard');
                }
                break;

            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard');
                }
                break;

            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('client.dashboard');
                }
                break;

        }

        return $next($request);
    }
}
