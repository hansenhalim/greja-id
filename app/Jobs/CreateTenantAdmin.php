<?php

namespace App\Jobs;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateTenantAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected Tenant $tenant)
    {
    }

    public function handle(): void
    {
        $this->tenant->run(function ($tenant) {
            User::create(
                $tenant->only(['name', 'email', 'password'])
            );

            $tenant->update(['ready' => true]);
        });
    }
}
