<?php

namespace App\Filament\Resources\OurDealResource\Pages;

use App\Filament\Resources\OurDealResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurDeal extends EditRecord
{
    protected static string $resource = OurDealResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
