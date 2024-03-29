<?php

namespace App\Filament\Resources\UtmCampaignResource\Pages;

use App\Filament\Resources\UtmCampaignResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUtmCampaign extends CreateRecord
{
    protected static string $resource = UtmCampaignResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = auth()->id();

        return $data;
    }
}
