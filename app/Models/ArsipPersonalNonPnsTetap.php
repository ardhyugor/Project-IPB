<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArsipPersonalNonPnsTetap extends Model
{
    protected $table = 'tb_tetap'; // Nama tabel yang sesuai
    protected $connection = 'old'; // Koneksi ke database lama jika diperlukan
    protected $primaryKey = 'No';
    public $timestamps = false; // Jika tabel tidak memiliki kolom created_at dan updated_at

    protected $fillable = [
        'NIP',
        'NAMA',
        'LEMARI',
        'LACI',
        'KODEBERKAS',
    ];
}

