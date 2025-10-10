<?php

use Illuminate\Support\Facades\Route;
use App\Models\Agenda;
use App\Http\Controllers\LayananBerkasController;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () {
    return redirect('/admin');
});



Route::get('/agenda/{id}/cetak', function ($id) {
    $agenda = Agenda::findOrFail($id);

    $pdf = Pdf::loadView('pdf.agenda', compact('agenda'));

    return $pdf->download('agenda-' . $agenda->NOMORAGENDA . '.pdf');
})->name('agenda.cetak');   

Route::get('/cetak-layanan/{no}', [LayananBerkasController::class, 'cetak'])
    ->name('cetak.layanan');

