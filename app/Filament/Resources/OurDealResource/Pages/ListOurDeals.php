<?php

namespace App\Filament\Resources\OurDealResource\Pages;

use App\Filament\Resources\OurDealResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOurDeals extends ListRecords
{
    protected static string $resource = OurDealResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
