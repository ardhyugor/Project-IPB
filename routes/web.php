<?php

use Illuminate\Support\Facades\Route;
use App\Models\Agenda;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/agenda/{id}/cetak', function ($id) {
    $agenda = Agenda::findOrFail($id);

    $pdf = Pdf::loadView('pdf.agenda', compact('agenda'));

    return $pdf->download('agenda-' . $agenda->NOMORAGENDA . '.pdf');
})->name('agenda.cetak');   
