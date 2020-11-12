<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;

    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index()
    {
        return view('admin.menu.index', [
            'menus' => $this->menu->latest()->paginate(5),
        ]);
    }

    public function create()
    {

        return view('admin.menu.add', [
            'optionSelect' => $this->menuRecusive->menuRecusiveAdd()
        ]);
    }

    public function store(Request $request)
    {
        $this->menu->create(array_merge($request->all(), [
            'slug' => Str::slug($request->name)
        ]));
        return redirect()->route('menu_index')->with('success', 'Create menu successfully!');
    }

    public function edit($id)
    {
        $menu = $this->menu->findOrFail($id);
        return view('admin.menu.edit', [
            'menu' => $menu,
            'optionSelect' => $this->menuRecusive->menuRecusiveEdit($menu->parent_id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->menu->find($id)->update(
            array_merge($request->all(), [
                'slug' => Str::slug($request->name)
            ])
        );

        return redirect()->route('menu_index')->with('success', 'Update menu successfully!');
    }

    public function delete($id)
    {
        $this->menu->findOrFail($id)->delete();
        return redirect()->route('menu_index')->with('success', 'Delete menu successfully!');
    }
}
