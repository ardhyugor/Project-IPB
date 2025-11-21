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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArsipNonPersonalBukuResource extends Resource
{
    protected static ?string $model = ArsipNonPersonalBuku::class;
    protected static ?string $navigationGroup = 'Layanan Arsip » Arsip Non Personal';
    protected static ?string $navigationLabel = 'Buku/Jurnal';
    use HasLayananBerkasBulkActions;
    protected static string $statusPeminjam = 'Buku/Jurnal';

    public static function canViewAny(): bool
    {
        return true; // semua boleh lihat
    }

    public static function canCreate(): bool
    {
        return Auth::user()->role->name === 'admin';
    }

    public static function canDelete($record): bool
    {
        return Auth::user()->role->name === 'admin';
    }

    public static function canDeleteAny(): bool
    {
        return Auth::user()->role->name === 'admin';
    }

    public static function canEdit($record): bool
    {
        return in_array(Auth::user()->role->name, ['admin', 'staff']);
    }

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
                Tables\Actions\ViewAction::make('lihat_berkas')
                    ->label('Lihat Berkas')
                    ->modalHeading('Daftar File Data Scan')
                    ->modalWidth('3xl')
                    ->action(function ($record, $livewire) {
                        // ga perlu action di sini, kita pake modalContent
                    })
                    ->modalContent(function ($record) {
                        $basePath = 'DataScan';
                        $folders = Storage::disk('public')->directories($basePath);
                        // cari folder berdasarkan NIP atau NAMA
                        $keyword = $record->NIP . '_' . str_replace(' ', '', $record->NAMA);

                        $matchedFolder = collect($folders)->first(function ($folder) use ($keyword) {
                            return str_contains(strtolower($folder), strtolower($keyword));
                        });


                        if (!$matchedFolder) {
                            return new \Illuminate\Support\HtmlString('<p class="text-gray-500">Tidak ditemukan folder untuk NIP/Nama ini.</p>');
                        }

                        $files = Storage::disk('public')->files($matchedFolder);
                        // dd($files);

                        if (empty($files)) {
                            return new \Illuminate\Support\HtmlString('<p class="text-gray-500">Folder ditemukan, tapi tidak ada file di dalamnya.</p>');
                        }

                        $html = '<ul class="list-disc pl-5 space-y-2">';
                        foreach ($files as $path) {
                            $url = Storage::url($path);
                            $name = basename($path);
                            $html .= "<li><a href='{$url}' target='_blank' class='text-blue-600 hover:underline'>{$name}</a></li>";
                        }
                        $html .= '</ul>';

                        return new \Illuminate\Support\HtmlString($html);
                    })
                    ->color('success'),
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
