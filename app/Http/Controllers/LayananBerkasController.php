<?php

namespace App\Http\Controllers;

use App\Models\LayananBerkas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // pastikan sudah install barryvdh/laravel-dompdf

class LayananBerkasController extends Controller
{
    public function cetak($no)
    {
        $layanan = LayananBerkas::findOrFail($no);

        $pdf = Pdf::loadView('pdf.layanan', compact('layanan'));

        return $pdf->download('layanan-' . $layanan->No . '.pdf');
    }
}
