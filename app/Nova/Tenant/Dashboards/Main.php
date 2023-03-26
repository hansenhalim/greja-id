<?php

namespace App\Nova\Tenant\Dashboards;

use App\Nova\Metrics\ActiveMembers;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new ActiveMembers,
        ];
    }
}
