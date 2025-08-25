<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Agenda PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        .line { margin: 10px 0; }
    </style>
</head>
<body>
    <h2>Data Agenda</h2>
    <div class="line"><strong>Nomor Agenda:</strong> {{ $agenda->NOMORAGENDA }}</div>
    <div class="line"><strong>Tanggal Agenda:</strong> {{ \Carbon\Carbon::parse($agenda->TANGGALAGENDA)->format('d M Y') }}</div>
    <div class="line"><strong>Nomor Berkas:</strong> {{ $agenda->NOMORBERKAS }}</div>
    <div class="line"><strong>Perihal:</strong> {{ $agenda->PERIHAL }}</div>
    <div class="line"><strong>Tanggal Berkas:</strong> {{ \Carbon\Carbon::parse($agenda->TANGGALBERKAS)->format('d M Y') }}</div>
    <div class="line"><strong>Asal Berkas:</strong> {{ $agenda->ASALBERKAS }}</div>
    <div class="line"><strong>Bulan:</strong> {{ $agenda->BULAN }}</div>
    <div class="line"><strong>Tahun:</strong> {{ $agenda->TAHUN }}</div>
</body>
</html>