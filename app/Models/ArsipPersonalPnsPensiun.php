<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipPersonalPnsPensiun extends Model
{
    protected $table = 'tbpensiun'; // Nama tabel yang sesuai
    protected $connection = 'old'; // Koneksi ke database lama jika diperlukan
    protected $primaryKey = 'ID';
    public $timestamps = false; // Jika tabel tidak memiliki kolom created_at dan updated_at

    protected $fillable = [
        'NIP',
        'NAMA',
        'TANGGALLAHIR',
        'TANGGALPENSIUN',
        'LEMARI',
        'LACI',
        'KODEBERKAS',
    ];
}
