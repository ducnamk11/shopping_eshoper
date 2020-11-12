@extends('admin')
@section('title','Invoice Detail')
@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>'Invoice', 'key'=>'Detail'])
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12 float-right">
                @if(session()->get('success'))
                <div class="alert alert-warning alert-dismissible fade show">
                    {{ session()->get('success') }}
                </div>
                @endif
            </div>
            <div class="col-md-12 voice_detail">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Customer</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Pay Method</th>
                            <th scope="col">Notice</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th> {{$invoice->fullname}} </th>
                            <th> {{$invoice->address}} </th>
                            <th> {{$invoice->phone}} </th>
                            <th> {{$invoice->email}} </th> 
                            <th> {{$invoice->pay_method}} </th>
                            <th> {{$invoice->notice}} </th>
                            <th> {{$invoice->created_at}} </th>
                        </tr>
                    </tbody>
                </table>
            </div> <br>

            <center>
                <h3>Detail Order</h3>
            </center> <br>

            <div class="col-md-12 voice_detail">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name Product</th>
                            <th scope="col">Image</th>
                            <th scope="col">quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col"> Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach( $invoice->orders as $order)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <th> {{$order->product->name}}</th>
                            <th> <img height="50px" src="{{$order->product->feature_image_path}}" alt=""></th>
                            <th> {{$order->quantity}}</th>
                            <th> {{number_format($order->product->price)}} đ</th>
                            <th> {{number_format($order->quantity *$order->product->price)}} đ </th>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
              <h2>  Invoice Total: {{number_format($invoice->total)}} VND </h2>
            </div>
        <a href="{{route('invoice_print',['id'=>$invoice->id])}}">print invoice</a>
        </div>
    </div>
    @stop