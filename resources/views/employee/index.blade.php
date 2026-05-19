@extends('layouts.app')

@section('content')
    {{-- Header --}}
    <div class="h-[100px] flex flex-col justify-center px-6 bg-cover bg-center rounded-lg mb-8"
        style="background-image: url('{{ asset('assets/title-bg.png') }}');">
        <h1 class="text-3xl font-bold text-white mb-2">Data Karyawan</h1>
        <p class="text-white">Kelola informasi karyawan dan data lengkap mereka</p>
    </div>

    {{-- Alert Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table Section --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-base font-semibold text-gray-700">Daftar Karyawan</h2>
            <a href="{{ route('karyawan.create') }}"
                class="inline-flex items-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/80 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Karyawan
            </a>
        </div>

        {{-- Search & Filter --}}
        <div class="px-6 py-4 border-b border-gray-100 flex gap-3">
            <div class="flex-1">
                <input type="text" placeholder="Cari nama atau NIK karyawan..."
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <button class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            </button>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Nama</th>
                        <th class="px-6 py-3 text-left font-semibold">NIP</th>
                        <th class="px-6 py-3 text-left font-semibold">Jabatan</th>
                        <th class="px-6 py-3 text-left font-semibold">Gaji Pokok</th>
                        <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($employees as $employee)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $employee->name }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $employee->nip }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $employee->position }}</td>
                            <td class="px-6 py-4 text-gray-600">Rp. {{ number_format($employee->salary, 0, '.', '.') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">

                                    {{-- Tambah Gaji Button --}}
                                    <a href="{{ route('salary.create', $employee->id) }}"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition text-xs font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    {{-- Edit Button --}}
                                    <a href="{{ route('karyawan.edit', $employee->id) }}"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-yellow-600 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition text-xs font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('karyawan.destroy', $employee->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menhapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition text-xs font-medium">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>
@endsection
