<?php

namespace App\Filament\Resources\StoreGalleryResource\Pages;

use App\Filament\Resources\StoreGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStoreGalleries extends ListRecords
{
    protected static string $resource = StoreGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
