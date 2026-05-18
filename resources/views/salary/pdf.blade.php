<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #1f2937;
            background: #fff;
        }


        .page {
            padding: 40px;
        }


        /* ── Header perusahaan ── */
        .company-header {
            border-bottom: 2px solid #2563eb;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }

        .company-name {
            font-size: 18px;
            font-weight: bold;
            color: #2563eb;
        }

        .company-sub {
            font-size: 11px;
            color: #6b7280;
            margin-top: 2px;
        }

        .slip-title {
            text-align: right;
            font-size: 14px;
            font-weight: bold;
            color: #1f2937;
        }

        .slip-period {
            text-align: right;
            font-size: 11px;
            color: #6b7280;
            margin-top: 2px;
        }


        /* ── Info karyawan ── */
        .info-box {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 14px 18px;
            margin-bottom: 20px;
        }

        .info-box table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-box td {
            padding: 4px 0;
            font-size: 11.5px;
        }

        .info-box td:first-child {
            color: #6b7280;
            width: 140px;
        }

        .info-box td:nth-child(2) {
            width: 10px;
            color: #6b7280;
        }

        .info-box td:last-child {
            font-weight: 600;
            color: #111827;
        }


        /* ── Tabel komponen gaji ── */
        .section-title {
            font-size: 11px;
            font-weight: bold;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
            margin-top: 16px;
        }

        .salary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 4px;
        }

        .salary-table td {
            padding: 7px 10px;
            font-size: 12px;
            border-bottom: 1px solid #f3f4f6;
        }

        .salary-table td:last-child {
            text-align: right;
            font-weight: 500;
        }

        .salary-table tr:last-child td {
            border-bottom: none;
        }

        .text-green {
            color: #16a34a;
        }

        .text-red {
            color: #dc2626;
        }


        /* ── Total ── */
        .total-box {
            border-top: 2px dashed #d1d5db;
            margin-top: 12px;
            padding-top: 12px;
            display: table;
            width: 100%;
        }

        .total-box table {
            width: 100%;
        }

        .total-box td {
            padding: 4px 10px;
            font-size: 14px;
        }

        .total-box td:last-child {
            text-align: right;
            font-weight: bold;
            color: #2563eb;
            font-size: 15px;
        }

        .total-label {
            font-weight: bold;
            color: #1f2937;
        }


        /* ── Footer ── */
        .footer {
            margin-top: 40px;
            border-top: 1px solid #e5e7eb;
            padding-top: 16px;
            display: table;
            width: 100%;
        }

        .footer-left {
            display: table-cell;
            font-size: 10px;
            color: #9ca3af;
        }

        .footer-right {
            display: table-cell;
            text-align: right;
            font-size: 10px;
            color: #9ca3af;
        }

        .ttd-box {
            margin-top: 30px;
            text-align: right;
        }

        .ttd-box p {
            font-size: 11px;
            color: #6b7280;
        }

        .ttd-line {
            margin-top: 50px;
            border-top: 1px solid #374151;
            width: 160px;
            display: inline-block;
        }

        .ttd-name {
            font-size: 11px;
            font-weight: bold;
            color: #374151;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="page">


        {{-- ===== HEADER ===== --}}
        <table style="width:100%; margin-bottom: 24px; border-bottom: 2px solid #2563eb; padding-bottom: 14px;">
            <tr>
                <td>
                    <div class="company-name">PT. Nama Perusahaan</div>
                    <div class="company-sub">Jl. Contoh Alamat No. 1, Kota, Indonesia</div>
                    <div class="company-sub">Telp: (021) 000-0000 &nbsp;|&nbsp; hr@perusahaan.com</div>
                </td>
                <td style="text-align: right; vertical-align: top;">
                    <div class="slip-title">SLIP GAJI</div>
                    <div class="slip-period">
                        Periode:
                        @php
                            $namaBulan = [
                                1 => 'Januari',
                                2 => 'Februari',
                                3 => 'Maret',
                                4 => 'April',
                                5 => 'Mei',
                                6 => 'Juni',
                                7 => 'Juli',
                                8 => 'Agustus',
                                9 => 'September',
                                10 => 'Oktober',
                                11 => 'November',
                                12 => 'Desember',
                            ];
                        @endphp
                        {{ $namaBulan[$salary->bulan] }} {{ $salary->tahun }}
                    </div>
                </td>
            </tr>
        </table>


        {{-- ===== INFO KARYAWAN ===== --}}
        <div class="info-box">
            <table>
                <tr>
                    <td>Nama Karyawan</td>
                    <td>:</td>
                    <td>{{ $salary->employee->name }}</td>
                    <td style="width:60px"></td>
                    <td style="color:#6b7280; width:120px">NIK</td>
                    <td style="width:10px; color:#6b7280">:</td>
                    <td style="font-weight:600; color:#111827">{{ $salary->employee->nik }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ $salary->employee->position ?? '-' }}</td>
                    <td></td>
                    <td style="color:#6b7280">Departemen</td>
                    <td style="color:#6b7280">:</td>
                    <td style="font-weight:600; color:#111827">{{ $salary->employee->department ?? '-' }}</td>
                </tr>
            </table>
        </div>


        {{-- ===== PENDAPATAN ===== --}}
        <div class="section-title">Pendapatan</div>
        <table class="salary-table">
            <tr>
                <td>Gaji Pokok</td>
                <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Tunjangan Makan</td>
                <td class="text-green">+ Rp {{ number_format($salary->tunjangan_makan, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td>Tunjangan Transportasi</td>
                <td class="text-green">+ Rp {{ number_format($salary->tunjangan_transportasi, 0, ',', '.') }}</td>
            </tr>
        </table>


        {{-- ===== POTONGAN ===== --}}
        <div class="section-title">Potongan</div>
        <table class="salary-table">
            <tr>
                <td>Potongan</td>
                <td class="text-red">- Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
            </tr>
        </table>


        {{-- ===== TOTAL ===== --}}
        <div class="total-box">
            <table>
                <tr>
                    <td class="total-label">Gaji Bersih Diterima</td>
                    <td>Rp {{ number_format($salary->gaji_bersih, 0, ',', '.') }}</td>
                </tr>
            </table>
        </div>


        {{-- ===== TTD ===== --}}
        <div class="ttd-box">
            <p>Hormat kami,</p>
            <p style="margin-top:4px; font-size:11px; color:#6b7280">
                {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <div class="ttd-line"></div>
            <div class="ttd-name">HRD / Manager</div>
        </div>


        {{-- ===== FOOTER ===== --}}
        <div class="footer">
            <div class="footer-left">
                Dokumen ini digenerate otomatis oleh sistem payroll.<br>
                Tidak memerlukan tanda tangan basah.
            </div>
            <div class="footer-right">
                Dicetak: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}
            </div>
        </div>


    </div>
</body>

</html>
