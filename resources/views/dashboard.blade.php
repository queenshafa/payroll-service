@extends('layouts.app')

@section('content')
    <div class="h-[100px] flex items-center px-6 bg-cover bg-center rounded-lg mb-4"
        style="background-image: url('{{ asset('assets/title-bg.png') }}');">
        <h1 class="text-5xl text-white font-bold">
            Hello, {{ auth()->user()->name }}
        </h1>
    </div>
    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
        {{-- Total Employees --}}
        <div class="bg-primary rounded-xl shadow-sm p-5 flex items-center gap-4 border border-gray-100">
            <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-800 font-medium">Total Employees</p>
                <p class="text-2xl font-bold text-gray-800">{{ $totalEmployees }}</p>
            </div>
        </div>


        {{-- Paid This Month --}}
        <div class="bg-secondary rounded-xl shadow-sm p-5 flex items-center gap-4 border border-gray-100">
            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-800 font-medium">Paid This Month</p>
                <p class="text-2xl font-bold text-gray-800">{{ $paidThisMonth }}</p>
            </div>
        </div>


        {{-- Total Salary This Month --}}
        <div class="bg-tertiary rounded-xl shadow-sm p-5 flex items-center gap-4 border border-gray-100">
            <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-800 font-medium">Total Salary This Month</p>
                <p class="text-2xl font-bold text-gray-800">Rp {{ number_format($totalSalaryThisMonth, 0, '.', '.') }}</p>
            </div>
        </div>
    </div>

    {{-- Employee Table --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-base font-semibold text-gray-700">Employee List</h2>
            <a href="{{ route('karyawan.create') }}"
                class="inline-flex items-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Employee
            </a>
        </div>


        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Name</th>
                        <th class="px-6 py-3 text-left font-semibold">Position</th>
                        <th class="px-6 py-3 text-left font-semibold">Basic Salary</th>
                        <th class="px-6 py-3 text-left font-semibold">Joining Date</th>
                        <th class="px-6 py-3 text-left font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($employees as $employee)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold text-xs shrink-0">
                                        {{ strtoupper(substr($employee->name, 0, 1)) }}</div>
                                    <span class="font-medium text-gray-800">{{ $employee->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">{{ $employee->position }}</td>
                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ number_format($employee->salary, 0, '.', '.') }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $employee->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="#"
                                        class="px-3 py-1.5 text-xs font-medium text-white bg-primary rounded-lg hover:bg-blue-100 transition">Edit</a>
                                    <button
                                        class="px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition">Hapus</button>
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
