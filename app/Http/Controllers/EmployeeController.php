<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        // Mengambil data karyawan melalui model
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    public function create() {
        return view('employee.create');
    }

    public function store(EmployeeRequest $request) {
        Employee::create($request->validated());
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function edit($id) {
        // Mencati data karyawan berdasarkan id
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, $id) {
        $employee = Employee::findOrFail($id);

        $employee->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'position' => $request->position,
            'salary' => $request->salary,
            'join_date' => $request->join_date,
        ]);

        return redirect()->route('karyawan.index');
    }
}
