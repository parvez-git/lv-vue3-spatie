<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::with('roles')->latest()->get();

        return Inertia::render('Backend/Authorization/Permissions/Index', compact('permissions'));
    }

    public function create()
    {
        return Inertia::render('Backend/Authorization/Permissions/Create',[
            'roles' => Role::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:permissions'
        ]);

        $permission = Permission::create(['name' => $request->name]);
        $permission->assignRole($request->assaignroles);

        return Redirect::route('authorization.permissions.index')
            ->with(['success' => 'Permission created.']);
    }

    public function edit(Permission $permission)
    {
        return Inertia::render('Backend/Authorization/Permissions/Edit', [
            'permission'        => $permission,
            'roles'             => Role::latest()->get(),
            'assaignedroles'    => $permission->roles()->pluck('id'),
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name'	=> 'required|string|max:255|unique:permissions,name,'.$permission->id
        ]);

        $permission->update(['name' => $request->name]);
        $permission->syncRoles($request->assaignroles);

        return Redirect::route('authorization.permissions.index')
            ->with(['success' => 'Permission updated.']);
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return Redirect::back()->with(['success' => 'Permission deleted.']);
    }
}
