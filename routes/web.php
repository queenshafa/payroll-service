<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'login');

Route::view('/register-asli', 'auth.register-asli');


Route::get('/dashboard', function () {
    $employees = Employee::where('user_id', Auth::id())->get();

    $totalEmployees = Employee::where('user_id', Auth::id())->count();

    $paidThisMonth = Salary::where('user_id', Auth::id())
        ->where('bulan', now()->month)
        ->where('tahun', now()->year)
        ->count();

    $totalSalaryThisMonth = Salary::where('user_id', Auth::id())
        ->where('bulan', now()->month)
        ->where('tahun', now()->year)
        ->sum('gaji_bersih');


    return view('dashboard', compact('employees', 'totalEmployees', 'paidThisMonth', 'totalSalaryThisMonth'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Kelola Karyawan
Route::middleware('auth')->controller(EmployeeController::class)->group(function() {
    Route::get('karyawan/index', 'index')->name('karyawan.index');
    Route::get('karyawan/create', 'create')->name('karyawan.create');
    Route::post('karyawan/store', 'store')->name('karyawan.store');
    Route::get('karyawan/edit/{id}', 'edit')->name('karyawan.edit');
    Route::put('karyawan/update/{id}', 'update')->name('karyawan.update');
    Route::delete('karyawan/destroy', 'destroy')->name('karyawan.destroy');
});

// Kelola Gaji
Route::middleware('auth')->controller(SalaryController::class)->group(function() {
    Route::get('salary/index', 'index')->name('salary.index');
    Route::get('salary/create/{employeeId}', 'create')->name('salary.create');
    Route::post('salary/store', 'store')->name('salary.store');
    Route::get('salary/show/{employeeId}', 'show')->name('salary.show');
    Route::get('salary/download/{employeeId}', 'download')->name('salary.download');
    Route::delete('salary/delete/{employeeId}', 'delete')->name('salary.delete');
});

// Sidebar
Route::get('/sidebar-preview', function () {
    return view('layouts.sidebar');
});

require __DIR__.'/auth.php';
