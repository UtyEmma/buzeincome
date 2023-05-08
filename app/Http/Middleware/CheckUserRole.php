<?php

namespace App\Http\Middleware;

use App\Library\Roles;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if($role === Roles::ANYADMIN) {
            if($request->user()->role !== Roles::ADMIN && $request->user()->role !== Roles::SUPERADMIN) return abort(401);
        } elseif($request->user()->role !== $role) return abort(401);
        
        return $next($request);
    }
}
