<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\LayananBerkas; // sesuaikan dengan nama modelmu
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Carbon\Carbon as CarbonCarbon;

class RiwayatLayananArsip extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationLabel = 'Riwayat Layanan Arsip';
    protected static string $view = 'filament.pages.riwayat-layanan-arsip';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                LayananBerkas::query()->latest('Tanggal')
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
                    ->formatStateUsing(fn($state) => $state ? Carbon::createFromFormat('d/m/Y', $state)->format('d-m-Y') : null),

                Tables\Columns\TextColumn::make('Kembali')
                    ->label('Kembali')
                    ->formatStateUsing(fn($state) => $state ? Carbon::createFromFormat('d/m/Y', $state)->format('d-m-Y') : null),
            ])
            ->defaultSort('Tanggal', 'desc')
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
            ]);
    }
}
