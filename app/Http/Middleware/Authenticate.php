<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');
        if($request->expectsJson()){
            return null;
        }
        if($request->is('super-admin') || $request->is('super-admin/*')){
            return route('super_admin.auth.login');
        }
        if($request->is('client') || $request->is('client/*')){
            return route('client.login');
        }
        if($request->is('admin') || $request->is('admin/*')){
            return route('admin.login');
        }
        return route('login');
    }
}
