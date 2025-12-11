<?php

namespace App\Filament\Pages;

use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\LayananBerkas;
use Illuminate\Support\Carbon;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Untuk debugging

class RiwayatLayananArsip extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationLabel = 'Riwayat Layanan Arsip';
    protected static string $view = 'filament.pages.riwayat-layanan-arsip';

    public function getLayananData(): array
    {
        return LayananBerkas::select('TAHUN', 'BULAN')->get()->toArray();
    }

    public static function shouldRegisterNavigation(): bool
    {
        return in_array(Auth::user()->role->name, ['admin', 'staff']);
    }

    // --- FUNGSI UTILITAS ---

    /**
     * Membersihkan array/koleksi secara rekursif dari karakter non-UTF-8 (untuk DomPDF).
     * Mengubah type hint agar juga menerima null.
     */
    protected function cleanRecursive(array | string | null $data) // KOREKSI: Tambahkan | null
    {
        // KOREKSI: Cek jika data adalah null, langsung kembalikan null atau string kosong
        if ($data === null) {
            return null;
        }

        if (is_string($data)) {
            // Gunakan iconv untuk menghilangkan karakter yang tidak valid
            return iconv('UTF-8', 'UTF-8//IGNORE', $data);
        }

        if (is_array($data)) {
            $result = [];
            foreach ($data as $key => $value) {
                // Pastikan key dan value dibersihkan
                $result[$this->cleanRecursive($key)] = $this->cleanRecursive($value);
            }
            return $result;
        }

        return $data;
    }

    // --- FUNGSI UTAMA PDF ---

    /**
     * FUNGSI CETAK PDF DENGAN FILTER - FUNGSI INI AKAN DIPANGGIL MELALUI ROUTE BUKAN LIVEWIRE ACTION
     */
    public function exportPdfWithParams(string $selectedYear, string $selectedMonth)
    {
        try {
            // Konfigurasi Nama Bulan
            $monthNames = [
                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
                7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
            ];

            // 1. Ambil Data dari Database sesuai filter (Logika Rekapitulasi)
            $rekapQuery = LayananBerkas::selectRaw('TAHUN, BULAN, count(*) as total_layanan')
                ->when($selectedYear !== 'all' && $selectedYear !== null, function ($query) use ($selectedYear) {
                    return $query->where('TAHUN', (int) $selectedYear); 
                })
                ->when($selectedMonth !== 'all' && $selectedMonth !== null, function ($query) use ($selectedMonth) {
                    return $query->where('BULAN', (int) $selectedMonth);
                })
                ->groupBy('TAHUN', 'BULAN')
                ->orderBy('TAHUN', 'desc')
                ->orderBy('BULAN', 'desc');

            $rekapData = $rekapQuery->get();

            // 🌟 PERBAIKAN LOGIKA PEMROSESAN DATA 🌟
            $processedData = $rekapData->map(function ($item) use ($monthNames) {
                // Konversi item menjadi array
            $arrayItem = $item->attributesToArray();                
                $data = $arrayItem;

                // 1. Tangani kunci total_layanan yang mungkin lowercase dari DB driver
                $totalLayananValue = $data['total_layanan'] ?? $data['TOTAL_LAYANAN'] ?? 0;
                $data['TOTAL_LAYANAN'] = $totalLayananValue;
                $data['total_layanan'] = $totalLayananValue; // Pastikan kedua casing ada

                // 2. Tambahkan nama bulan ke data
                $monthKey = $data['BULAN'] ?? $data['bulan'] ?? null;
                $data['BULAN_NAME'] = $monthKey ? ($monthNames[(int)$monthKey] ?? 'Tidak Diketahui') : 'Tidak Diketahui';
                
                // 3. Buat versi lowercase dan merge untuk fleksibilitas maksimal
                $lowercaseData = array_change_key_case($data, CASE_LOWER);
                $mergedData = array_merge($data, $lowercaseData);

                return $mergedData; 
            });

            // 2. Buat PDF dari View Blade Khusus
            $pdf = Pdf::loadView('pdf.rekapitulasi-layanan-arsip', [
                // CleanRecursive membersihkan karakter non-UTF8 dan mengubah array di dalamnya secara rekursif
                'data' => $this->cleanRecursive($processedData->toArray()),
                'year' => $this->cleanRecursive($selectedYear), 
                'month' => $this->cleanRecursive($selectedMonth),
                'monthNames' => $this->cleanRecursive($monthNames), 
            ]);
            
            // Konfigurasi DomPDF
            $pdf->setOptions([
                'defaultFont' => 'DejaVu Sans', 
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'chroot' => public_path(),
            ]);

            // 3. Download file
            $cleanedYear = $this->cleanRecursive($selectedYear);
            $cleanedMonth = $this->cleanRecursive($selectedMonth);
            $monthSlug = $cleanedMonth === 'all' ? 'semua' : ($monthNames[(int)$cleanedMonth] ?? 'unknown');
            
            $fileName = 'Rekap_Layanan_Arsip_' . $cleanedYear . '_' . $monthSlug . '_' . time() . '.pdf';

            return $pdf->download($fileName); 
            
        } catch (\Exception $e) {
            Log::error('PDF Export Failed: ' . $e->getMessage());
            
            return response()->stream(function() use ($e) {
                echo "Gagal membuat PDF. Detail Error: " . $e->getMessage();
            }, 500, [
                'Content-Type' => 'text/plain',
            ]);
        }
    }

    // --- FUNGSI TABLE FILAMENT ---

    public function table(Table $table): Table
    {
        return $table
            ->query(
                LayananBerkas::query()->orderBy('No', 'asc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('BULAN')
                    ->label('Bln/Thn')
                    ->formatStateUsing(function ($state, $record) {
                        $recordData = is_array($record) ? $record : collect($record)->toArray();
                        $bulan = $recordData['BULAN'] ?? $recordData['bulan'] ?? $state;
                        $tahun = $recordData['TAHUN'] ?? $recordData['tahun'] ?? '????';

                        return sprintf('%02d/%s', $bulan, $tahun);
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('Layanan')->label('Arsip')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('KodeBerkas')->label('Nomor Berkas')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('SifatLayan')->label('Sifat Layanan (Pelayanan)')->searchable(),
                Tables\Columns\TextColumn::make('SifatLain')->label('Sifat Layanan (Lainnya)')->searchable(),
                Tables\Columns\TextColumn::make('BerkasLayan')->label('Berkas yang dilayani (Berkas)')->searchable(),
                Tables\Columns\TextColumn::make('BerkasLain')->label('Berkas yang dilayani (Lainnya)')->searchable(),
                Tables\Columns\TextColumn::make('Nama')->label('Pengguna')->searchable(),
                Tables\Columns\TextColumn::make('UnitKerja')->label('Unit Kerja')->searchable(),

                Tables\Columns\TextColumn::make('Tanggal')
                    ->label('Tanggal')
                    ->formatStateUsing(function ($state) {
                        try {
                            return Carbon::createFromFormat('d/m/Y', $state)->format('d-m-Y');
                        } catch (\Exception $e) {
                            return $state;
                        }
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('StatusBerkas')
                    ->label('Kembali')
                    ->formatStateUsing(function ($state) {
                        try {
                            return Carbon::createFromFormat('d/m/Y', $state)->format('d-m-Y');
                        } catch (\Exception $e) {
                            return $state;
                        }
                    }),
            ])
            ->defaultSort('No', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('TAHUN')
                    ->options(
                        LayananBerkas::select('TAHUN')->distinct()->pluck('TAHUN', 'TAHUN')
                    )
                    ->label('Tahun'),

                Tables\Filters\SelectFilter::make('BULAN')
                    ->options([
                        1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
                        7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
                    ])
                    ->label('Bulan'),
            ])
            ->headerActions([
                Action::make('rekapitulasi')
                    ->label('📊 Tampilkan Rekapitulasi')
                    ->color('info')
                    ->icon('heroicon-o-chart-pie')
                    ->action(fn() => $this->dispatch('openRekapModal'))
            ]);
    }
}