<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffStore;
use App\Http\Requests\StaffUpdate;
use App\Modes\Staff;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{

    public function index()
    {
        return view('admin.staff.index', [
            'staffs' => Staff::all()
        ]);
    }

    public function create()
    {
        return view('admin.staff.add', [
            'permissions' => Permission::all(),
            'roles' => Role::all()
        ]);
    }

    public function store(StaffStore $request)
    {
        $staff = Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $staff->syncRoles($request->role);
        return redirect()->route('staff_index')->with('success', 'Create Staff successfully!');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff.edit', [
            'staff' => $staff,
            'permissions' => $staff->getPermissionNames(),
            'roles' => Role::all()
        ]);
    }

    public function update(StaffUpdate $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $staff->syncRoles($request->input('role'));

        return redirect()->route('staff_index')->with('success', 'Updated Staff successfully!');
    }

    public function delete($id)
    {
        Staff::findOrFail($id)->delete();

        return redirect()->route('staff_index')->with('success', 'Deleted Staff successfully!');
    }
}
