<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatOverview;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    protected static string $view = 'filament.pages.dashboard';

    public function getHeading(): string
    {
        return __('Dashboard');
    }

    public static function getNavigationLabel(): string
    {
        return __('Dashboard');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatOverview::class,
        ];
    }
}
