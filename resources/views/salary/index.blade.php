@extends('layouts.app')

@section('title', 'Payroll')

@section('content')
    {{-- Header --}}
    <div class="h-[100px] flex flex-col justify-center px-6 bg-cover bg-center rounded-lg mb-8"
        style="background-image: url('{{ asset('assets/title-bg.png') }}');">
        <h1 class="text-3xl font-bold text-white mb-2">Payroll Data</h1>
        <p class="text-white">Manage all employees' pay slips.</p>
    </div>

    {{-- Alert Message --}}
    @if (session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-4 mb-6 flex flex-wrap items-center gap-3">
        <div class="flex items-center gap-2">
            <label class="text-sm text-gray-500 font-medium">Month</label>
            <select
                class="text-sm border border-gray-200 rounded-lg px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>January</option>
                <option>February</option>
                <option>March</option>
                <option>April</option>
                <option selected>May</option>
                <option>June</option>
                <option>July</option>
                <option>August</option>
                <option>September</option>
                <option>October</option>
                <option>November</option>
                <option>December</option>
            </select>
        </div>
        <div class="flex items-center gap-2">
            <label class="text-sm text-gray-500 font-medium">Year</label>
            <select
                class="text-sm border w-30 border-gray-200 rounded-lg px-8 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option>2023</option>
                <option>2024</option>
                <option selected>2025</option>
            </select>
        </div>
        <button class="px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/80 transition">
            Show
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-base font-semibold text-gray-700">Payroll Data</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-3 text-left font-semibold">No</th>
                        <th class="px-6 py-3 text-left font-semibold">Employee Name</th>
                        <th class="px-6 py-3 text-left font-semibold">Position</th>
                        <th class="px-6 py-3 text-right font-semibold">Basic Salary</th>
                        <th class="px-6 py-3 text-right font-semibold">Allowance</th>
                        <th class="px-6 py-3 text-right font-semibold">Deductions</th>
                        <th class="px-6 py-3 text-right font-semibold">Net Salary</th>
                        <th class="px-6 py-3 text-center font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($employees as $employee)
                        @php
                            $salary = $employee->salaries->first();
                        @endphp
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-semibold text-xs shrink-0">
                                        B</div>
                                    <span class="font-medium text-gray-800">{{ $employee->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-500">{{ $employee->position }}</td>
                            <td class="px-6 py-4 text-right text-gray-700">Rp.
                                {{ number_format($salary?->gaji_pokok ?? $employee->salary, 0, '.', '.') }}</td>
                            <td class="px-6 py-4 text-right text-green-600 font-medium">+ Rp
                                {{ number_format(($salary?->tunjangan_makan ?? 0) + ($salary?->tunjangan_transportasi ?? 0), 0, '.', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right text-red-500 font-medium">- Rp
                                {{ number_format($salary?->potongan ?? 0, 0, '.', '.') }}</td>
                            <td class="px-6 py-4 text-right font-bold text-gray-800">Rp
                                {{ number_format($salary?->gaji_bersih ?? $employee->salary, 0, '.', '.') }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    {{-- Add Salary Button --}}
                                    <a href="{{ route('salary.create', $employee->id) }}"
                                        class="inline-flex items-center gap-1.5 px-3 py-1.5 text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition text-xs font-medium">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg> </a>
                                    @if ($salary)
                                        <a href="{{ route('salary.show', $salary->id) }}"
                                            class="px-3 py-1.5 text-xs font-medium text-white bg-primary rounded-lg hover:bg-primary/80 transition">
                                            Detail
                                        </a>

                                        <form action="{{ route('salary.delete', $salary->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center">No salary data yet</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
