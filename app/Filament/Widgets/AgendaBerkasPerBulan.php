<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Filament\Actions\Action;
use Illuminate\Support\Facades\DB;

class AgendaBerkasPerBulan extends Widget
{
    protected static string $view = 'filament.widgets.agenda-berkas-per-bulan';

    public bool $showTable = false;

    public function toggleTable()
    {
        $this->showTable = ! $this->showTable;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('rekap')
                ->label(fn () => $this->showTable ? 'Lihat Chart' : 'Lihat Tabel')
                ->action(fn () => $this->toggleTable())
                ->color('info')
                ->icon('heroicon-o-squares-2x2'),
        ];
    }

    public function getData(): array
    {
        $data = DB::connection('old')
            ->table('tbpinjamberkaspns')
            ->selectRaw('BULAN as bulan, COUNT(*) as total')
            ->whereYear('Tanggal', now()->year)
            ->groupBy(DB::raw('BULAN'))
            ->orderBy('bulan')
            ->get();

        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

        $labels = [];
        $totals = [];

        foreach ($data as $row) {
            $labels[] = $namaBulan[$row->bulan];
            $totals[] = $row->total;
        }

        return [
            'labels' => $labels,
            'totals' => $totals,
        ];
    }
}
