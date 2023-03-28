<?php

namespace App\Nova\Tenant\Filters;

use App\Enums\TagType;
use App\Models\Tag;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class FeedType extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        return $query->withAnyTags($value, TagType::FEED_TYPE->value);
    }

    /**
     * Get the filter's available options.
     *
     * @return array
     */
    public function options(NovaRequest $request)
    {
        return Tag::getWithType(TagType::FEED_TYPE->value)->pluck('name');
    }
}
