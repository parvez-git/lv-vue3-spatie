<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->latest()->get();

        return Inertia::render('Backend/Authorization/Roles/Index', compact('roles'));
    }

    public function create()
    {
        return Inertia::render('Backend/Authorization/Roles/Create',[
            'permissions' => Permission::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:roles'
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->givePermissionTo($request->assaignpermissions);

        return Redirect::route('authorization.roles.index')
            ->with(['success' => 'Role updated.']);
    }

    public function edit(Role $role)
    {
        return Inertia::render('Backend/Authorization/Roles/Edit', [
            'role'                  => $role,
            'permissions'           => Permission::latest()->get(),
            'assaignedpermissions'  => $role->permissions()->pluck('id'),
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:roles,name,'.$role->id
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->assaignpermissions);

        return Redirect::route('authorization.roles.index')
            ->with(['success' => 'Role created.']);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return Redirect::back()->with('success', 'Role deleted.');
    }
}
