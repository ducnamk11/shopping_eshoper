<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        view()->share([
            'categories' => Category::where('parent_id', 0)->take(6)->get()
        ]);
    }

    public function index()
    {
        return view('public.cart.index', [
            'products' => Cart::content(),
        ]);
    }

    public function checkout()
    {
        return view('public.cart.checkout', [
            'products' => Cart::content(),
        ]);
    }

    public function store($id)
    {
        $product = Product::findOrFail($id);
        Cart::add([
            'id' => $product->id, 'name' => $product->name, 'qty' => 1,
            'price' => intval($product->price),
            'weight' => 0, 'options' => ['image' => $product->feature_image_path]
        ]);
    }


    public function update(Request $request, $id)
    {
        Cart::update($id, $request->qty);
    }

    public function delete($id)
    {
        Cart::remove($id);
    }

    public function alldelete()
    {
        Cart::destroy();
    }
}
