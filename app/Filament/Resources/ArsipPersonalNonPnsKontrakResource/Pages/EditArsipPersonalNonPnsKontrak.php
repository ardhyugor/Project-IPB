<?php

namespace App\Filament\Resources\ArsipPersonalNonPnsKontrakResource\Pages;

use App\Filament\Resources\ArsipPersonalNonPnsKontrakResource;
use App\Filament\Resources\ArsipPersonalNonPnsTetapResource;
use App\Models\ArsipPersonalNonPnsTetap;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditArsipPersonalNonPnsKontrak extends EditRecord
{
    protected static string $resource = ArsipPersonalNonPnsKontrakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mutasi')
                ->label('Mutasi ke NON-PNS Tetap')
                ->color('success')
                ->requiresConfirmation()
                ->action(function () {
                    $record = $this->record;

                    // Pindahkan data ke tabel pensiun
                    ArsipPersonalNonPnsTetap::create($record->toArray());

                    // Hapus data lama (opsional)
                    $record->delete();

                    Notification::make()
                        ->title('Data berhasil dimutasi ke NON-PNS Tetap.')
                        ->success()
                        ->send();

                    // Redirect ke halaman resource tujuan (opsional)
                    return redirect()->to(ArsipPersonalNonPnsTetapResource::getUrl('index'));
                }),
        ];
    }
}
