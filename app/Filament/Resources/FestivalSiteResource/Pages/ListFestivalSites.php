<?php

namespace App\Filament\Resources\FestivalSiteResource\Pages;

use App\Filament\Resources\FestivalSiteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFestivalSites extends ListRecords
{
    protected static string $resource = FestivalSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
