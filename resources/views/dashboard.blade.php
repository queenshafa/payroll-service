@extends('layouts.app')

@section('content')
    <h1 class=" text-5xl text-primary font-bold mb-6">Hello, {{ auth()->user()->name }}</h1>
    {{-- ===== STAT CARDS ===== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">


        {{-- Total Karyawan --}}
        <div class="bg-primary rounded-xl shadow-sm p-5 flex items-center gap-4 border border-gray-100">
            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-800 font-medium">Total Karyawan</p>
                <p class="text-2xl font-bold text-gray-800">24</p>
            </div>
        </div>


        {{-- Digaji Bulan Ini --}}
        <div class="bg-secondary rounded-xl shadow-sm p-5 flex items-center gap-4 border border-gray-100">
            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-800 font-medium">Digaji Bulan Ini</p>
                <p class="text-2xl font-bold text-gray-800">20</p>
            </div>
        </div>


        {{-- Total Gaji Bulan Ini --}}
        <div class="bg-tertiary rounded-xl shadow-sm p-5 flex items-center gap-4 border border-gray-100">
            <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-800 font-medium">Total Gaji Bulan Ini</p>
                <p class="text-2xl font-bold text-gray-800">Rp 98.500.000</p>
            </div>
        </div>


        {{-- Periode --}}
        {{-- <div class="bg-white rounded-xl shadow-sm p-5 flex items-center gap-4 border border-gray-100">
            <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-400 font-medium">Periode</p>
                <p class="text-2xl font-bold text-gray-800">Mei 2025</p>
            </div>
        </div> --}}


    </div>
    {{-- ===== END STAT CARDS ===== --}}




    {{-- ===== TABEL KARYAWAN ===== --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">


        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-base font-semibold text-gray-700">Daftar Karyawan</h2>
            <a href="#"
                class="inline-flex items-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Karyawan
            </a>
        </div>


        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold">Jabatan</th>
                        <th class="px-6 py-3 text-left font-semibold">Gaji Pokok</th>
                        <th class="px-6 py-3 text-left font-semibold">Tanggal Bergabung</th>
                        <th class="px-6 py-3 text-left font-semibold">Aksi</th>
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
                        <td class="px-6 py-4 text-gray-600">Programmer</td>
                        <td class="px-6 py-4 font-medium text-gray-800">Rp 5.000.000</td>
                        <td class="px-6 py-4 text-gray-500">01 Mar 2022</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="#"
                                    class="px-3 py-1.5 text-xs font-medium text-white bg-primary rounded-lg hover:bg-blue-100 transition">Edit</a>
                                <button
                                    class="px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
    {{-- ===== END TABEL ===== --}}
@endsection
