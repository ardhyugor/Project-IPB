<?php

namespace App\Filament\Resources\ArsipPersonalNonPnsTetapResource\Pages;

use App\Filament\Resources\ArsipPersonalNonPnsTetapResource;
use App\Models\ArsipPersonalNonPnsKontrak;
use App\Models\ArsipPersonalPnsAktif;
use App\Models\ArsipPersonalPnsPensiun;
use App\Models\ArsipPersonalNonPnsTetap;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Forms;

class EditArsipPersonalNonPnsTetap extends EditRecord
{
    protected static string $resource = ArsipPersonalNonPnsTetapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mutasi')
                ->label('Mutasi Data')
                ->icon('heroicon-o-arrows-right-left')
                ->color('success')
                ->form(function () {
                    // Semua opsi mutasi
                    $options = [
                        'non_pns_kontrak' => 'NON-PNS Kontrak',
                        'non_pns_tetap'   => 'NON-PNS Tetap',
                        'pns_pensiun'     => 'PNS Pensiun',
                        'pns_aktif'       => 'PNS Aktif',
                    ];

                    // Ambil nama resource saat ini
                    $current = 'non_pns_tetap'; // karena ini di EditArsipPersonalNonPnsTetap

                    // Hilangkan opsi yang sama dengan posisi saat ini
                    unset($options[$current]);

                    return [
                        Forms\Components\Select::make('tujuan')
                            ->label('Mutasi ke')
                            ->options($options)
                            ->required(),
                    ];
                })
                ->requiresConfirmation()
                ->action(function (array $data, $record) {
                    $tujuan = $data['tujuan'];

                    $targetModel = match ($tujuan) {
                        'non_pns_kontrak' => ArsipPersonalNonPnsKontrak::class,
                        'pns_pensiun'     => ArsipPersonalPnsPensiun::class,
                        'pns_aktif'       => ArsipPersonalPnsAktif::class,
                        default           => null,
                    };

                    if (! $targetModel) {
                        Notification::make()
                            ->title('Tujuan mutasi tidak valid.')
                            ->danger()
                            ->send();
                        return;
                    }

                    // Duplikasikan data ke tabel tujuan
                    $targetModel::create($record->toArray());

                    // Hapus data lama (mutasi, bukan copy)
                    $record->delete();

                    Notification::make()
                        ->title('Data berhasil dimutasi ke ' . strtoupper(str_replace('_', ' ', $tujuan)))
                        ->success()
                        ->send();

                    // ✅ Balik ke halaman asal (tidak error)
                    return redirect()->to(ArsipPersonalNonPnsTetapResource::getUrl('index'));
                }),
        ];
    }
}
