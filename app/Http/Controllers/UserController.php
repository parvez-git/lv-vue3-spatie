<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index() 
    {
        return Inertia::render('Backend/Authorization/Users/Index',
        [
            'users' => User::with(['roles','permissions'])
                ->filter(Request::only('search'))
                ->latest()
                ->paginate(10),
        ]);
    }

    public function create() 
    {
        return Inertia::render('Backend/Authorization/Users/Create', [
            'roles'         => Role::orderBy('id')->get(),
            'permissions'   => Permission::orderBy('id')->get(),
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make('password'),
        ]);

        $user->assignRole($request->assaignroles);
        $user->givePermissionTo($request->assaignpermissions);

        return Redirect::route('authorization.users.index');
    }

    public function edit(User $user) 
    {
        return Inertia::render('Backend/Authorization/Users/Edit', [
            'user'                  => $user,
            'roles'                 => Role::orderBy('id')->get(),
            'permissions'           => Permission::orderBy('id')->get(),
            'assaignedroles'        => $user->roles()->pluck('id'),
            'assaignedpermissions'  => $user->permissions()->pluck('id')
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
        ]);

        $user->syncRoles($request->assaignroles);
        $user->syncPermissions($request->assaignpermissions);

        return Redirect::route('authorization.users.index');
    }


    public function destroy(User $user)
    {
        // $user->removeRole('writer');
        $user->delete();
        return Redirect::back()->with(['success' => 'User Deleted']);
    }
}
