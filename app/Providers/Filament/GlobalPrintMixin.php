<?php

namespace App\Providers\Filament\Mixins;

use Filament\Actions\Action;

class GlobalPrintMixin
{
    public function getHeaderActions()
    {
        return function () {
            return array_merge([
                Action::make('print')
                    ->label('Print')
                    ->icon('heroicon-o-printer')
                    ->url(url()->current() . '/print')
                    ->openUrlInNewTab()
                    ->color('primary'),
            ], parent::getHeaderActions());
        };
    }
}
