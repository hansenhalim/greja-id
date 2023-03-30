<?php

namespace App\Nova\Tenant;

use Advoor\NovaEditorJs\NovaEditorJsField;
use Alexwenzel\DependencyContainer\DependencyContainer;
use Alexwenzel\DependencyContainer\HasDependencies;
use App\Enums\FeedStatus;
use App\Enums\TagType;
use App\Enums\VideoSource;
use App\Nova\Resource;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;
use Spatie\TagsField\Tags;

class Feed extends Resource
{
    use HasDependencies;

    public static $model = \App\Models\Feed::class;

    public static $title = 'title';

    public static $search = [
        'title',
    ];

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
                ->options(array_column(FeedStatus::cases(), 'value', 'value'))
                ->onlyOnForms()
                ->required(),
            Status::make('Status')
                ->loadingWhen([])
                ->failedWhen([FeedStatus::PRIVATE->value]),

            Select::make('Video Source')
                ->options(array_column(VideoSource::cases(), 'value', 'value'))
                ->required(),

            DependencyContainer::make([
                Files::make('Video')
                    ->temporary(now()->addMinutes(5)),
            ])->dependsOn('video_source', VideoSource::LOCAL),
            DependencyContainer::make([
                Text::make('Youtube Video Id'),
            ])->dependsOn('video_source', VideoSource::YOUTUBE),
            DependencyContainer::make([
                URL::make('Video URL'),
            ])->dependsOn('video_source', VideoSource::URL),

            Tags::make('Tags')
                ->type(TagType::FEED_TAGS->value)
                ->withLinkToTagResource(\App\Nova\Tenant\Tag::class),
            Images::make('Cover')
                ->temporary(now()->addMinutes(5)),

            DateTime::make('Published At')
                ->exceptOnForms()
                ->displayUsing(fn ($value) => $value ? $value->diffForHumans() : ''),
        ];
    }

    public function cards(NovaRequest $request)
    {
        return [];
    }

    public function filters(NovaRequest $request)
    {
        return [
            new Filters\FeedStatus,
            new Filters\FeedType,
        ];
    }

    public function lenses(NovaRequest $request)
    {
        return [];
    }

    public function actions(NovaRequest $request)
    {
        return [
            new Actions\PublishFeed,
        ];
    }
}
