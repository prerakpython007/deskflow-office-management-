<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with(['company', 'manager'])->get();
        $companies = Company::all();
        return view('employees.index', compact('employees', 'companies'));
    }

    public function create()
    {
        $companies = Company::all();
        $employees = Employee::all();
        return view('employees.create', compact('companies', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:employees,email',
            'company_id' => 'nullable|exists:companies,id',
            'manager_id' => 'nullable|exists:employees,id',
            'position'   => 'nullable|string|max:255',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        $employees = Employee::where('id', '!=', $employee->id)->get();
        return view('employees.edit', compact('employee', 'companies', 'employees'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:employees,email,' . $employee->id,
            'company_id' => 'nullable|exists:companies,id',
            'manager_id' => 'nullable|exists:employees,id',
            'position'   => 'nullable|string|max:255',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}