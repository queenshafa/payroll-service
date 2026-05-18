@extends('layouts.app')


@section('title', 'Detail Slip Gaji')


@section('content')


    {{-- ===== HEADER ===== --}}
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('salary.index') }}"
            class="p-2 rounded-lg hover:bg-gray-100 transition text-gray-400 hover:text-gray-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div>
            <h1 class="text-xl font-bold text-gray-800">Detail Slip Gaji</h1>
            <p class="text-sm text-gray-400 mt-0.5">Periode
                {{ \Carbon\Carbon::create()->month($salary->bulan)->translatedFormat('F') }}
                {{ $salary->tahun }}
            </p>
        </div>
    </div>


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


        {{-- ===== KOLOM KIRI ===== --}}
        <div class="lg:col-span-2 space-y-5">


            {{-- Info Karyawan --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                <h2 class="text-sm font-semibold text-gray-700 mb-4 pb-3 border-b border-gray-100">
                    Informasi Karyawan
                </h2>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Nama</span>
                        <span class="font-medium text-gray-700">{{ $salary->employee->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">NIP</span>
                        <span class="font-medium text-gray-700">{{ $salary->employee->nip }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Jabatan</span>
                        <span class="font-medium text-gray-700">{{ $salary->employee->position ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Periode</span>
                        <span class="font-medium text-gray-700">
                            {{ \Carbon\Carbon::create()->month($salary->bulan)->translatedFormat('F') }}
                            {{ $salary->tahun }}
                        </span>
                    </div>
                </div>
            </div>


            {{-- Komponen Gaji --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6">
                <h2 class="text-sm font-semibold text-gray-700 mb-4 pb-3 border-b border-gray-100">
                    Komponen Gaji
                </h2>
                <div class="space-y-3 text-sm">


                    {{-- Pendapatan --}}
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Pendapatan</p>


                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Gaji Pokok</span>
                        <span class="font-medium text-gray-700">
                            Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Tunjangan Makan</span>
                        <span class="font-medium text-green-600">
                            + Rp {{ number_format($salary->tunjangan_makan, 0, ',', '.') }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Tunjangan Transportasi</span>
                        <span class="font-medium text-green-600">
                            + Rp {{ number_format($salary->tunjangan_transportasi, 0, ',', '.') }}
                        </span>
                    </div>


                    {{-- Potongan --}}
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide pt-2">Potongan</p>


                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Potongan</span>
                        <span class="font-medium text-red-500">
                            - Rp {{ number_format($salary->potongan, 0, ',', '.') }}
                        </span>
                    </div>


                    {{-- Total --}}
                    <div class="border-t border-dashed border-gray-200 pt-3 mt-3 flex justify-between items-center">
                        <span class="font-semibold text-gray-700">Gaji Bersih</span>
                        <span class="font-bold text-blue-600 text-base">
                            Rp {{ number_format($salary->gaji_bersih, 0, ',', '.') }}
                        </span>
                    </div>


                </div>
            </div>


        </div>
        {{-- ===== END KOLOM KIRI ===== --}}


        {{-- ===== KOLOM KANAN ===== --}}
        <div class="space-y-5">


            {{-- Ringkasan --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 mt-4">
                <h2 class="text-sm font-semibold text-gray-700 mb-4 pb-3 border-b border-gray-100">
                    Ringkasan
                </h2>
                <div class="text-center py-4">
                    <p class="text-xs text-gray-400 mb-1">Total Diterima</p>
                    <p class="text-2xl font-bold text-blue-600">
                        Rp {{ number_format($salary->gaji_bersih, 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-400 mt-1">
                        {{ \Carbon\Carbon::create()->month($salary->bulan)->translatedFormat('F') }}
                        {{ $salary->tahun }}
                    </p>
                </div>


                {{-- Badge --}}
                <div class="mt-4 flex justify-center">
                    <span
                        class="px-3 py-1 bg-green-50 text-green-600 text-xs font-semibold rounded-full border border-green-100">
                        ✓ Slip Gaji Tersimpan
                    </span>
                </div>
            </div>


            {{-- Aksi --}}
            <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 space-y-3 mt-4">
                <a href="{{ route('salary.download', $salary->id) }}"
                    class="block w-full py-3 text-center text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                    Download Slip Gaji
                </a>
            </div>


        </div>
        {{-- ===== END KOLOM KANAN ===== --}}


    </div>


@endsection
