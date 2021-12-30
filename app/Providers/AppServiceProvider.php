<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CategoryDescription;
use App\Models\Event;
use App\Models\EventDescription;
use App\Observers\CategoryDescriptionObserver;
use App\Observers\CategoryObserver;
use App\Observers\EventDescriptionObserver;
use App\Observers\EventObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Category::observe(CategoryObserver::class);
        CategoryDescription::observe(CategoryDescriptionObserver::class);
        EventDescription::observe(EventDescriptionObserver::class);

    }
}
