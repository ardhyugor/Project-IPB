<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArsipPersonalNonPnsTetapResource\Pages;
use App\Filament\Resources\ArsipPersonalNonPnsTetapResource\RelationManagers;
use App\Models\ArsipPersonalNonPnsTetap;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Traits\HasLayananBerkasBulkActions;
use Illuminate\Support\Facades\Storage;

class ArsipPersonalNonPnsTetapResource extends Resource
{
    protected static ?string $model = ArsipPersonalNonPnsTetap::class;
    protected static ?string $navigationGroup = 'Layanan Arsip » Arsip Personal';
    protected static ?string $navigationLabel = 'Non PNS Tetap';
    use HasLayananBerkasBulkActions;
    protected static string $statusPeminjam = 'Non PNS Tetap';

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
                    ->format('d/m/Y')
                    ->displayFormat('d/m/Y')
                    ->native(false), 
                Forms\Components\DatePicker::make('TANGGALANGKAT')
                    ->label('TMT Diangkat')
                    ->required()
                    ->format('Y'), // misal cuma tahun, tetap string
                Forms\Components\Select::make('UNIT')
                    ->label('Unit Kerja')
                    ->required()
                    ->options([
                        'IPB' => 'IPB',
                        'Biro Komunikasi' => 'Biro Komunikasi',
                        'Biro Legislasi Dan Pelayanan Hukum' => 'Biro Legislasi Dan Pelayanan Hukum',
                        'Biro Umum dan Instalasi' => 'Biro Umum dan Instalasi',
                        'Direktorat Administrasi Pendidikan Dan Penerimaan Mahasiswa Baru' => 'Direktorat Administrasi Pendidikan Dan Penerimaan Mahasiswa Baru',
                        'Direktorat Bisnis Dan Manajemen Aset Komersial' => 'Direktorat Bisnis Dan Manajemen Aset Komersial',
                        'Direktorat Inovasi Dan Kewirausahaan' => 'Direktorat Inovasi Dan Kewirausahaan',
                        'Direktorat Kemahasiswaan Dan Pengembangan Karir' => 'Direktorat Kemahasiswaan Dan Pengembangan Karir',
                        'Direktorat Kerjasama Dan Hubungan Alumni' => 'Direktorat Kerjasama Dan Hubungan Alumni',
                        'Direktorat Keuangan Dan Akuntansi' => 'Direktorat Keuangan Dan Akuntansi',
                        'Direktorat Pengembangan Program Dan Teknologi Pendidikan' => 'Direktorat Pengembangan Program Dan Teknologi Pendidikan',
                        'Direktorat Perencanaan, Pemonitoran, Dan Evaluasi' => 'Direktorat Perencanaan, Pemonitoran, Dan Evaluasi',
                        'Direktorat Program Internasional' => 'Direktorat Program Internasional',
                        'Direktorat Sistem Informasi Dan Transformasi Digital' => 'Direktorat Sistem Informasi Dan Transformasi Digital',
                        'Direktorat Sumberdaya Manusia' => 'Direktorat Sumberdaya Manusia',
                        'Kantor Manajemen Mutu Dan Audit Internal' => 'Kantor Manajemen Mutu Dan Audit Internal',
                        'Lembaga Pengembangan Institut' => 'Lembaga Pengembangan Institut',
                        'Lembaga Penelitian & Pengabdian Kepada Masyarakat' => 'Lembaga Penelitian & Pengabdian Kepada Masyarakat',
                        'Fakultas Pertanian' => 'Fakultas Pertanian',
                        'Sekolah Kedokteran Hewan dan Biomedis' => 'Sekolah Kedokteran Hewan dan Biomedis',
                        'Fakultas Perikanan Dan Ilmu Kelautan' => 'Fakultas Perikanan Dan Ilmu Kelautan',
                        'Fakultas Peternakan' => 'Fakultas Peternakan',
                        'Fakultas Kehutanan dan Lingkungan' => 'Fakultas Kehutanan dan Lingkungan',
                        'Fakultas Teknologi Pertanian' => 'Fakultas Teknologi Pertanian',
                        'Fakultas Matematika Dan Ilmu Pengetahuan Alam' => 'Fakultas Matematika Dan Ilmu Pengetahuan Alam',
                        'Fakultas Ekonomi dan Manajemen' => 'Fakultas Ekonomi dan Manajemen',
                        'Fakultas Ekologi Manusia' => 'Fakultas Ekologi Manusia',
                        'Fakultas Kedokteran' => 'Fakultas Kedokteran',
                        'Sekolah Pascasarjana' => 'Sekolah Pascasarjana',
                        'Sekolah Bisnis' => 'Sekolah Bisnis',
                        'Sekolah Vokasi' => 'Sekolah Vokasi',
                        'Program Pendidikan Kompetensi Umum' => 'Program Pendidikan Kompetensi Umum',
                        'Program Pendidikan Di Luar Kampus Utama' => 'Program Pendidikan Di Luar Kampus Utama',
                        'Unit Laboratorium Terpadu' => 'Unit Laboratorium Terpadu',
                        'Perpustakaan' => 'Perpustakaan',
                        'Unit Laboratorium Riset Unggulan' => 'Unit Laboratorium Riset Unggulan',
                        'Unit Arsip' => 'Unit Arsip',
                        'Unit Keamanan Kampus' => 'Unit Keamanan Kampus',
                        'Unit Kesehatan' => 'Unit Kesehatan',
                        'Unit Layanan Pengadaan' => 'Unit Layanan Pengadaan',
                        'Unit Olah Raga Dan Seni' => 'Unit Olah Raga Dan Seni',
                        'Unit Pelatihan Bahasa' => 'Unit Pelatihan Bahasa',
                        'Unit Science And Techno Park' => 'Unit Science And Techno Park',
                        'Unit Transportasi Kampus' => 'Unit Transportasi Kampus',
                        'Green Tv' => 'Green Tv',
                    ])
                    ->searchable()
                    ->native(false),
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
                    ->disabled()
                    ->dehydrated(true)
                    ->default(function () {
                        $lastNumber = ArsipPersonalNonPnsTetap::max('KODEBERKAS');
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
            'index' => Pages\ListArsipPersonalNonPnsTetaps::route('/'),
            'create' => Pages\CreateArsipPersonalNonPnsTetap::route('/create'),
            'edit' => Pages\EditArsipPersonalNonPnsTetap::route('/{record}/edit'),
        ];
    }
}
