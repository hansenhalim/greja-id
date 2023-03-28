<?php

namespace App\Nova\Tenant\Actions;

use App\Enums\FeedStatus;
use App\Models\Feed;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Http\Requests\NovaRequest;

class PublishFeed extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $feeds)
    {
        $publishAt = Carbon::parse($fields->publish_at);

        foreach ($feeds as $feed) {
            $feed->update([
                'status' => FeedStatus::PRIVATE->value,
                'published_at' => $publishAt,
            ]);

            \App\Jobs\PublishFeed::dispatch($feed)->delay($publishAt);
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            DateTime::make('Publish At')->required(),
        ];
    }
}
