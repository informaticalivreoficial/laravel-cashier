<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScopes;

trait TenantTrait
{
    public static function boot()
    {
        parent::boot();
 
        static::addGlobalScope(new TenantScopes);
        static::observe(new TenantObserver);
    }
}