<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Layanan PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        .line { margin: 10px 0; }
    </style>
</head>
<body>
    <h2>Data Layanan Berkas</h2>

    <div class="line"><strong>Kode Berkas:</strong> {{ $layanan->KodeBerkas }}</div>
    <div class="line"><strong>Status:</strong> {{ $layanan->StatusBerkas }}</div>
    <div class="line"><strong>Pengguna:</strong> {{ $layanan->Pengguna }}</div>
    <div class="line"><strong>Unit Kerja:</strong> {{ $layanan->UnitKerja }}</div>
    <div class="line"><strong>Tanggal Pinjam:</strong> 
        {{ $layanan->Tanggal ? \Carbon\Carbon::parse($layanan->Tanggal)->format('d M Y') : '-' }}
    </div>
    <div class="line"><strong>Tanggal Kembali:</strong> 
        {{ $layanan->kembali ? \Carbon\Carbon::parse($layanan->kembali)->format('d M Y') : '-' }}
    </div>
    <div class="line"><strong>Sifat Layanan:</strong> {{ $layanan->SifatLayan ?? '-' }}</div>
    <div class="line"><strong>Sifat Lain:</strong> {{ $layanan->SifatLain ?? '-' }}</div>
    <div class="line"><strong>Berkas Dilayani:</strong> {{ $layanan->BerkasLayan ?? '-' }}</div>
</body>
</html>
