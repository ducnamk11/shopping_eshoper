<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Category;
use App\Models\Product;
use Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web']);
    }
    public function index()
    {
        return view('public.wishlist', [
            'categories' => Category::where('parent_id', 0)->take(6)->get(),
            'wishlists' => Wishlist::where("user_id",  Auth::user()->id)->latest()->paginate(10),
        ]);
    }

    public function store($id)
    {
        Wishlist::firstOrCreate([
            'user_id' => Auth::user()->id,
            'product_id' => $id,
        ]);
    }

    public function delete($id)
    {
        Wishlist::findOrFail($id)->delete();
    }
}
