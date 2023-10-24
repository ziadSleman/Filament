<?php

namespace App\Filament\Resources\ProductAdsResource\Pages;

use App\Filament\Resources\ProductAdsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductAds extends EditRecord
{
    protected static string $resource = ProductAdsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
