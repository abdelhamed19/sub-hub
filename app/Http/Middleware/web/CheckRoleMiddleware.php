<?php

namespace App\Http\Middleware\web;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // dd($roles, auth()->guard('super_admin')->user()->role->value);
        if (array_values($roles) === ['all']) {
            return $next($request);
        }
        if (auth()->guard('super_admin')->check()) {
            $user = auth()->guard('super_admin')->user();
            if (!in_array($user->role->value, $roles)) {
                abort(403, 'Unauthorized action.');
            }
        }
        if (auth()->guard('client')->check()) {
            $user = auth()->guard('client')->user();
            if (!in_array($user->role->value, $roles)) {
                abort(403, 'Unauthorized action.');
            }
        }
        // if (auth()->guard('admin')->check()) {
        //     $user = auth()->guard('admin')->user();
        //     if (!in_array($user->role->value, $roles)) {
        //         abort(403, 'Unauthorized action.');
        //     }
        // }
        return $next($request);
    }
}
