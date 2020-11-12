<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use PDF;

class AdminInvoiceController extends Controller
{
    public function index()
    {
        return view('admin.invoice.index', [
            'invoices' => Invoice::latest()->paginate(20)
        ]);
    }

    public function detail($id)
    {
        return view('admin.invoice.detail', [
            'invoice' => Invoice::findOrFail($id),
        ]);
    }

    public function  print($id)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_convert($id));
        return $pdf->stream();
    }

    public function  print_convert($id)
    {
        $invoice = Invoice::findOrFail($id);
        $orderProduct = '';
        foreach ($invoice->orders as $order) {
            $orderProduct .=
                ' <tr>
                        <td>' . $order->product->name . '</td>
                        <td>' . $order->quantity . '</td>
                        <td>' . $order->product->price . '</td>
                        <td>' .  $order->quantity * $order->product->price  . 'vnd </td> 
                        </tr>';
        };

        $html = '
        <style>
            body{
                font-family:DajanVu Sans;
            }
            .border  {
                border-style: solid;
            }
            td {
                padding: 5px;
                border-style: solid;
            }
        </style>
        <h1>E-shoper</h1>
 <h3>Customer Detail</h3>
        <table class="table border">
            <thead>
                <tr >
                    <th >Customer</th>
                 
                    <th>Email</th>
                    <th>Notice</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td >' . $invoice->user->name . '</td> 
                    <td>' . $invoice->email . '</td>
                    <td>' . $invoice->notice . '</td>
                </tr>
            </tbody>
        </table>
        <h3>Ship to</h3>
        <table class="table border">
            <thead>
                <tr >
                    <th>Address</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>' . $invoice->address . '</td>
                    <td>' . $invoice->phone . '</td> 
                </tr>
            </tbody>
        </table>
        <h3>Orderd Product</h3>
        <table class="table border">
            <thead>
                <tr >
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>  ' . $orderProduct . '  </tbody>
        </table>
        <h3>Total: ' . number_format($invoice->total) . ' VND</h3>
        <h4>Sign</h4>';
        return $html;
    }
}
