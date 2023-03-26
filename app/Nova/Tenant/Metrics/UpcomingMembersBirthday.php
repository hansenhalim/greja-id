<?php

namespace App\Nova\Tenant\Metrics;

use App\Models\Member;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\MetricTableRow;
use Laravel\Nova\Metrics\Table;

class UpcomingMembersBirthday extends Table
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        $members = Member::active()
            ->whereRaw('DAYOFYEAR(date_of_birth) >= DAYOFYEAR(CURDATE())')
            ->orderByRaw('DAYOFYEAR(date_of_birth)')
            ->limit(3)
            ->get();

        foreach ($members as $member) {
            $metricTableRows[] = MetricTableRow::make()
                ->icon('cake')
                ->iconClass('dark:text-gray-300')
                ->title($member->date_of_birth->format('j F Y'))
                ->subtitle("$member->name ($member->phone)");
        }

        return $metricTableRows;
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int|null
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }
}
