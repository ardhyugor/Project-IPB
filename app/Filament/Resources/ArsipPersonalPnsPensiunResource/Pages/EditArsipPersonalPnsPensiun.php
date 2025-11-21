<?php

namespace App\Filament\Resources\ArsipPersonalPnsPensiunResource\Pages;

use App\Filament\Resources\ArsipPersonalPnsPensiunResource;
use App\Models\ArsipPersonalNonPnsKontrak;
use App\Models\ArsipPersonalNonPnsTetap;
use App\Models\ArsipPersonalPnsAktif;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Filament\Forms;
use Illuminate\Support\Facades\Auth;

class EditArsipPersonalPnsPensiun extends EditRecord
{
    protected static string $resource = ArsipPersonalPnsPensiunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('mutasi')
            // ->visible(fn () => Auth::user()->role->name === 'admin')
                ->label('Mutasi Data')
                ->icon('heroicon-o-arrows-right-left')
                ->color('success')
                ->form(function () {
                    // Semua opsi mutasi
                    $options = [
                        'non_pns_kontrak' => 'NON-PNS Kontrak',
                        'non_pns_tetap'   => 'NON-PNS Tetap',
                        'pns_aktif'       => 'PNS Aktif',
                        'pns_pensiun'     => 'PNS Pensiun',
                    ];

                    // Hapus opsi resource saat ini (pns_pensiun)
                    unset($options['pns_pensiun']);

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

                    // Salin data ke tabel tujuan
                    $targetModel::create($record->toArray());

                    // Hapus data lama (mutasi, bukan copy)
                    $record->delete();

                    Notification::make()
                        ->title('Data berhasil dimutasi ke ' . strtoupper(str_replace('_', ' ', $tujuan)))
                        ->success()
                        ->send();

                    // Balik ke halaman asal (PNS Pensiun)
                    return redirect()->to(ArsipPersonalPnsPensiunResource::getUrl('index'));
                }),
        ];
    }
}
