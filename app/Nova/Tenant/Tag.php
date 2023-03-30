<?php

namespace App\Nova\Tenant;

use App\Enums\TagType;
use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Tag extends Resource
{
    public static $model = \App\Models\Tag::class;

    public static $title = 'name';

    public static $search = [
        'name',
        'type',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->sortable(),
            Select::make('Type')
                ->sortable()
                ->options(array_column(TagType::cases(), 'value', 'value'))
                ->required(),
        ];
    }

    public function filters(NovaRequest $request)
    {
        return [
            new Filters\TagType,
        ];
    }
}
