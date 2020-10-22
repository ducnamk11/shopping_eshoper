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
    //SAVE IN DB AND PAYMENT
    public function pay(Request $request)
    {

        //SAVE IN DB 
        DB::beginTransaction();
        try {
            $email = $request->email;
            Mail::send('public.cart.email', [
                'email' => $request->email,
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'address' => $request->address,
                'categories' => Category::where('parent_id', 0)->take(6)->get(),
                'products' => Cart::content(),
            ], function ($message) use ($email) {
                $message->from('ducnamk1196@gmail.com', 'Eshopper');
                $message->sender('ducnamk1196@gmail.com', 'Eshopper');
                $message->to($email,   'Eshopper');
                $message->cc('ducnamk7476@gmail.com', 'Eshopper-cc');
                $message->subject('Eshopper');
            });
            foreach (Cart::content()->toArray() as $product) {
                Order::create(array_merge([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['qty'],
                ], $request->all()));
            } 

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect()->route('order_complete');
    }

    public function complete()
    {
        return view('public.cart.complete', [
            'categories' => Category::where('parent_id', 0)->take(6)->get(),
        ]);
    }
}
