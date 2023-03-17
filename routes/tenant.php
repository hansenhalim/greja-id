<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::group([
    'as' => 'tenant.',
    'middleware' => [
        'tenant',
        \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
    ],
], function () {
    Route::redirect('/', '/nova')->name('home');

    Route::get(
        '/impersonate/{token}',
        fn ($token) => \Stancl\Tenancy\Features\UserImpersonation::makeResponse($token)
    )->name('impersonate');
});
