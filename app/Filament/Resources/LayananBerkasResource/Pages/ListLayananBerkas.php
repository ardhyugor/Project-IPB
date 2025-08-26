<?php

namespace App\Filament\Resources\LayananBerkasResource\Pages;

use App\Filament\Resources\LayananBerkasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLayananBerkas extends ListRecords
{
    protected static string $resource = LayananBerkasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
