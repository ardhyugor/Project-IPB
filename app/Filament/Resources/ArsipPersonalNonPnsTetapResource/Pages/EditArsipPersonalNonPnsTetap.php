<?php

namespace App\Filament\Resources\ArsipPersonalNonPnsTetapResource\Pages;

use App\Filament\Resources\ArsipPersonalNonPnsTetapResource;
use App\Filament\Resources\ArsipPersonalPnsAktifResource;
use App\Models\ArsipPersonalPnsAktif;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditArsipPersonalNonPnsTetap extends EditRecord
{
    protected static string $resource = ArsipPersonalNonPnsTetapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mutasi')
                ->label('Mutasi ke PNS Aktif')
                ->color('success')
                ->requiresConfirmation()
                ->action(function () {
                    $record = $this->record;

                    // Pindahkan data ke tabel pensiun
                    ArsipPersonalPnsAktif::create($record->toArray());

                    // Hapus data lama (opsional)
                    $record->delete();

                    Notification::make()
                        ->title('Data berhasil dimutasi ke PNS Aktif.')
                        ->success()
                        ->send();

                    // Redirect ke halaman resource tujuan (opsional)
                    return redirect()->to(ArsipPersonalPnsAktifResource::getUrl('index'));
                }),
        ];
    }
}
