<?php

namespace App\Filament\Traits;

use Filament\Tables;
use Filament\Forms;
use App\Models\LayananBerkas;
use Illuminate\Support\Facades\DB;

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

                // Ambil ID terakhir di tabel database
                $lastId = DB::connection('old')
                    ->table('tbpinjamberkaspns')
                    ->max('ID') ?? 0;

                foreach ($records as $record) {
                    $lastId++; // ID berikutnya

                    LayananBerkas::create([
                        'ID'           => $lastId,                  // lanjut dari ID terakhir
                        'KodeBerkas'   => $record->NOMORBERKAS ?? $record->KODEBERKAS ?? null,
                        'Layanan'      => static::getStatusPeminjam(),
                        'StatusBerkas' => 'dipinjam',
                        'keluar'       => 'PERSONAL',               // tambahan kolom keluar
                        'SifatLayan'   => $data['SifatLayan'] ?? '',
                        'SifatLain'    => $data['SifatLain'] ?? '',
                        'BerkasLayan'  => $data['BerkasLayan'] ?? '',
                        'BerkasLain'   => $data['BerkasLain'] ?? '',
                        'Pengguna'     => $data['Layanan'] ?? '',   // iya/tidak internal SDM
                        'Nama'         => $data['Nama'] ?? '',
                        'UnitKerja'    => $data['UnitKerja'] ?? '',
                        'Subdit'       => $data['Subdit'] ?? '',
                        'Seksi'        => $data['Seksi'] ?? '',
                        'Tanggal'      => now()->format('d/m/Y'),
                        'BULAN'        => now()->month,
                        'TAHUN'        => now()->year,
                    ]);
                }
            })
            ->deselectRecordsAfterCompletion();
    }

   protected function getSelesaiBulkAction(): Tables\Actions\BulkAction
{
    return Tables\Actions\BulkAction::make('selesai')
        ->label('Selesai Meminjam')
        ->action(function ($records) {
            foreach ($records as $record) {
                // Ambil kode berkas dari field yang tersedia
                $kode = $record->NOMORBERKAS ?? $record->KODEBERKAS ?? null;

                if (!$kode) {
                    continue; // kalau kosong, lewati
                }

                // Ambil data terakhir yang masih "dipinjam"
                $lastPinjam = LayananBerkas::where('KodeBerkas', $kode)
                    ->where('StatusBerkas', 'dipinjam')
                    ->orderByRaw("STR_TO_DATE(Tanggal, '%d/%m/%Y') DESC")
                    ->first();

                if ($lastPinjam) {
                    $lastPinjam->update([
                        'StatusBerkas' => 'dikembalikan',
                        'kembali'      => now()->format('d/m/Y'),
                    ]);
                }
            }
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
