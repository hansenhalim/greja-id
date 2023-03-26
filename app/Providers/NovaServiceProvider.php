<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
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
     */
    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes(['tenant', 'universal', 'nova'])
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewNova', function ($user) {
            return true;
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     */
    protected function dashboards(): array
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
     */
    public function tools(): array
    {
        return [
            \Vyuldashev\NovaPermission\NovaPermissionTool::make()
                ->rolePolicy(\App\Policies\RolePolicy::class)
                ->permissionPolicy(\App\Policies\PermissionPolicy::class),
        ];
    }

    protected function resources(): void
    {
        if (tenancy()->initialized) {
            Nova::resources([
                \App\Nova\Tenant\ChurchLocation::class,
                \App\Nova\Tenant\ChurchService::class,
                \App\Nova\Tenant\Form::class,
                \App\Nova\Tenant\Inventory::class,
                \App\Nova\Tenant\Member::class,
                \App\Nova\Tenant\Tag::class,
                \App\Nova\Tenant\User::class,
                \App\Nova\Tenant\Tithe::class,
            ]);
        } else {
            Nova::resources([
                \App\Nova\Central\Admin::class,
                \App\Nova\Central\Domain::class,
                \App\Nova\Central\Tenant::class,
                \App\Nova\Central\User::class,
            ]);
        }
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
