<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$jabatan)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Memeriksa apakah jabatan pengguna termasuk dalam daftar jabatan yang diizinkan
        if (in_array($user->jabatan, $jabatan)) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'Anda tidak diperbolehkan mengakses halaman ini');
    }
}
