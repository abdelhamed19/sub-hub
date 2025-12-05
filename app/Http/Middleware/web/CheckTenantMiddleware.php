<?php

namespace App\Http\Middleware\web;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class CheckTenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Normalize host (optional)
        $host = str_replace('www.', '', $request->getHost());

        // Cache tenant for performance
        $tenant = Cache::remember("tenant_{$host}", 3600, function () use ($host) {
            return \App\Models\Tenant::where('domain', $host)->first();
        });

        // Validate
        if (!$tenant || !$tenant->is_active) {
            abort(404, 'Tenant not found or inactive.');
        }

        // Prepare DB connection
        $connection = config('database.connections.tenant');
        $connection['database'] = $tenant->database_name;
        $connection['username'] = $tenant->database_username;
        $connection['password'] = decrypt($tenant->database_password);

        // Reconnect ONLY if needed
        if (DB::connection('tenant')->getDatabaseName() !== $tenant->database_name) {
            DB::purge('tenant');
            Config::set('database.connections.tenant', $connection);
            DB::reconnect('tenant');
        }

        // Make tenant globally available
        app()->instance('currentTenant', $tenant);

        return $next($request);
    }
}
