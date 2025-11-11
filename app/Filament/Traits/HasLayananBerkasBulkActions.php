<?php

namespace App\Filament\Traits;

use Filament\Tables;
use Filament\Forms;
use App\Models\LayananBerkas;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;

trait HasLayananBerkasBulkActions
{
    protected static function getStatusPeminjam(): string
    {
        if (property_exists(static::class, 'statusPeminjam')) {
            return (string) (static::$statusPeminjam ?? 'umum');
        }

        return 'umum';
    }

    protected function getLayananBulkAction(): Tables\Actions\BulkAction
    {
        return Tables\Actions\BulkAction::make('layanan')
            ->label('Pinjam Berkas')
            ->form([
                Forms\Components\Radio::make('SifatLayan')
                    ->label('Sifat Layanan')
                    ->options([
                        'pinjam'   => 'Pinjam Berkas',
                        'copy'     => 'Fotocopy Berkas',
                        'lihat'    => 'Lihat Ditempat',
                        'download' => 'Download File Scan',
                        'lainnya'  => 'Layanan Lainnya',
                    ])
                    ->reactive()
                    ->required(),

                Forms\Components\TextInput::make('SifatLain')
                    ->label('Sifat Lainnya')
                    ->visible(fn ($get) => $get('SifatLayan') === 'lainnya'),

                Forms\Components\Radio::make('BerkasLayan')
                    ->label('Layanan Berkas')
                    ->options([
                        'bundel'   => '1 Bundel Berkas',
                        'tertentu' => 'Berkas Tertentu',
                    ])
                    ->reactive()
                    ->required(),

                Forms\Components\TextInput::make('BerkasLain')
                    ->label('Berkas Tertentu')
                    ->visible(fn ($get) => $get('BerkasLayan') === 'tertentu'),

                Forms\Components\Radio::make('Layanan')
                    ->label('Layanan Internal SDM?')
                    ->options([
                        'iya'   => 'Iya',
                        'tidak' => 'Tidak',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('Nama')
                    ->label('Nama Peminjam')
                    ->required(),

                Forms\Components\TextInput::make('UnitKerja')
                    ->label('Unit Kerja'),

                Forms\Components\TextInput::make('Subdit')
                    ->label('Subdit'),

                Forms\Components\TextInput::make('Seksi')
                    ->label('Seksi'),
            ])
            ->action(function (array $data, $records) {

                $lastId = DB::connection('old')
                    ->table('tbpinjamberkaspns')
                    ->max('ID') ?? 0;

                foreach ($records as $record) {
                    $lastId++;

                    LayananBerkas::create([
                        'ID'           => $lastId,
                        'KodeBerkas'   => $record->NOMORBERKAS ?? $record->KODEBERKAS ?? $record->NomorBuku ?? null,
                        'Layanan'      => static::getStatusPeminjam(),
                        'StatusBerkas' => 'DiPinjam',
                        'keluar'       => 'PERSONAL',
                        'SifatLayan'   => $data['SifatLayan'] ?? '',
                        'SifatLain'    => $data['SifatLain'] ?? '',
                        'BerkasLayan'  => $data['BerkasLayan'] ?? '',
                        'BerkasLain'   => $data['BerkasLain'] ?? '',
                        'Pengguna'     => $data['Layanan'] ?? '',
                        'Nama'         => $data['Nama'] ?? '',
                        'UnitKerja'    => $data['UnitKerja'] ?? '',
                        'Subdit'       => $data['Subdit'] ?? '',
                        'Seksi'        => $data['Seksi'] ?? '',
                        'Tanggal'      => now()->format('d/m/Y'),
                        'BULAN'        => now()->month,
                        'TAHUN'        => now()->year,
                    ]);
                }

                // ✅ Kirim notifikasi setelah sukses pinjam
                Notification::make()
                    ->title('Peminjaman Berkas Berhasil!')
                    ->body(count($records) . ' berkas telah tercatat sebagai "Dipinjam".')
                    ->success()
                    ->send();
            })
            ->deselectRecordsAfterCompletion();
    }

    protected function getSelesaiBulkAction(): Tables\Actions\BulkAction
    {
        return Tables\Actions\BulkAction::make('selesai')
            ->label('Selesai Meminjam')
            ->action(function ($records) {
                $updated = 0;

                foreach ($records as $record) {
                    $kode = $record->NOMORBERKAS ?? $record->KODEBERKAS ?? $record->NomorBuku ?? null;

                    if (!$kode) continue;

                    $lastPinjam = LayananBerkas::where('KodeBerkas', $kode)
                        ->where('StatusBerkas', 'dipinjam')
                        ->orderByRaw("STR_TO_DATE(Tanggal, '%d/%m/%Y') DESC")
                        ->first();

                    if ($lastPinjam) {
                        $lastPinjam->update([
                            'StatusBerkas' => 'DiKembalikan',
                            'kembali'      => now()->format('d/m/Y'),
                        ]);
                        $updated++;
                    }
                }

                // ✅ Kirim notifikasi setelah selesai meminjam
                Notification::make()
                    ->title('Pengembalian Berkas Berhasil!')
                    ->body($updated . ' berkas telah dikembalikan.')
                    ->success()
                    ->send();
            })
            ->requiresConfirmation()
            ->color('success');
    }

    protected function getLayananBulkActions(): array
    {
        return [
            $this->getLayananBulkAction(),
            $this->getSelesaiBulkAction(),
        ];
    }
}
