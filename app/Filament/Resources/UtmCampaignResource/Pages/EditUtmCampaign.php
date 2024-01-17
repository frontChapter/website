<?php

namespace App\Filament\Resources\UtmCampaignResource\Pages;

use App\Filament\Resources\UtmCampaignResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUtmCampaign extends EditRecord
{
    protected static string $resource = UtmCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
