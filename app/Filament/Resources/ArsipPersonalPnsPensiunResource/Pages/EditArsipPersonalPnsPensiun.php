<?php

namespace App\Filament\Resources\ArsipPersonalPnsPensiunResource\Pages;

use App\Filament\Resources\ArsipPersonalPnsPensiunResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArsipPersonalPnsPensiun extends EditRecord
{
    protected static string $resource = ArsipPersonalPnsPensiunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
