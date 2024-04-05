<?php

namespace App\Providers;

use App\View\Composers\Filter\FilterDeveloperSelectComposer;
use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        \View::composer('components.filter.filter-developer-select', FilterDeveloperSelectComposer::class);
    }
}
