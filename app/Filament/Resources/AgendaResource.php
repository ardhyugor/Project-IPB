<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Agenda Arsip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NOMORAGENDA')
                    ->label('Nomor Agenda')
                    ->required()
                    ->default(function () {
                        $last = \App\Models\Agenda::orderBy('NOMORAGENDA', 'desc')->first();
                        $lastNumber = (int) ($last?->NOMORAGENDA ?? 0);
                        return $lastNumber + 1;
                    })
                    ->disabled()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('TANGGALAGENDA')
                    ->label('Tanggal Agenda')
                    ->required()
                    ->default(now())
                    ->displayFormat('d/m/Y')
                    ->format('Y-m-d'),

                Forms\Components\TextInput::make('NOMORBERKAS')
                    ->label('Nomor Berkas')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('PERIHAL')
                    ->label('Perihal')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('TANGGALBERKAS')
                    ->label('Tanggal Berkas')
                    ->required()
                    ->displayFormat('d/m/Y')
                    ->format('Y-m-d'),

                Forms\Components\TextInput::make('ASALBERKAS')
                    ->label('Asal Berkas')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('BULAN')
                    ->label('Bulan')
                    ->required()
                    ->default(now()->format('F'))
                    ->maxLength(255)
                    ->disabled(),

                Forms\Components\TextInput::make('TAHUN')
                    ->label('Tahun')
                    ->required()
                    ->default(now()->format('Y'))
                    ->maxLength(4)
                    ->disabled(),
            ]);
    }

    // Helper untuk format tanggal aman
    private static function safeDateFormat($state, $outputFormat = 'd M Y')
    {
        $formats = ['Y-m-d', 'd/m/Y']; // urutkan dari format MySQL ke format lama
        foreach ($formats as $format) {
            try {
                return \Carbon\Carbon::createFromFormat($format, $state)->format($outputFormat);
            } catch (\Exception $e) {
                // lanjut coba format lain
            }
        }
        return $state; // kalau gagal semua, tampilkan apa adanya
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('NOMORAGENDA')
                    ->label('Nomor Agenda')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('TANGGALAGENDA')
                    ->label('Tanggal Agenda')
                    ->formatStateUsing(fn($state) => self::safeDateFormat($state))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('NOMORBERKAS')
                    ->label('Nomor Berkas')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('PERIHAL')
                    ->label('Perihal')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('TANGGALBERKAS')
                    ->label('Tanggal Berkas')
                    ->formatStateUsing(fn($state) => self::safeDateFormat($state))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('ASALBERKAS')
                    ->label('Asal Berkas')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('BULAN')
                    ->label('Bulan'),

                Tables\Columns\TextColumn::make('TAHUN')
                    ->label('Tahun'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('cetak')
                    ->label('Cetak PDF')
                    ->icon('heroicon-o-printer')
                    ->url(fn($record) => route('agenda.cetak', ['id' => $record->getKey()]))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
}
