<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\LayananBerkas;
use Illuminate\Support\Carbon;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;

class RiwayatLayananArsip extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationLabel = 'Riwayat Layanan Arsip';
    protected static string $view = 'filament.pages.riwayat-layanan-arsip';

    public static function shouldRegisterNavigation(): bool
    {
        return in_array(Auth::user()->role->name, ['admin', 'staff']);
    }


    public function table(Table $table): Table
    {
        return $table
            ->query(
                LayananBerkas::query()->orderBy('No', 'asc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('BULAN')
                    ->label('Bln/Thn')
                    ->formatStateUsing(fn($state, $record) => sprintf('%02d/%s', $record->BULAN, $record->TAHUN))
                    ->sortable(),

                Tables\Columns\TextColumn::make('Layanan')
                    ->label('Arsip')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('KodeBerkas')
                    ->label('Nomor Berkas')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('SifatLayan')
                    ->label('Sifat Layanan (Pelayanan)')
                    ->searchable(),

                Tables\Columns\TextColumn::make('SifatLain')
                    ->label('Sifat Layanan (Lainnya)')
                    ->searchable(),

                Tables\Columns\TextColumn::make('BerkasLayan')
                    ->label('Berkas yang dilayani (Berkas)')
                    ->searchable(),

                Tables\Columns\TextColumn::make('BerkasLain')
                    ->label('Berkas yang dilayani (Lainnya)')
                    ->searchable(),

                Tables\Columns\TextColumn::make('Nama')
                    ->label('Pengguna')
                    ->searchable(),

                Tables\Columns\TextColumn::make('UnitKerja')
                    ->label('Unit Kerja')
                    ->searchable(),

                Tables\Columns\TextColumn::make('Tanggal')
                    ->label('Tanggal')
                    ->formatStateUsing(function ($state) {
                        try {
                            return Carbon::createFromFormat('d/m/Y', $state)->format('d-m-Y');
                        } catch (\Exception $e) {
                            return $state;
                        }
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('StatusBerkas')
                    ->label('Kembali')
                    ->formatStateUsing(function ($state) {
                        try {
                            return Carbon::createFromFormat('d/m/Y', $state)->format('d-m-Y');
                        } catch (\Exception $e) {
                            return $state;
                        }
                    }),
            ])
            ->defaultSort('No', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('TAHUN')
                    ->options(
                        LayananBerkas::select('TAHUN')->distinct()->pluck('TAHUN', 'TAHUN')
                    )
                    ->label('Tahun'),

                Tables\Filters\SelectFilter::make('BULAN')
                    ->options([
                        1 => 'Januari',
                        2 => 'Februari',
                        3 => 'Maret',
                        4 => 'April',
                        5 => 'Mei',
                        6 => 'Juni',
                        7 => 'Juli',
                        8 => 'Agustus',
                        9 => 'September',
                        10 => 'Oktober',
                        11 => 'November',
                        12 => 'Desember',
                    ])
                    ->label('Bulan'),
            ])
            ->headerActions([
                // 🔘 Tombol Rekapitulasi di pojok kiri atas tabel
                Action::make('rekapitulasi')
                    ->label('📊 Rekapitulasi')
                    ->color('info')
                    ->icon('heroicon-o-chart-pie')
                    ->action(fn() => $this->dispatch('openRekapModal'))
            ]);
    }
}
