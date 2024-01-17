<?php

namespace App\Filament\Resources\UtmCampaignResource\Pages;

use App\Filament\Resources\UtmCampaignResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUtmCampaigns extends ListRecords
{
    protected static string $resource = UtmCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
