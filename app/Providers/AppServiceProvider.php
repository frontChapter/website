<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentView;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if(app()->environment('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        Paginator::defaultView('pagination::default');

        Paginator::defaultSimpleView('pagination::simple-default');

        FilamentView::registerRenderHook(
            'panels::global-search.before',
            fn(): string => Blade::render('@livewire(\'tools.language-select\')'),
        );

    }
}
