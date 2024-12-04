<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Ambil guard dari parameter rute atau gunakan guard default
        $guard = $request->route()->parameter('guard', 'web');

        if (Auth::guard($guard)->check()) {
            $userRole = Auth::guard($guard)->user()->role;

            // Pastikan hanya peran yang diizinkan yang dapat mengakses
            if (in_array($userRole, $roles)) {
                return $next($request);
            }
        }

        return redirect()->route('dashboard.index')->with('pesan', ['error', 'Unauthorized']);
    }
}
