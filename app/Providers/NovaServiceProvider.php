<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::userTimezone(fn () => 'Asia/Jakarta');

        Nova::serving(function () {
            \App\Models\Tenant::creating(function (\App\Models\Tenant $tenant) {
                $tenant->ready = false;
            });
        });

        Nova::footer(fn () => null);
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes(['tenant', 'universal', 'nova'])
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return true;
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        if (tenancy()->initialized) {
            return [
                new \App\Nova\Tenant\Dashboards\Main,
            ];
        } else {
            return [
                new \App\Nova\Central\Dashboards\Main,
            ];
        }
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    protected function resources()
    {
        if (tenancy()->initialized) {
            Nova::resources([
                //
            ]);
        } else {
            Nova::resources([
                \App\Nova\Central\Domain::class,
                \App\Nova\Central\Tenant::class,
                \App\Nova\Central\User::class,
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
