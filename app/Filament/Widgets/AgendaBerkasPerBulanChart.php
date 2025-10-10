<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class AgendaBerkasPerBulanChart extends ChartWidget
{
    protected static ?string $heading = 'Agenda Berkas Masuk per Bulan';

    protected function getData(): array
    {
        $data = DB::connection('old')
            ->table('tb_agendaberkasmasuk')
            ->selectRaw('MONTH(TANGGALAGENDA) as bulan, COUNT(*) as total')
            ->whereYear('TANGGALAGENDA', now()->year)
            ->groupBy(DB::raw('MONTH(TANGGALAGENDA)'))
            ->orderBy('bulan')
            ->get();


        $labels = [];
        $totals = [];
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
            12 => 'Desember',
        ];

        foreach ($data as $row) {
            $labels[] = $namaBulan[$row->bulan];
            $totals[] = $row->total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Berkas Masuk',
                    'backgroundColor' => '#3B82F6',
                    'data' => $totals,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // atau 'line'
    }
}
