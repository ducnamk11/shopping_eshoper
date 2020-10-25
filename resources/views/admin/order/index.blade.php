@extends('admin')
@section('title','Order Index')
@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>'Order', 'key'=>'Index'])
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
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">#</th>
                            <th scope="col">Detail</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                             <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $orders as $order)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>                            <th scope="row">{{$order->invoice_id}}</th>
                            <td>
                                <p><strong>customer: </strong>{{$order->fullname}}</p>
                                <p><strong>email: </strong> {{$order->email}}</p>
                                 <p><strong>phone: </strong> {{$order->phone}} </p>
                            </td>
                            <td>{{number_format($order->product->price)}} đ</td>
                            <td>
                                <select name="status" class="form-control confirm_select"
                                    data-url="{{route('order_update',['id'=>$order->id])}}">
                                    <option value="{{$order->status}}">Confirmed</option>
                                    <option {{ $order->status == 0 ? "selected" : "" }} value="{{$order->status}}">
                                        Unconfirmed</option>
                                    <option {{ $order->status == 2 ? "selected" : "" }} value="{{$order->status}}">Paid
                                    </option>
                                </select>
                            </td>
                            {{-- <td><img height="100px" width="100px" src="{{asset($order->product->feature_image_path)}}"
                                    alt="">
                            </td> --}}
                            <td>
                                <a href="{{route('product_edit',['id'=>$order->id])}}" class="btn btn-primary  ">
                                    Detail</a>
                                <a href="{{route('product_delete',['id'=>$order->id])}}" class="btn btn-danger"
                                    onclick=" return confirm('Are you sure you want to delete this item?');">
                                    Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <?php echo $orders->links(); ?>
            </div>
        </div>
    </div>
    @stop