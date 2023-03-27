<?php

namespace App\Nova\Tenant;

use App\Enums\TagType;
use App\Nova\Resource;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\TagsField\Tags;

class ChurchService extends Resource
{
    public static $group = 'Church';

    public static $model = \App\Models\ChurchService::class;

    public static $title = 'name';

    public static $search = [
        'name',
    ];

    public static function label()
    {
        return 'Services';
    }

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Location', 'churchLocation', 'App\Nova\Tenant\ChurchLocation')
                ->sortable(),
            Text::make('Name')
                ->sortable()
                ->required(),
            Tags::make('Type')
                ->type(TagType::CHURCH_SERVICE->value)
                ->single()
                ->sortable()
                ->required(),
            Textarea::make('Description')
                ->required(),
            Number::make('Attendance', 'attendance_amount')
                ->min(0)
                ->required(),
            Textarea::make('Additional Note')
                ->required(),
            Textarea::make('Berita Acara')
                ->required(),
            DateTime::make('Started At')
                ->displayUsing(fn ($value) => $value->format('D M y G:i'))
                ->required(),
            DateTime::make('Ended At')
                ->displayUsing(fn ($value) => $value->format('D M y G:i'))
                ->required(),
            HasMany::make('Tithes'),
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
