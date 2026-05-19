@extends('layouts.app')

@section('content')
    {{-- ===== HEADER ===== --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-xl font-bold text-primary">Data Penggajian</h1>
            <p class="text-sm text-gray-400 mt-0.5">Kelola slip gaji seluruh karyawan</p>
        </div>
    </div>

    {{-- Alert Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif


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
                class="text-sm border w-30 border-gray-200 rounded-lg px-8 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>2023</option>
                <option>2024</option>
                <option selected>2025</option>
            </select>
        </div>
        <button class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/80 transition">
            Tampilkan
        </button>
    </div>


    {{-- ===== TABEL PENGGAJIAN ===== --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">


        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-base font-semibold text-gray-700">Data Penggajian</h2>
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
                    @forelse ($salaries as $salary)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold text-xs shrink-0">
                                        B</div>
                                    <span class="font-medium text-gray-800">{{ $salary->employee->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-500">{{ $salary->employee->position }}</td>
                            <td class="px-6 py-4 text-right text-gray-700">Rp.
                                {{ number_format($salary->gaji_pokok, 0, '.', '.') }}</td>
                            <td class="px-6 py-4 text-right text-green-600 font-medium">+ Rp
                                {{ number_format($salary->tunjangan_makan + $salary->tunjangan_transportasi, 0, '.', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right text-red-500 font-medium">- Rp
                                {{ number_format($salary->potongan, 0, '.', '.') }}</td>
                            <td class="px-6 py-4 text-right font-bold text-gray-800">Rp
                                {{ number_format($salary->gaji_bersih, 0, '.', '.') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('salary.show', $salary->id) }}"
                                        class="px-3 py-1.5 text-xs font-medium text-white bg-primary rounded-lg hover:bg-primary/80 transition">Detail</a>
                                    <form action="{{ route('salary.delete', $salary->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>Belum ada data gaji</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    {{-- ===== END TABEL ===== --}}
@endsection
