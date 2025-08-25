<?php

namespace App\Filament\Resources\ArsipPersonalNonPnsTetapResource\Pages;

use App\Filament\Resources\ArsipPersonalNonPnsTetapResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArsipPersonalNonPnsTetap extends EditRecord
{
    protected static string $resource = ArsipPersonalNonPnsTetapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
