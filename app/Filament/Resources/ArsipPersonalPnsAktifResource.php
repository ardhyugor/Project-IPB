<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArsipPersonalPnsAktifResource\Pages;
use App\Filament\Resources\ArsipPersonalPnsAktifResource\RelationManagers;
use App\Models\ArsipPersonalPnsAktif;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Traits\HasLayananBerkasBulkActions;


class ArsipPersonalPnsAktifResource extends Resource
{

    use HasLayananBerkasBulkActions;

    protected static string $statusPeminjam = 'PNS';
    protected static ?string $model = ArsipPersonalPnsAktif::class;
    protected static ?string $navigationGroup = 'Layanan Arsip » Arsip Personal';
    protected static ?string $navigationLabel = 'PNS/CPNS Aktif';

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
                Forms\Components\TextInput::make('HAMBALAN')
                    ->label('Laci')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('NOMORBERKAS')
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
                Tables\Columns\TextColumn::make('HAMBALAN')
                    ->label('Laci')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('NOMORBERKAS')
                    ->label('Nomor Berkas')
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
            'index' => Pages\ListArsipPersonalPnsAktifs::route('/'),
            'create' => Pages\CreateArsipPersonalPnsAktif::route('/create'),
            'edit' => Pages\EditArsipPersonalPnsAktif::route('/{record}/edit'),
        ];
    }
}
