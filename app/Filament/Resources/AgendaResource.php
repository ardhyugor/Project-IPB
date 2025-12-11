<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Agenda Arsip';

    public static function canViewAny(): bool
    {
        return in_array(Auth::user()->role->name, ['admin', 'staff']);
    }

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
                    ->default(now()->format('n'))
                    ->disabled(),

                Forms\Components\TextInput::make('TAHUN')
                    ->label('Tahun')
                    ->required()
                    ->default(now()->format('Y'))
                    ->disabled(),
            ]);
    }

    private static function safeDateFormat($state, $outputFormat = 'd M Y')
    {
        $formats = ['Y-m-d', 'd/m/Y'];
        foreach ($formats as $format) {
            try {
                return \Carbon\Carbon::createFromFormat($format, $state)->format($outputFormat);
            } catch (\Exception $e) {
            }
        }
        return $state;
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
                    ->label('Bulan')
                    ->formatStateUsing(function ($state) {
                        $bulan = (int) $state;
                        $nama = [
                            1 => 'January',
                            2 => 'February',
                            3 => 'March',
                            4 => 'April',
                            5 => 'May',
                            6 => 'June',
                            7 => 'July',
                            8 => 'August',
                            9 => 'September',
                            10 => 'October',
                            11 => 'November',
                            12 => 'December'
                        ];
                        return $nama[$bulan] ?? $state;
                    }),

                Tables\Columns\TextColumn::make('TAHUN')
                    ->label('Tahun')
                    ->sortable(),
            ])

->filters([
    Tables\Filters\SelectFilter::make('TAHUN')
        ->label('Filter Tahun')
        ->options(function () {
            return Agenda::query()
                ->select('TAHUN')
                ->whereNotNull('TAHUN')   // ⬅ fix: pastikan tidak NULL
                ->distinct()              // ⬅ fix: hindari duplikat data
                ->orderBy('TAHUN', 'desc')
                ->pluck('TAHUN', 'TAHUN')
                ->toArray();
        })
        ->query(function ($query, $data) {
            if (!empty($data['value'])) {
                $query->where('TAHUN', intval($data['value']));
            }
        }),

    Tables\Filters\SelectFilter::make('BULAN')
        ->label('Filter Bulan')
        ->options([
            '1' => 'January',
            '2' => 'February',
            '3' => 'March',
            '4' => 'April',
            '5' => 'May',
            '6' => 'June',
            '7' => 'July',
            '8' => 'August',
            '9' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ])
        ->query(function ($query, $data) {
            if (!empty($data['value'])) {
                $query->where('BULAN', intval($data['value']));
            }
        }),
])



            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
