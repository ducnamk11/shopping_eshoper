<?php

use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;

if (! function_exists('sendMail')) {
    function sendMail($data)
    {
        $email = $data['email'];
        Mail::send('public.cart.email', [
            'email' => $data['email'],
            'fullname' => $data['fullname'],
            'phone' => $data['phone'],
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
    }
}