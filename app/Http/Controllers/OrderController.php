<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use  Mail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function checkout()
    {
        return view('public.cart.checkout', [
            'products' => Cart::content(),
        ]);
    }
    public function pay(Request $request)
    {
        if ($request->pay_method == 'paycash') {
            sendMail($request->all());
            saveDataToTable(Cart::content()->toArray(), $request->all(), 0);
            Cart::destroy();
            return redirect()->route('order_complete');
        } else {
            //Paypal
            return redirect()->route('make_payment')->with('data', $request->all());
        }
    }

    public function complete()
    {
        return view('public.cart.complete', [
            'categories' => Category::where('parent_id', 0)->take(6)->get(),
        ]);
    }
}
