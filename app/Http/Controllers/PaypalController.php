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
        $data = Session::get('data');
        // dd($data);
        $email = $data['email'];
        Mail::send('public.cart.email', [
            'email' =>  $data['email'],
            'fullname' => $data['fullname'],
            'phone' =>  $data['phone'],
            'address' => $data['address'],
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
            Order::create( [
                'user_id' => auth()->user()->id,
                'product_id' => $product['id'],
                'quantity' => $product['qty'],
                'status' => 2,
                'fullname' => $data['fullname'],
                'phone' =>  $data['phone'],
                'email' =>  $data['email'],
                'address' =>  $data['address'],
                'notice' =>  $data['notice'],
            ] );
        }
        Cart::destroy();

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
        return redirect($res['paypal_link']);
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

    public function saveToOrder($data)
    {


      
    }
}
