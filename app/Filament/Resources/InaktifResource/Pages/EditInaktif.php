<?php

namespace App\Filament\Resources\InaktifResource\Pages;

use App\Filament\Resources\InaktifResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInaktif extends EditRecord
{
    protected static string $resource = InaktifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
