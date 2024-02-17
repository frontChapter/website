<?php

namespace App\Filament\Resources\FestivalSiteResource\Pages;

use App\Filament\Resources\FestivalSiteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFestivalSite extends EditRecord
{
    protected static string $resource = FestivalSiteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
