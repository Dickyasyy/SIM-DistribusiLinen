<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SweetAlertMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('alert-type') && session('alert-message')) {
            $type = session('alert-type');
            $message = session('alert-message');
            $title = session('alert-title') ?? ucfirst($type);

            echo "<script>
                    Swal.fire({
                        title: '$title',
                        text: '$message',
                        icon: '$type'
                    });
                </script>";
        }

        return $next($request);
    }
}
