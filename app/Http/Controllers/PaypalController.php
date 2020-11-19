<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Mail;
use DB;
use Illuminate\Support\Facades\Session;

class PayPalController extends Controller
{
    public function handlePayment(Request $request)
    {
        $product = [];
        $product['items'] = array_map(function ($item) {
            return [
                'name' => $item['name'],
                'price' =>  $item['price'],
                'qty' =>  $item['qty'],
            ];
        }, Cart::content()->toArray());

        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success_payment');
        $product['cancel_url'] = route('cancel_payment');
        $product['total'] = Cart::total();
        $paypalModule = new ExpressCheckout;
        $res = $paypalModule->setExpressCheckout($product);

        //sendmail and save
        $data = Session::get('data');
        $cart = Cart::content()->toArray();
        sendMail($data);
        saveDataToTable($cart, $data, 2);
        Cart::destroy();

        return redirect($res['paypal_link'])->with('data',  $data);
    }

    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }

    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            return view('public.cart.complete', [
                'categories' => Category::where('parent_id', 0)->take(6)->get(),
            ]);
        }
    }
}
