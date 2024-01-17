<?php

namespace App\Filament\Resources\UtmVisitResource\Pages;

use App\Filament\Resources\UtmVisitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUtmVisits extends ListRecords
{
    protected static string $resource = UtmVisitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
