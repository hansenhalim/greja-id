<?php

namespace App\Nova\Tenant;

use App\Enums\TagType;
use App\Nova\Resource;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\TagsField\Tags;

class Form extends Resource
{
    public static $model = \App\Models\Form::class;

    public static $title = 'id';

    public static $search = [
        'id',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Tags::make('Type')
                ->type(TagType::FORM_TYPE->value)
                ->single()
                ->sortable()
                ->required(),
            BelongsTo::make('Member')->searchable()->onlyOnForms(),
            Stack::make('Member', [
                Text::make('member->name'),
                Text::make('member->email'),
                Text::make('member->phone'),
            ]),
            Code::make('Content')
                ->json()
                ->required(),
            Boolean::make('Active')
                ->default(true)
                ->required(),
            DateTime::make('Verified At'),
            Files::make('Documents', 'documents')
                ->temporary(now()->addMinutes(5)),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [];
    }

    public function filters(NovaRequest $request)
    {
        return [
            new Filters\FormType,
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
