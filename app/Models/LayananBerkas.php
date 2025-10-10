<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananBerkas extends Model
{
    protected $table = 'tbpinjamberkaspns';
    protected $connection = 'old'; // Koneksi ke database lama jika diperlukan
    protected $primaryKey = 'No';
    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan
    

    protected $fillable = [
    'KodeBerkas',
    'Layanan', // ⬅️ tambahkan
    'StatusBerkas',
    'SifatLayan',
    'SifatLain',
    'BerkasLayan',
    'BerkasLain',
    'Pengguna',
    'Nama',
    'UnitKerja',
    'Subdit',
    'Seksi',
    'keluar',
    'BULAN',
    'TAHUN',
    'ID',
    'Tanggal',
    'kembali',
    'Operator',
    ];
}
