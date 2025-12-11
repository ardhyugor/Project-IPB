<?php

namespace App\Filament\Traits;

use Filament\Actions;

trait HasGlobalPrintButton
{
    protected function getHeaderActions(): array
    {
        return array_merge([
            Actions\Action::make('print')
                ->label('Print Data')
                ->icon('heroicon-o-printer')
                ->url(route('all.print'))
                ->openUrlInNewTab(),
        ], parent::getHeaderActions());
    }
}
    