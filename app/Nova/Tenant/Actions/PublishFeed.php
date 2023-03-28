<?php

namespace App\Nova\Tenant\Actions;

use App\Enums\FeedStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Http\Requests\NovaRequest;

class PublishFeed extends Action implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $feeds)
    {
        $publishedAt = Carbon::parse($fields->published_at);

        foreach ($feeds as $feed) {
            $feed->update([
                'status' => FeedStatus::PRIVATE->value,
                'published_at' => $publishedAt,
            ]);

            \App\Jobs\PublishFeed::dispatch($feed)->delay($publishedAt);
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            DateTime::make('Publish', 'published_at')->required(),
        ];
    }
}
