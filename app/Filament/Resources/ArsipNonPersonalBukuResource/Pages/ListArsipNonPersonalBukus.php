<?php

namespace App\Filament\Resources\ArsipNonPersonalBukuResource\Pages;

use App\Filament\Resources\ArsipNonPersonalBukuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArsipNonPersonalBukus extends ListRecords
{
    protected static string $resource = ArsipNonPersonalBukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
