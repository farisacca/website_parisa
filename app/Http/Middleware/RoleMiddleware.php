<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        if (strcasecmp(auth()->user()->role, $role) !== 0) {
            // Jika role tidak sesuai, tolak akses dengan kode HTTP 403
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
