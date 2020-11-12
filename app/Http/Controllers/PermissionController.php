<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('admin.permission.index', [
            'permissons' => Permission::all()
        ]);
    }

    public function store(Request $request)
    {
        Permission::create(['name' => $request->name]);
        return redirect()->route('permission_index')->with('success', 'Create Permission successfully!');
    }

    public function delete($id)
    {
        Permission::findOrFail($id)->delete();
        return redirect()->route('permission_index')->with('success', 'Deleted Permission successfully!');
    }
}
