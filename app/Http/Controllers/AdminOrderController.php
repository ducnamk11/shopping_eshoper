<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index', [
            'orders' => Order::where()->paginate(20),
        ]);
    }
    public function update(Request $request, $id)
    {
        $order =  Order::findOrFail($id);
        $order->update(
            array_merge([
                'status' => $request->status,
            ], $request->all())
        );
    }
}
