<?php

namespace App\Filament\Resources\ArsipPersonalNonPnsKontrakResource\Pages;

use App\Filament\Resources\ArsipPersonalNonPnsKontrakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArsipPersonalNonPnsKontrak extends EditRecord
{
    protected static string $resource = ArsipPersonalNonPnsKontrakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
