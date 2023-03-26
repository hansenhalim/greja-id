<?php

namespace App\Nova\Tenant;

use App\Enums\TagType;
use App\Models\Tag as TagModel;
use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class Tag extends Resource
{
    public static $model = TagModel::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->sortable(),
            Select::make('Type')
                ->sortable()
                ->options(array_column(TagType::cases(), 'name', 'value'))
                ->required(),
        ];
    }
}
