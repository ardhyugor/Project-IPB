<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InaktifResource\Pages;
use App\Filament\Resources\InaktifResource\RelationManagers;
use App\Models\Inaktif;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Traits\HasLayananBerkasBulkActions;

class InaktifResource extends Resource
{
    protected static ?string $model = Inaktif::class;
    use HasLayananBerkasBulkActions;

    protected static string $statusPeminjam = 'In-Aktif';

   
    protected static ?string $navigationGroup = 'Layanan Arsip » Arsip Non Personal';
    protected static ?string $navigationLabel = 'In-Aktif';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ID')
                    ->label('ID')
                    ->maxLength(255)
                     ->default(function () {
                        $last = \App\Models\Inaktif::orderBy('ID', 'desc')->first();
                        $lastNumber = (int) ($last?->ID ?? 0);
                        return $lastNumber + 1;
                    })
                    ->disabled()
                    ->disabled(),
                Forms\Components\TextInput::make('TAHUN')
                    ->label('Tahun')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('NOMORBOX')
                    ->label('Nomor Box')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('NOMORBERKAS')
                    ->label('Nomor Berkas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('NOITEMARSIP')
                    ->label('No Item Arsip')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('URAIAN')
                    ->label('Uraian')
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
                Tables\Columns\TextColumn::make('TAHUN')
                    ->label('Tahun')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('NOMORBOX')
                    ->label('Nomor Box')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('NOMORBERKAS')
                    ->label('Nomor Berkas')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('NOITEMARSIP')
                    ->label('No Item Arsip')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('URAIAN')
                    ->label('Uraian')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListInaktifs::route('/'),
            'create' => Pages\CreateInaktif::route('/create'),
            'edit' => Pages\EditInaktif::route('/{record}/edit'),
        ];
    }
}
