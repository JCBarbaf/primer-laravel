<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
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
        view()->composer([
            'admin.events.index'],
            'App\Http\ViewComposers\Admin\Town'
        );
        view()->composer([
            'admin.*'],
            'App\Http\ViewComposers\Admin\Language'
        );
    }
}
