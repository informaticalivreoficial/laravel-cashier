<?php

namespace App\Tenant\Observers;

use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    public function creating(Model $model)
    {
        if(app()->runningInConsole()){
            return;
        }
        $tenant = app(ManagerTenant::class)->identify();

        $model->setAttribute('tenant_id', $tenant);
    }
}