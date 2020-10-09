<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingStore;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.index', [
            'settings' => Setting::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(SettingStore $request)
    {
        Setting::create($request->all());
        return redirect()->route('setting_index')->with('success', 'Created setting successfully!');

    }


    public function edit(Setting $setting, $id)
    {

        return view('admin.setting.edit', [
            'setting' => Setting::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        Setting::findOrFail($id)->update($request->all());

        return redirect()->route('setting_index')->with('success', 'Updated setting successfully!');

    }

    public function delete(Setting $setting, $id)
    {
        Setting::findOrFail($id)->delete();
        return redirect()->route('setting_index')->with('success', 'Deleted setting successfully!');

    }
}
