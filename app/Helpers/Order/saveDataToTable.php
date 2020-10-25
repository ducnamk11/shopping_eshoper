<?php

use App\Models\Invoice;
use App\Models\Order;

if (!function_exists('saveDataToTable')) {
    function saveDataToTable($data, $request, $status)
    {
        $total  = 0;
        foreach ($data as $item) {
            $total += $item['subtotal'];
        }

        $invoice =   Invoice::create([
            'fullname' => $request['fullname'],
            'user_id' => auth()->user()->id,
            'phone' => $request['phone'],
            'email' => $request['email'],
            'address' => $request['address'],
            'notice' => $request['notice'],
            'pay_method' => $request['pay_method'],
            'total' => $total,
            'status' => $status,
        ]);

        foreach ($data as $item) {
            Order::create([
                'user_id' => auth()->user()->id,
                'product_id' => $item['id'],
                'invoice_id' => $invoice->id,
                'quantity' => $item['qty'],
            ]);
        }
    }
}
