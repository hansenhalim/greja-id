<?php

namespace App\Nova\Tenant;

use App\Enums\Gender;
use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Member extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Member>
     */
    public static $model = \App\Models\Member::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')
                ->sortable()
                ->required(),
            Select::make('Gender')
                ->sortable()
                ->options(array_column(Gender::cases(), 'name', 'value'))
                ->displayUsingLabels()
                ->required(),
            Text::make('Phone')
                ->sortable()
                ->required(),
            Text::make('Email')->required(),
            Text::make('Address')->hideFromIndex()
                ->required(),
            Date::make('Date of Birth')
                ->sortable()
                ->displayUsing(fn ($value) => $value->format('j F Y'))
                ->required(),
            Text::make('Description')->hideFromIndex()
                ->required(),
            Date::make('Joined At')
                ->displayUsing(fn ($value) => $value->format('d-M-Y'))
                ->required(),
            Boolean::make('Active')->default(true)
                ->required(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
