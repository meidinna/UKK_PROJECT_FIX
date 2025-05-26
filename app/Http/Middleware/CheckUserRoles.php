<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        // Jika belum login atau tidak punya salah satu role yang diperbolehkan
        if (!Auth::check() || !$user->hasAnyRole($roles)) {
            abort(403, 'Anda belum punya akses. Silakan hubungi admin :)');
        }

    return $next($request);
    }
}