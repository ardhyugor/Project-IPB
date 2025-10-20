<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipPersonalPnsAktif extends Model
{
    protected $table = 'tbpersonal'; // Nama tabel yang sesuai
    protected $connection = 'old'; // Koneksi ke database lama jika diperlukan
    protected $primaryKey = 'NIP';
    public $timestamps = false; // Jika tabel tidak memiliki kolom created_at dan updated_at

    protected $fillable = [
        'NIP',
        'NAMA',
        'TanggalLahir',
        'JenisKelamin',
        'THNANGKAT',
        'Unit',
        'StsKpg',
        'LEMARI',
        'HAMBALAN',
        'NOMORBERKAS',
    ];
}
