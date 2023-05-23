<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\RoleController as MainRoleController;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;

class RoleController extends MainRoleController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate();

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $validated = $request->validated();

        $role = new Role;
        $role->name = $validated['name'];
        if ($role->save()) {
            return redirect(route('admin.role.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $validated = $request->validated();

        $role->name = $validated['name'];
        if ($role->save()) {
            return redirect(route('admin.role.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return redirect(route('admin.role.index'));
        }
    }
}
