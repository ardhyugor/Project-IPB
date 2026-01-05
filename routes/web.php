<?php

use Illuminate\Support\Facades\Route;
use App\Models\Agenda;
use App\Filament\Pages\RiwayatLayananArsip;
use App\Http\Controllers\LayananBerkasController;
use Barryvdh\DomPDF\Facade\Pdf;


Route::get('/agenda/{id}/cetak', function ($id) {
    $agenda = Agenda::findOrFail($id);

    $pdf = Pdf::loadView('pdf.agenda', compact('agenda'));

    return $pdf->download('agenda-' . $agenda->NOMORAGENDA . '.pdf');
})->name('agenda.cetak');   

Route::get('/cetak-layanan/{no}', [LayananBerkasController::class, 'cetak'])
    ->name('cetak.layanan');

Route::get('/', function(){
    return view('pages.home');
})->name('home');

Route::get('infografis', function(){
    return view('pages.infografis');
})->name('infografis');

Route::get('unit-kerja', function(){
    return view('pages.unit-kerja');
})->name('unit-kerja');

Route::get('kebijakan', function(){
    return view('pages.kebijakan');
})->name('kebijakan');

Route::get('layanan-arsip', function(){
    return view('pages.layanan');
})->name('layanan-arsip');

Route::get('ketentuan-pengguna', function(){
    return view('pages.ketentuan-pengguna');
})->name('ketentuan-pengguna');
