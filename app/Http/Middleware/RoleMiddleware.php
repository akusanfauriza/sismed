<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (auth()->user() && auth()->user()->role === $role) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'Akses ditolak. Anda bukan Administrator.');
    }
}
