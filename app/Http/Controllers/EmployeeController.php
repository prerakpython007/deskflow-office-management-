<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Company;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $employees = Employee::with(['company', 'manager'])->get();
    return view('employees.index', compact('employees'));
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $companies = Company::all();
    $employees = Employee::all();

    return view('employees.create', compact('companies', 'employees'));
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    Employee::create($request->all());
    return redirect()->route('employees.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
