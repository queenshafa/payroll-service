<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index() {
        $employees = Employee::where('user_id', Auth::id())->get();
        
        return view('employee.index', compact('employees'));
    }

    public function create() {
        return view('employee.create');
    }

    public function store(EmployeeRequest $request) {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Employee::create($data);

        return redirect()->route('karyawan.index')->with('success', 'Employee successfully added!');
    }

    public function edit($id) {
        $employee = Employee::where('user_id', Auth::id())
            ->findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    public function update(EmployeeRequest $request, $id) {
        $employee = Employee::where('user_id', Auth::id())
            ->findOrFail($id);

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
