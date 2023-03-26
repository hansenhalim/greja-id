<?php

namespace App\Nova\Tenant;

use App\Enums\Gender;
use App\Nova\Resource;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Member extends Resource
{
    public static $model = \App\Models\Member::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'phone',
        'email',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')
                ->sortable()
                ->required(),
            Select::make('Gender')
                ->options(array_column(Gender::cases(), 'name', 'value'))
                ->displayUsing(fn ($name) => ucfirst($name))
                ->required(),
            Text::make('Phone')
                ->required(),
            Text::make('Email')
                ->required(),
            Text::make('Address')
                ->hideFromIndex()
                ->required(),
            Date::make('Date of Birth')
                ->sortable()
                ->displayUsing(fn ($value) => $value->format('j F Y'))
                ->required(),
            Text::make('Description')
                ->hideFromIndex()
                ->required(),
            Date::make('Joined At')
                ->sortable()
                ->displayUsing(fn ($value) => $value->timezone('Asia/Jakarta')->format('d-M-Y'))
                ->required(),
            Boolean::make('Active')
                ->default(true)
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
