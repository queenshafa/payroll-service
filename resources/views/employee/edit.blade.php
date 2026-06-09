@extends('layouts.app')


@section('title', 'Tambah Data Karyawan')


@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Edit Employee Data</h1>
        <p class="text-gray-500">Manage employee information and their complete data</p>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('karyawan.update', $employee->id) }}" class="space-y-6" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $employee->name) }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('name')
                        <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700">ID</label>
                    <input type="text" id="nip" name="nip" value="{{ old('nip', $employee->nip) }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('nip')
                        <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" id="position" name="position" value="{{ old('position', $employee->position) }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('position')
                        <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="salary" class="block text-sm font-medium text-gray-700">Basic Salary</label>
                    <input type="number" id="salary" name="salary" value="{{ old('salary', $employee->salary) }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('salary')
                        <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="join_date" class="block text-sm font-medium text-gray-700">Joining Date</label>
                    <input type="date" id="join_date" name="join_date"
                        value="{{ old('join_date', $employee->join_date) }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('join_date')
                        <p class=" text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="pt-4">
                <button type="submit"
                    class="inline-flex items-center gap-1.5 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                    Update Data
                </button>
            </div>
        </form>
    </div>
@endsection
