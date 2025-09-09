<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArsipPersonalNonPnsKontrakResource\Pages;
use App\Filament\Resources\ArsipPersonalNonPnsKontrakResource\RelationManagers;
use App\Models\ArsipPersonalNonPnsKontrak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Traits\HasLayananBerkasBulkActions;

class ArsipPersonalNonPnsKontrakResource extends Resource
{
    protected static ?string $model = ArsipPersonalNonPnsKontrak::class;
    protected static ?string $navigationGroup = 'Layanan Arsip » Arsip Personal';
    protected static ?string $navigationLabel = 'Non PNS Kontrak';
    use HasLayananBerkasBulkActions;
    protected static string $statusPeminjam = 'Non PNS Kontrak';

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
                Tables\Actions\deleteAction::make(),

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
            'index' => Pages\ListArsipPersonalNonPnsKontraks::route('/'),
            'create' => Pages\CreateArsipPersonalNonPnsKontrak::route('/create'),
            'edit' => Pages\EditArsipPersonalNonPnsKontrak::route('/{record}/edit'),
        ];
    }
}
