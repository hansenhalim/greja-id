<?php

namespace App\Nova\Tenant\Dashboards;

use App\Nova\Tenant\Metrics\ActiveMembers;
use App\Nova\Tenant\Metrics\MembersPerGender;
use App\Nova\Tenant\Metrics\MembersPerMonth;
use App\Nova\Tenant\Metrics\UpcomingMembersBirthday;
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
            new MembersPerGender,
            new MembersPerMonth,
            new UpcomingMembersBirthday,
        ];
    }
}
