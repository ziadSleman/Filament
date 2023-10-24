<?php

namespace App\Filament\Resources\ProductAdsResource\Pages;

use App\Filament\Resources\ProductAdsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductAds extends ListRecords
{
    protected static string $resource = ProductAdsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
