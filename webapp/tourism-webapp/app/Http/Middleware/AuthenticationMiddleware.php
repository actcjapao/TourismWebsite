<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationMiddleware
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
        $path = $request->path();
        $usertype = session('authenticated_usertype');
        $isAuthenticated = session()->has('auth_token');

        // If not logged in and trying to access anything other than 'manage'
        if (!$isAuthenticated && $path != 'manage') {
            return redirect('manage')->with('access_error', 'Kindly authenticate yourself first');
        }

        // If logged in and trying to access the login page again
        if ($isAuthenticated && $path == 'manage') {
            switch ($usertype) {
                case 'admin':
                    return redirect('/manage/admin/dashboard');
                case 'manager':
                default:
                    return redirect('/manage/manager/dashboard');
            }
        }

        // Restrict access to admin or manager dashboards based on usertype
        if ($isAuthenticated) {
            if ($usertype === 'manager' && str_contains($path, 'admin')) {
                return abort(403, 'Access denied.');
            }

            if ($usertype === 'admin' && str_contains($path, 'manager')) {
                return abort(403, 'Access denied.');
            }
        }
        
        return $next($request);
    }
}
