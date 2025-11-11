<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArsipNonPersonalBukuResource\Pages;
use App\Filament\Resources\ArsipNonPersonalBukuResource\RelationManagers;
use App\Models\ArsipNonPersonalBuku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Traits\HasLayananBerkasBulkActions;

class ArsipNonPersonalBukuResource extends Resource
{
    protected static ?string $model = ArsipNonPersonalBuku::class;
    protected static ?string $navigationGroup = 'Layanan Arsip » Arsip Non Personal';
    protected static ?string $navigationLabel = 'Buku/Jurnal';
    use HasLayananBerkasBulkActions;
    protected static string $statusPeminjam = 'Buku/Jurnal';

   
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ID')
                    ->label('ID')
                   
                    ->maxLength(255)
                    ->disabled(),
                Forms\Components\TextInput::make('Tahun')
                    ->label('Tahun')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('NomorBuku')
                    ->label('Nomor Buku')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Judul')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ID')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Tahun')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('NomorBuku')
                    ->label('Nomor Buku')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('Judul')
                    ->label('Judul')
                    ->sortable()
                    ->searchable(),
            ])->filters([
                //
            ])
            // ->headerActions([
            //     Tables\Actions\CreateAction::make(),
            // ])
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
            'index' => Pages\ListArsipNonPersonalBukus::route('/'),
            'create' => Pages\CreateArsipNonPersonalBuku::route('/create'),
            'edit' => Pages\EditArsipNonPersonalBuku::route('/{record}/edit'),
        ];
    }
}
