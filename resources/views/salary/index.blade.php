@extends('layouts.app')

@section('content')
    {{-- ===== HEADER ===== --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-xl font-bold text-gray-800">Data Penggajian</h1>
            <p class="text-sm text-gray-400 mt-0.5">Kelola slip gaji seluruh karyawan</p>
        </div>
    </div>


    {{-- ===== FILTER ===== --}}
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 mb-6 flex flex-wrap items-center gap-3">
        <div class="flex items-center gap-2">
            <label class="text-sm text-gray-500 font-medium">Bulan</label>
            <select
                class="text-sm border border-gray-200 rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>Januari</option>
                <option>Februari</option>
                <option>Maret</option>
                <option>April</option>
                <option selected>Mei</option>
                <option>Juni</option>
                <option>Juli</option>
                <option>Agustus</option>
                <option>September</option>
                <option>Oktober</option>
                <option>November</option>
                <option>Desember</option>
            </select>
        </div>
        <div class="flex items-center gap-2">
            <label class="text-sm text-gray-500 font-medium">Tahun</label>
            <select
                class="text-sm border border-gray-200 rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>2023</option>
                <option>2024</option>
                <option selected>2025</option>
            </select>
        </div>
        <button class="px-4 py-2 bg-gray-700 text-white text-sm font-medium rounded-lg hover:bg-gray-800 transition">
            Tampilkan
        </button>
    </div>


    {{-- ===== TABEL PENGGAJIAN ===== --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">


        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-base font-semibold text-gray-700">Periode: Mei 2025</h2>
        </div>


        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Nama Karyawan</th>
                        <th class="px-6 py-3 text-left font-semibold">Jabatan</th>
                        <th class="px-6 py-3 text-right font-semibold">Gaji Pokok</th>
                        <th class="px-6 py-3 text-right font-semibold">Tunjangan</th>
                        <th class="px-6 py-3 text-right font-semibold">Potongan</th>
                        <th class="px-6 py-3 text-right font-semibold">Gaji Bersih</th>
                        <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">


                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-gray-400">1</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold text-xs shrink-0">
                                    B</div>
                                <span class="font-medium text-gray-800">Budi Santoso</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-500">Programmer</td>
                        <td class="px-6 py-4 text-right text-gray-700">Rp 5.000.000</td>
                        <td class="px-6 py-4 text-right text-green-600 font-medium">+ Rp 1.000.000</td>
                        <td class="px-6 py-4 text-right text-red-500 font-medium">- Rp 250.000</td>
                        <td class="px-6 py-4 text-right font-bold text-gray-800">Rp 5.750.000</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="#"
                                    class="px-3 py-1.5 text-xs font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition">Detail</a>
                                <a href="#"
                                    class="px-3 py-1.5 text-xs font-medium text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition">PDF</a>
                                <button
                                    class="px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>


                {{-- Total Footer --}}
                <tfoot>
                    <tr class="bg-gray-50 border-t-2 border-gray-200">
                        <td colspan="3" class="px-6 py-4 text-sm font-semibold text-gray-600">Total Pengeluaran</td>
                        <td class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Rp 24.500.000</td>
                        <td class="px-6 py-4 text-right text-sm font-semibold text-green-600">+ Rp 4.700.000</td>
                        <td class="px-6 py-4 text-right text-sm font-semibold text-red-500">- Rp 1.225.000</td>
                        <td class="px-6 py-4 text-right text-sm font-bold text-blue-600">Rp 27.975.000</td>
                        <td></td>
                    </tr>
                </tfoot>


            </table>
        </div>


    </div>
    {{-- ===== END TABEL ===== --}}
@endsection
