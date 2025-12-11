<!DOCTYPE html>
<html>
<head>
    <title>Rekapitulasi Layanan Arsip</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* Gaya umum untuk PDF */
        body {
            font-family: 'DejaVu Sans', sans-serif; /* Penting untuk mendukung UTF-8 (Emoji, karakter non-standar) */
            font-size: 10pt;
            margin: 30px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 16pt;
        }
        .filter-info {
            margin-bottom: 20px;
            text-align: center;
            font-size: 11pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
        .font-bold {
            font-weight: bold;
        }
        /* Hapus atau nonaktifkan style untuk kotak merah debug */
        .debug-dump {
            display: none; 
            /* Atau jika Anda ingin membiarkannya di source, hapus tag HTML-nya */
        }
    </style>
</head>
<body>

    <h1>REKAPITULASI LAYANAN ARSIP</h1>

    <div class="filter-info">
        @php
            // Membantu menampilkan deskripsi filter
            $yearLabel = $year === 'all' ? 'Semua Tahun' : $year;
            $monthLabel = $month === 'all' ? 'Semua Bulan' : ($monthNames[(int)$month] ?? 'Tidak Diketahui');
        @endphp
        Filter: Tahun: {{ $yearLabel }}  Bulan: {{ $monthLabel }}
    </div>

    {{-- KOTAK DEBUG/ERROR (DIHAPUS DARI SINI) --}}
    {{-- Hapus semua kode yang menghasilkan konten berwarna merah di sini --}}

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Tahun</th>
                <th width="40%">Bulan</th>
                <th width="35%">Total Layanan</th>
            </tr>
        </thead>
        <tbody>
            @php 
                $i = 1; 
                $grandTotal = 0; 
            @endphp
            @forelse ($data as $item)
                @php
                    // Ambil nilai dengan fleksibilitas casing
                    $itemYear = $item['TAHUN'] ?? $item['tahun'] ?? '????';
                    $itemMonthName = $item['BULAN_NAME'] ?? $item['bulan_name'] ?? 'Tidak Diketahui';
                    $itemTotal = $item['total_layanan'] ?? $item['TOTAL_LAYANAN'] ?? 0;
                    
                    // Hitung Grand Total (pastikan $itemTotal adalah angka)
                    $grandTotal += (int)$itemTotal;
                @endphp
                <tr>
                    <td class="text-center">{{ $i++ }}</td>
                    <td class="text-center">{{ $itemYear }}</td>
                    <td>{{ $itemMonthName }}</td>
                    <td class="text-center font-bold">{{ $itemTotal }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data rekapitulasi yang tersedia untuk filter ini.</td>
                </tr>
            @endforelse

            {{-- BARIS TOTAL KESELURUHAN --}}
            @if(count($data) > 0)
            <tr style="background-color: #e0f7fa;">
                <td colspan="3" class="text-right font-bold">TOTAL KESELURUHAN</td>
                <td class="text-center font-bold">{{ $grandTotal }}</td>
            </tr>
            @endif
        </tbody>
    </table>

</body>
</html>