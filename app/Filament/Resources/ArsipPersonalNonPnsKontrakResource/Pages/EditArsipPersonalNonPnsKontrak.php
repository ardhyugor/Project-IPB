<?php

namespace App\Filament\Resources\ArsipPersonalNonPnsKontrakResource\Pages;

use App\Filament\Resources\ArsipPersonalNonPnsKontrakResource;
use App\Models\ArsipPersonalNonPnsTetap;
use App\Models\ArsipPersonalPnsPensiun;
use App\Models\ArsipPersonalPnsAktif;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Forms;

class EditArsipPersonalNonPnsKontrak extends EditRecord
{
    protected static string $resource = ArsipPersonalNonPnsKontrakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mutasi')
                ->label('Mutasi Data')
                ->icon('heroicon-o-arrows-right-left')
                ->color('success')
                ->form([
                    Forms\Components\Select::make('tujuan')
                        ->label('Mutasi ke')
                        ->options([
                            'non_pns_tetap' => 'NON-PNS Tetap',
                            'pns_pensiun' => 'PNS Pensiun',
                            'pns_aktif' => 'PNS Aktif',
                        ])
                        ->required(),
                ])
                ->requiresConfirmation()
                ->action(function (array $data, $record) {
                    $tujuan = $data['tujuan'];

                    $targetModel = match ($tujuan) {
                        'non_pns_tetap' => ArsipPersonalNonPnsTetap::class,
                        'pns_pensiun' => ArsipPersonalPnsPensiun::class,
                        'pns_aktif' => ArsipPersonalPnsAktif::class,
                        default => null,
                    };

                    if (! $targetModel) {
                        Notification::make()
                            ->title('Tujuan mutasi tidak valid.')
                            ->danger()
                            ->send();
                        return;
                    }

                    // Pindahkan data
                    $targetModel::create($record->toArray());

                    // Hapus data lama
                    $record->delete();

                    Notification::make()
                        ->title('Data berhasil dimutasi ke ' . strtoupper(str_replace('_', ' ', $tujuan)))
                        ->success()
                        ->send();

                    // ✅ Kembali ke halaman asal, bukan ke resource tujuan
                    return redirect()->to(ArsipPersonalNonPnsKontrakResource::getUrl('index'));
                }),
        ];
    }
}
