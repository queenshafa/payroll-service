<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaryRequest;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index() {
        $employees = Employee::all();

        return view('salary.index', compact('employees'));
    }

    public function create($employeeId) {
        $employee = Employee::findOrFail($employeeId);
        return view('salary.create', compact('employee'));
    }

    public function store(SalaryRequest $request) {
        Salary::create([
            'employee_id'               => $request->employee_id,
            'gaji_pokok'                => $request->gaji_pokok,
            'tunjangan_makan'           => $request->tunjangan_makan,
            'tunjangan_transportasi'    => $request->tunjangan_transportasi,
            'potongan'                  => $request->potongan ?? 0,
            'gaji_bersih'               => $request->gaji_bersih,
            'bulan'                     => $request->bulan, 
            'tahun'                     => $request->tahun, 
        ]);

        return "Berhasil menambahkan data gaji.";
    }
}
