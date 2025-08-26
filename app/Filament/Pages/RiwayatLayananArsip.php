<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\LayananBerkas;
use Carbon\Carbon;

class RiwayatLayananArsip extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Riwayat Layanan ';
    protected static ?string $slug = 'riwayat-layanan-arsip';
    protected static string $view = 'filament.pages.riwayat-layanan-arsip';

    public function table(Table $table): Table
    {
        return $table
            ->query(LayananBerkas::query())
            ->columns([
                Tables\Columns\TextColumn::make('Tanggal')
                    ->label('Tanggal Pinjam')
                    ->formatStateUsing(fn ($state) => $this->parseDate($state))
                    ->sortable(),

                Tables\Columns\TextColumn::make('StatusBerkas')->label('Arsip')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('KodeBerkas')->label('Nomor Berkas')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('SifatLayan')->label('Sifat Layanan (Pelayanan)')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('SifatLain')->label('Sifat Layanan (Lainnya)')->sortable(),
                Tables\Columns\TextColumn::make('BerkasLayan')->label('Berkas Dilayani'),
                Tables\Columns\TextColumn::make('Pengguna')->label('Pengguna')->searchable(),
                Tables\Columns\TextColumn::make('UnitKerja')->label('Unit Kerja')->searchable(),

                Tables\Columns\TextColumn::make('kembali')
                    ->label('Tanggal Kembali')
                    ->formatStateUsing(fn ($state) => $this->parseDate($state))
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('bulan_tahun')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('bulan_tahun')
                            ->label('Bulan & Tahun')
                            ->displayFormat('m/Y')
                            ->native(false),
                    ])
                    ->query(function ($query, array $data) {
                        if ($data['bulan_tahun'] ?? null) {
                            $bulan = $data['bulan_tahun']->format('m');
                            $tahun = $data['bulan_tahun']->format('Y');
                            $query->where('Tanggal', 'like', "%/$bulan/$tahun");
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('cetak')
                    ->label('Cetak')
                    ->url(fn ($record) => route('cetak.layanan', $record->No))

                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('rekap')
                    ->label('Rekap')
                    ->action(fn ($records) => $this->rekap($records))
                    ->color('success')
                    ->icon('heroicon-o-document-arrow-down'),
            ])
            ->defaultSort('Tanggal', 'desc');
    }

    protected function parseDate(?string $value): ?string
    {
        try {
            return $value ? Carbon::createFromFormat('d/m/Y', $value)->format('d/m/Y') : null;
        } catch (\Exception $e) {
            return $value;
        }
    }

    public function rekap($records)
    {
        // isi sesuai kebutuhan (misalnya export PDF / Excel)
        // sementara contoh sederhana:
        \Filament\Notifications\Notification::make()
            ->title('Rekap berhasil dibuat')
            ->success()
            ->send();
    }
}
