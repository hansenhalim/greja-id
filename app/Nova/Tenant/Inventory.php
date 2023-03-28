<?php

namespace App\Nova\Tenant;

use App\Enums\TagType;
use App\Nova\Resource;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\TagsField\Tags;

class Inventory extends Resource
{
    public static $model = \App\Models\Inventory::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'code',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Tags::make('Type')
                ->type(TagType::INVENTORY_TYPE->value)
                ->single()
                ->required(),
            Tags::make('Status')
                ->type(TagType::INVENTORY_STATUS->value)
                ->single()
                ->required(),
            Text::make('Name')
                ->sortable()
                ->required(),
            Text::make('Code')
                ->sortable()
                ->required(),
            Textarea::make('Specification')
                ->required(),
            Currency::make('Price')
                ->sortable()
                ->required(),
            Textarea::make('Additional Note')
                ->required(),
            Boolean::make('Active')
                ->default(true)
                ->required(),
            Date::make('Inbound At')
                ->sortable()
                ->displayUsing(fn ($value) => $value->format('j F Y'))
                ->required(),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [];
    }

    public function filters(NovaRequest $request)
    {
        return [
            new Filters\InventoryStatus,
            new Filters\InventoryType,
        ];
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
