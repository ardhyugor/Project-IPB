<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LayananBerkasResource\Pages;
use App\Models\LayananBerkas;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LayananBerkasResource extends Resource
{
    protected static ?string $model = LayananBerkas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Riwayat Layanan Arsip';
    protected static ?string $pluralModelLabel = 'Riwayat Layanan Arsip';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Tanggal')
                    ->label('Tanggal Pinjam')
                    ->formatStateUsing(
                        fn($state) => $state
                            ? \Carbon\Carbon::createFromFormat('d/m/Y', $state)->format('d/m/Y')
                            : null
                    ),


                Tables\Columns\TextColumn::make('StatusBerkas')
                    ->label('Arsip')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('KodeBerkas')
                    ->label('Nomor Berkas')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('SifatLayan')
                    ->label('Sifat Layanan (Pelayanan)')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('SifatLain')
                    ->label('Sifat Layanan (Lainnya)')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('BerkasLayan')
                    ->label('Berkas yang Dilayani')
                    ->sortable(),

                Tables\Columns\TextColumn::make('BerkasLain')
                    ->label('Berkas (Lainnya)')
                    ->sortable(),

                Tables\Columns\TextColumn::make('Pengguna')
                    ->label('Pengguna')
                    ->searchable(),

                Tables\Columns\TextColumn::make('UnitKerja')
                    ->label('Unit Kerja')
                    ->searchable(),

                Tables\Columns\TextColumn::make('Tanggal')
                    ->label('Tanggal Layanan Pinjam')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kembali')
                    ->label('Tanggal Layanan Kembali')
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('bulan_tahun')
                    ->form([
                        Forms\Components\DatePicker::make('bulan_tahun')
                            ->label('Bulan dan Tahun')
                            ->displayFormat('m/Y')
                            ->native(false),
                    ])
                    ->query(function ($query, array $data) {
                        if ($data['bulan_tahun'] ?? null) {
                            $query->whereMonth('Tanggal', $data['bulan_tahun']->month)
                                ->whereYear('Tanggal', $data['bulan_tahun']->year);
                        }
                    }),

                Tables\Filters\SelectFilter::make('StatusBerkas')
                    ->label('Jenis Arsip yang dilayani')
                    ->options([
                        'PNS' => 'PNS',
                        'NON-PNS' => 'Non PNS',
                    ]),
            ])
            ->defaultSort('Tanggal', 'desc')
            ->paginated([10, 25, 50, 100]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLayananBerkas::route('/'),
        ];
    }
}
