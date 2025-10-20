<?php

namespace App\Filament\Resources\ArsipPersonalPnsAktifResource\Pages;

use App\Filament\Resources\ArsipPersonalPnsAktifResource;
use App\Models\ArsipPersonalPnsPensiun;
use App\Models\ArsipPersonalNonPnsKontrak;
use App\Models\ArsipPersonalNonPnsTetap;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Forms;

class EditArsipPersonalPnsAktif extends EditRecord
{
    protected static string $resource = ArsipPersonalPnsAktifResource::class;

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

                    // Resource sekarang (hapus dari pilihan)
                    $current = 'pns_aktif';
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

                    // Tentukan model tujuan berdasarkan pilihan
                    $targetModel = match ($tujuan) {
                        'non_pns_kontrak' => ArsipPersonalNonPnsKontrak::class,
                        'non_pns_tetap'   => ArsipPersonalNonPnsTetap::class,
                        'pns_pensiun'     => ArsipPersonalPnsPensiun::class,
                        default           => null,
                    };

                    if (! $targetModel) {
                        Notification::make()
                            ->title('Tujuan mutasi tidak valid.')
                            ->danger()
                            ->send();
                        return;
                    }

                    // Salin data ke tabel tujuan
                    $targetModel::create($record->toArray());

                    // Hapus data lama (mutasi, bukan copy)
                    $record->delete();

                    Notification::make()
                        ->title('Data berhasil dimutasi ke ' . strtoupper(str_replace('_', ' ', $tujuan)))
                        ->success()
                        ->send();

                    // Arahkan balik ke halaman asal (PNS Aktif)
                    return redirect()->to(ArsipPersonalPnsAktifResource::getUrl('index'));
                }),
        ];
    }
}
