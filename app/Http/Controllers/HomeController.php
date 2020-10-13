<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        view()->share([
            'categories' => Category::where('parent_id', 0)->take(6)->get(),
            'sliders' => Slider::latest()->take(3)->get(),
        ]);
    }

    public function index()
    {
        return view('public.index', [
            'feature_categories' => Category::where('feature', Category::FEATURE)->get(),
            'newest_products' => Product::latest()->take(6)->get(),
            'hot_products' => Product::latest('view', 'desc')->take(15)->get(),
        ]);
    }

    public function category($id)
    {
        return view('public.category', [
            'products_category' => Category::findOrFail($id)->products()->paginate(12),
        ]);
    }

    public function search(Request $request)
    {
        $key = $request->search;
        return view('public.search', [
            'key'=>$key,
            'results' => Product::where('name', 'LIKE', '%' . $key. '%')->paginate(12),
        ]);
    }
}
