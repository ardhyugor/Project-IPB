<?php

namespace App\Filament\Resources\ArsipPersonalPnsAktifResource\Pages;

use App\Filament\Resources\ArsipPersonalPnsAktifResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArsipPersonalPnsAktif extends EditRecord
{
    protected static string $resource = ArsipPersonalPnsAktifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
