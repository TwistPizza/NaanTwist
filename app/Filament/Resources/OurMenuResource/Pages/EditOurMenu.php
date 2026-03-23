<?php

namespace App\Filament\Resources\OurMenuResource\Pages;

use App\Filament\Resources\OurMenuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurMenu extends EditRecord
{
    protected static string $resource = OurMenuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
