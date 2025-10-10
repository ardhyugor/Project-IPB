<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BlogPostsChart extends ChartWidget
{
    protected static ?string $heading = 'Rekapitulasi Pegawai';

    protected function getData(): array
    {
        // Ambil data dari DB lama
        $pnsAktif      = DB::connection('old')->table('tbpersonal')->count('ID');
        $pnsPensiun    = DB::connection('old')->table('tbpensiun')->count('ID');
        $nonPnsKontrak = DB::connection('old')->table('tbkontrak')->count('ID');
        $nonPnsTetap   = DB::connection('old')->table('tb_tetap')->count('ID');

        return [
            'datasets' => [
                [
                    'label' => 'Rekapitulasi Bulanan',
                    'backgroundColor' => [
                        '#3B82F6', // PNS Aktif
                        '#25EB46', // PNS Pensiun
                        '#CC1414', // Non PNS Kontrak
                        '#FF9900', // Non PNS Tetap
                    ],
                    'data' => [
                        $pnsAktif,
                        $pnsPensiun,
                        $nonPnsKontrak,
                        $nonPnsTetap,
                    ],
                ],
            ],
            'labels' => [
                'PNS Aktif',
                'PNS Pensiun',
                'Non PNS Kontrak',
                'Non PNS Tetap',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
