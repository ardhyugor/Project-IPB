<?php

namespace App\Filament\Resources\ArsipPersonalPnsAktifResource\Pages;

use App\Filament\Resources\ArsipPersonalPnsAktifResource;
use App\Filament\Resources\ArsipPersonalPnsPensiunResource;
use App\Models\ArsipPersonalPnsPensiun;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditArsipPersonalPnsAktif extends EditRecord
{
    protected static string $resource = ArsipPersonalPnsAktifResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mutasi')
                ->label('Mutasi ke PNS Pensiun')
                ->color('success')
                ->requiresConfirmation()
                ->action(function () {
                    $record = $this->record;

                    // Pindahkan data ke tabel pensiun
                    ArsipPersonalPnsPensiun::create($record->toArray());

                    // Hapus data lama (opsional)
                    $record->delete();

                    Notification::make()
                        ->title('Data berhasil dimutasi ke PNS Pensiun.')
                        ->success()
                        ->send();

                    // Redirect ke halaman resource tujuan (opsional)
                    return redirect()->to(ArsipPersonalPnsPensiunResource::getUrl('index'));
                }),
        ];
    }
}
