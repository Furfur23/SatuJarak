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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Pastikan user sudah login
        if (! $request->user()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        // Cek apakah rolenya sesuai
        if ($request->user()->role !== $role) {
            return response()->json(['message' => 'Akses ditolak. Anda tidak memiliki izin untuk role ini.'], 403);
        }

        return $next($request);
    }
}
