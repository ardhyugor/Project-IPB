<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inaktif extends Model
{
    protected $table = 'tb_inaktif'; // Nama tabel yang sesuai
    protected $connection = 'old'; // Koneksi ke database lama jika diperlukan
    protected $primaryKey = 'ID';
    public $timestamps = false; // Jika tabel tidak memiliki kolom created_at dan updated_at

    protected $fillable = [
        'ID',
        'TAHUN',
        'NOMORBOX',
        'NOMORBERKAS',
        'NOITEMARSIP',
        'URAIAN'
    ];
}
