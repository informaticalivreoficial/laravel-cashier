<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManagerTenant
{
    public function subdomain()
    {
        // explode subdominio.dominio.com
        $piecesHost = explode('.', request()->getHost());

        return $piecesHost[0];
    }

    public function tenant()
    {
        $subdomain = $this->subdomain();
        $tenant = Tenant::where('dominio', $subdomain)->first();
        return $tenant;
    }

    public function identify()
    {
        $tenant = $this->tenant();
        return $tenant->id;
    }

    public function isSubdomainMaster()
    {
        $subdomain = $this->subdomain();
        $subdomainMaster = config('tenant.subdomain_master');
        return $subdomain == $subdomainMaster;
    }
}