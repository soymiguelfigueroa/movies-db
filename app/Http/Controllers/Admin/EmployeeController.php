<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\EmployeeController as MainEmployeeController;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Role;

class EmployeeController extends MainEmployeeController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate();

        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.employee.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();

        $employee = new Employee;
        $employee->name = $validated['name'];
        if ($employee->save()) {
            $employee->roles()->attach($validated['roles']);
            
            return redirect(route('admin.employee.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('admin.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $roles = Role::all();

        return view('admin.employee.edit', compact('employee', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validated = $request->validated();

        $employee->name = $validated['name'];
        if ($employee->save()) {
            $employee->roles()->sync($validated['roles']);
            
            return redirect(route('admin.employee.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->roles()->detach();
        
        if ($employee->delete()) {
            return redirect(route('admin.employee.index'));
        }
    }
}
