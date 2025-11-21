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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArsipPersonalPnsPensiunResource extends Resource
{
    protected static ?string $model = ArsipPersonalPnsPensiun::class;
    protected static ?string $navigationGroup = 'Layanan Arsip » Arsip Personal';
    protected static ?string $navigationLabel = 'PNS Pensiun';
    use HasLayananBerkasBulkActions;

    protected static string $statusPeminjam = 'Pensiun';

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
                Forms\Components\TextInput::make('NIP')
                    ->label('NIP')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('NAMA')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('TANGGALLAHIR')
                    ->label('Tanggal Lahir')
                    ->required()
                    ->format('Y-m-d'), // simpan sebagai string "2025-10-20"
                Forms\Components\DatePicker::make('TANGGALPENSIUN')
                    ->label('Tanggal Pensiun')
                    ->required()
                    ->format('Y-m-d'), // simpan sebagai string "2025-10-20"
                Forms\Components\TextInput::make('LEMARI')
                    ->label('Lemari')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('LACI')
                    ->label('Laci')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\TextInput::make('KODEBERKAS')
                    ->label('Kode Berkas')
                    ->disabled()
                    ->dehydrated(true)
                    ->default(function () {
                        $lastNumber = ArsipPersonalPnsPensiun::max('KODEBERKAS');
                        $lastInt = 0;
                        if ($lastNumber && is_string($lastNumber)) {
                            $lastInt = intval(preg_replace('/\D/', '', $lastNumber));
                        }
                        $nextNumber = $lastInt + 1;
                        return str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
                    }),
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
                Tables\Columns\TextColumn::make('TANGGALLAHIR')
                    ->label('Tanggal Lahir')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('TANGGALPENSIUN')
                    ->label('Tanggal Pensiun')
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
                Tables\Actions\DeleteAction::make()
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
