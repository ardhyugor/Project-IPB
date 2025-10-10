<?php

namespace App\Filament\Resources\ArsipPersonalPnsPensiunResource\Pages;

use App\Filament\Resources\ArsipPersonalNonPnsKontrakResource;
use App\Filament\Resources\ArsipPersonalPnsPensiunResource;
use App\Models\ArsipPersonalNonPnskontrak;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditArsipPersonalPnsPensiun extends EditRecord
{
    protected static string $resource = ArsipPersonalPnsPensiunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mutasi')
                ->label('Mutasi ke PNS Kontrak')
                ->color('success')
                ->requiresConfirmation()
                ->action(function () {
                    $record = $this->record;

                    // Pindahkan data ke tabel pensiun
                    ArsipPersonalNonPnskontrak::create($record->toArray());

                    // Hapus data lama (opsional)
                    $record->delete();

                    Notification::make()
                        ->title('Data berhasil dimutasi ke PNS Kontrak.')
                        ->success()
                        ->send();

                    // Redirect ke halaman resource tujuan (opsional)
                    return redirect()->to(ArsipPersonalNonPnsKontrakResource::getUrl('index'));
                }),
        ];
    }
}
