<?php

namespace App\Http\Middleware\Tenant;

use App\Tenant\ManagerTenant;
use Closure;
use Illuminate\Http\Request;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $managerT = app(ManagerTenant::class);
        $tenant = $managerT->tenant();

        if(!$tenant && $request->url() != route('erro-404')){
            return redirect()->route('erro-404');
        }

        return $next($request);
    }
}
