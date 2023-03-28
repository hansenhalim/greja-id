<?php

namespace App\Nova\Tenant;

use Advoor\NovaEditorJs\NovaEditorJsField;
use App\Enums\FeedStatus;
use App\Enums\TagType;
use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\TagsField\Tags;

class Feed extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Feed>
     */
    public static $model = \App\Models\Feed::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'title',
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
            Tags::make('Type')
                ->type(TagType::FEED_TYPE->value)
                ->single()
                ->required(),
            Text::make('Title')
                ->sortable()
                ->required(),
            Textarea::make('Description')
                ->required(),
            NovaEditorJsField::make('Content')
                ->onlyOnForms()
                ->required(),
            Select::make('Status')
                ->options(array_column(FeedStatus::cases(), 'name', 'value'))
                ->onlyOnForms()
                ->required(),
            Status::make('Status')
                ->loadingWhen([])
                ->failedWhen([FeedStatus::PRIVATE->value]),
            Text::make('Youtube Video Id'),
            Tags::make('Tags')
                ->type(TagType::FEED_TAGS->value),
            DateTime::make('Published At')
                ->exceptOnForms()
                ->displayUsing(fn ($value) => $value ? $value->diffForHumans() : ''),
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
        return [
            new Filters\FeedStatus,
            new Filters\FeedType,
        ];
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
        return [
            new Actions\PublishFeed,
        ];
    }
}
