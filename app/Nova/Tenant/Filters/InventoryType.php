<?php

namespace App\Nova\Tenant\Filters;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Filters\Filter;
use App\Models\Tag;
use App\Enums\TagType;

class InventoryType extends Filter
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
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        return $query->withAnyTags($value, TagType::INVENTORY_TYPE->value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function options(NovaRequest $request)
    {
        return Tag::getWithType(TagType::INVENTORY_TYPE->value)->pluck('name');
    }
}