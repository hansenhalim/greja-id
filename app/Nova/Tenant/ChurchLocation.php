<?php

namespace App\Nova\Tenant;

use App\Nova\Resource;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ChurchLocation extends Resource
{
    public static $group = 'Church';

    public static $model = \App\Models\ChurchLocation::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'phone',
    ];

    public static function label()
    {
        return 'Locations';
    }

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')
                ->showWhenPeeking()
                ->sortable()
                ->required(),
            Text::make('Phone')
                ->showWhenPeeking()
                ->sortable()
                ->required(),
            Text::make('Address')
                ->required(),
            Boolean::make('Active')
                ->default(true)
                ->required(),
            HasMany::make('Church Services'),
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
