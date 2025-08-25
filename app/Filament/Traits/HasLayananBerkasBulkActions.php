<?php

namespace App\Filament\Traits;

use Filament\Tables;
use Filament\Forms;
use App\Models\LayananBerkas;

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
                foreach ($records as $record) {
                    LayananBerkas::create([
                        'KodeBerkas'   => $record->NOMORBERKAS ?? $record->KODEBERKAS ?? null,
                        'Layanan'      => static::getStatusPeminjam(),
                        'StatusBerkas' => 'dipinjam',
                        'SifatLayan'   => $data['SifatLayan'] ?? null,
                        'SifatLain'    => $data['SifatLain'] ?? null,
                        'BerkasLayan'  => $data['BerkasLayan'] ?? null,
                        'BerkasLain'   => $data['BerkasLain'] ?? null,
                        'Pengguna'     => $data['Layanan'] ?? null, // iya/tidak internal SDM
                        'Nama'         => $data['Nama'] ?? null,
                        'UnitKerja'    => $data['UnitKerja'] ?? null,
                        'Subdit'       => $data['Subdit'] ?? null,
                        'Seksi'        => $data['Seksi'] ?? null,
                        'Tanggal'      => now()->format('Y-m-d'),
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
                    LayananBerkas::where('KodeBerkas', $record->NOMORBERKAS)
                        ->where('StatusBerkas', 'dipinjam')
                        ->latest('Tanggal')
                        ->first()?->update([
                            'StatusBerkas' => 'dikembalikan',
                            'kembali'      => now()->format('Y-m-d'),
                        ]);
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
