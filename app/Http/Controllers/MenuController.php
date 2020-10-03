<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index(){

        return view('menu.index',[
            'menus'=> $this->menu->paginate(10),
        ]);
    }

    public function create()
    {

        return view('menu.add',[
            'optionSelect'=> $this->menuRecusive->menuRecusiveAdd()
        ]);
    }


}
