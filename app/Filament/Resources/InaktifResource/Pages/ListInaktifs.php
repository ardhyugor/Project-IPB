<?php

namespace App\Filament\Resources\InaktifResource\Pages;

use App\Filament\Resources\InaktifResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInaktifs extends ListRecords
{
    protected static string $resource = InaktifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
