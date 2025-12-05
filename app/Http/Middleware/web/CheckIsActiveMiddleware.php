<?php

namespace App\Http\Middleware\web;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $modelClass, $id = null): Response
    {
        if($id){
            $instance = $modelClass::find($id);
        } else {
            $instance = $modelClass::where('email', $request->input('email'))->first();
        }
        // Check is_active
        if (!$instance || !$instance->is_active) {
            abort(404, 'Resource not found or inactive.');
        }

        return $next($request);
    }
}
