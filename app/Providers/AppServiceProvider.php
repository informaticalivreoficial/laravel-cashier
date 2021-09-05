<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use App\Tenant\ManagerTenant;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $managerT = app(ManagerTenant::class);
        Blade::if('tenantmain', function () use ($managerT) {
            return $managerT->isSubdomainMaster();
        });

        Blade::if('tenant', function () use ($managerT) {
            return !$managerT->isSubdomainMaster();
        });
    }
}
