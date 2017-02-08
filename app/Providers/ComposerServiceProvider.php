<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'layouts.menu', 'App\Http\ViewComposers\MenuComposer'
        );

        // Using class based composers...
        View::composer(
            'layouts.shorter', 'App\Http\ViewComposers\ShorterComposer'
        );

        View::composer(
            'layouts.slide_main', 'App\Http\ViewComposers\SlideMainComposer'
        );

        View::composer(
            'layouts.latest_news', 'App\Http\ViewComposers\LatestNewsComposer'
        );

        View::composer(
            'layouts.content_one', 'App\Http\ViewComposers\ContentOneComposer'
        );

        View::composer(
            'layouts.slide_sidebar', 'App\Http\ViewComposers\SlideSidebarComposer'
        );

        View::composer(
            'layouts.content_two', 'App\Http\ViewComposers\ContentTwoComposer'
        );

        View::composer(
            'layouts.weather', 'App\Http\ViewComposers\WeatherComposer'
        );

        View::composer(
            'layouts.category_sidebar', 'App\Http\ViewComposers\CategorySidebarComposer'
        );

        View::composer(
            'layouts.sidebar_poll', 'App\Http\ViewComposers\PollComposer'
        );

        View::composer(
            'layouts.banner', 'App\Http\ViewComposers\BannerComposer'
        );

        View::composer(
            'layouts.most_viewed', 'App\Http\ViewComposers\MostViewedComposer'
        );

        View::composer(
            'layouts.most_comment', 'App\Http\ViewComposers\MostCommentComposer'
        );

        View::composer(
            'layouts.external_news', 'App\Http\ViewComposers\ExternalNewsComposer'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
