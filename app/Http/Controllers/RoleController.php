<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStore;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index',
            [
                'roles' => Role::all(),
                'permissions' => Permission::all(),
            ]);
    }
    public function edit($id)
    {
        return view('admin.role.edit',
            [
                'role' => Role::findOrFail($id),
                'roles' => Role::all(),
                'permissions' => Permission::all(),
            ]);
    }

    public function store(RoleStore $request)
    {
        if (count(Permission::all()) > 0) {
            $role = Role::firstOrCreate(['name' => $request->name]);

            $role->givePermissionTo($request->permission);

            return redirect()->route('role_index')->with('success', 'Deleted product successfully!');

        }
    }

    public function delete($_id)
    {
        Role::destroy($_id);
        return redirect()->route('role_index')->with('success', 'Deleted product successfully!');
    }
}
