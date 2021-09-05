<?php

namespace App\Http\Middleware\Tenant;

use App\Tenant\ManagerTenant;
use Closure;
use Illuminate\Http\Request;

class CheckDomainMaster
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
        $managenT = app(ManagerTenant::class);

        if(!$managenT->isSubdomainMaster()){
            abort(401, 'Acesso não autorizado!');
            return;
        }

        return $next($request);
    }
}
