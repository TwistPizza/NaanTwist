<?php

namespace App\Filament\Resources\StoreGalleryResource\Pages;

use App\Filament\Resources\StoreGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStoreGallery extends EditRecord
{
    protected static string $resource = StoreGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
