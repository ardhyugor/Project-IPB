<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    protected $connection = 'old'; // koneksi ke db_old
    protected $table = 'tb_agendaberkasmasuk'; // sesuaikan dengan nama tabel
    protected $primaryKey = 'NOMORAGENDA'; // atau ganti jika primary key kamu berbeda
    public $timestamps = false; // jika tidak ada kolom created_at & updated_at

    protected $fillable = [
        'NOMORAGENDA',
        'TANGGALAGENDA',
        'NOMORBERKAS',
        'PERIHAL',
        'TANGGALBERKAS',
        'ASALBERKAS',
        'BULAN',
        'TAHUN',
    ];
}
