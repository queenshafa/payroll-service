<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Kelola Karyawan
Route::middleware('auth')->controller(EmployeeController::class)->group(function() {
    Route::get('karyawan/index', 'index')->name('karyawan.index');
    Route::get('karyawan/create', 'create')->name('karyawan.create');
    Route::post('karyawan/store', 'store')->name('karyawan.store');
    Route::get('karyawan/edit/{id}', 'edit')->name('karyawan.edit');
    Route::delete('karyawan/destroy', 'destroy')->name('karyawan.destroy');
});

// Kelola Gaji
Route::middleware('auth')->controller(SalaryController::class)->group(function() {
    Route::get('salary/index', 'index')->name('salary.index');
    Route::get('salary/create/{employeeId}', 'create')->name('salary.create');
    Route::post('salary/store', 'store')->name('salary.store');
    Route::get('salary/show/{employeeId}', 'show')->name('salary.show');
    Route::get('salary/download/{employeeId}', 'download')->name('salary.download');
});

require __DIR__.'/auth.php';
