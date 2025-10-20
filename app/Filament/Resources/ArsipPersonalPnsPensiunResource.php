<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArsipPersonalPnsPensiunResource\Pages;
use App\Filament\Resources\ArsipPersonalPnsPensiunResource\RelationManagers;
use App\Models\ArsipPersonalPnsPensiun;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Traits\HasLayananBerkasBulkActions;

class ArsipPersonalPnsPensiunResource extends Resource
{
    protected static ?string $model = ArsipPersonalPnsPensiun::class;
    protected static ?string $navigationGroup = 'Layanan Arsip » Arsip Personal';
    protected static ?string $navigationLabel = 'PNS Pensiun';
    use HasLayananBerkasBulkActions;

    protected static string $statusPeminjam = 'Pensiun';
    

    // public static function canViewAny(): bool
    // {
    //     return auth()->user()->role->name === 'admin';
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('NIP')
                    ->label('NIP')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('NAMA')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('LEMARI')
                    ->label('Lemari')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('LACI')
                    ->label('Laci')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('KODEBERKAS')
                    ->label('Kode Berkas')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('NIP')
                    ->label('NIP')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('NAMA')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('LEMARI')
                    ->label('Lemari')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('LACI')
                    ->label('Laci')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('KODEBERKAS')
                    ->label('Kode Berkas')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
             ->bulkActions([
                Tables\Actions\BulkActionGroup::make(
                 (new static())->getLayananBulkActions()
                ),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArsipPersonalPnsPensiuns::route('/'),
            'create' => Pages\CreateArsipPersonalPnsPensiun::route('/create'),
            'edit' => Pages\EditArsipPersonalPnsPensiun::route('/{record}/edit'),
        ];
    }
}
