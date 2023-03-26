<?php

namespace App\Nova\Tenant;

use App\Enums\TagType;
use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\TagsField\Tags;

class Tithe extends Resource
{
    public static $group = 'Church';

    public static $model = \App\Models\Tithe::class;

    public static $title = 'id';

    public static $search = [
        'id',
    ];

    public static $displayInNavigation = false;

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Church Service')->sortable(),
            Tags::make('Payment Method')
                ->type(TagType::PAYMENT_METHOD->value)
                ->single()
                ->sortable()
                ->required(),
            Currency::make('Amount')
                ->sortable()
                ->required(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [];
    }

    public function filters(NovaRequest $request)
    {
        return [];
    }

    public function lenses(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [];
    }
}
