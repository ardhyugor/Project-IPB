<?php

namespace App\Filament\Resources\ArsipPersonalPnsAktifResource\Pages;

use App\Filament\Resources\ArsipPersonalPnsAktifResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListArsipPersonalPnsAktifs extends ListRecords
{
    protected static string $resource = ArsipPersonalPnsAktifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
