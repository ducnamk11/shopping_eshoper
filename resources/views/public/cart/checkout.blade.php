<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> @yield('title')</title>
    <link href="{{asset('assets/public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/public/css/font-awesome.min.css')}} " rel="stylesheet">
    <link href="{{asset('assets/public/css/prettyPhoto.css')}} " rel="stylesheet">
    <link href="{{asset('assets/public/css/price-range.css')}} " rel="stylesheet">
    <link href="{{asset('assets/public/css/animate.css')}} " rel="stylesheet">
    <link href="{{asset('assets/public/css/main.css')}} " rel="stylesheet">
    <link href="{{asset('assets/public/css/responsive.css')}} " rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('assets/public/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/public/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{asset('assets/public/images/ico/apple-touch-icon-144-precomposed.png')}} ">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{asset('assets/public/images/ico/apple-touch-icon-114-precomposed.png')}} ">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/public/')}} ">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{asset('assets/public/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed"
        href="{{asset('assets/public/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->

<body>
    @include('public.partials.header')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div>

            <div class="table-responsive cart_info  container">
                <table class="table table-condensed col-8">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img height="100px" src="{{$product->options->image}}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a
                                        href="{{route('product_detail',['id'=>$product->id,'slug'=>$product->name])}}">{{$product->name}}</a>
                                </h4>
                                {{-- <p>Web ID: 1089772</p> --}}
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($product->price)}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input data-url="{{route('cart_update',['id'=>$product->rowId])}}"
                                        class="cart_quantity_input" type="number" name="quantity"
                                        value="{{$product->qty}}" autocomplete="off" size="2">

                                </div>
                            </td>
                            <td class="cart_total">
                                <p>{{number_format($product->price *$product->qty )}} đ</p>
                            </td>
                            <td class="cart_delete">
                                <a data-url={{route('cart_delete',['id'=>$product->rowId])}}
                                    class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h3>Total:</h3>
                            </td>
                            <td>
                                <h3>{{Cart::priceTotal()}} VNĐ</h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="shopper-informations" style="margin:50px">
                <div class="row">
                    <div class="col-sm-10 clearfix">
                        <div class="bill-to">
                            <p>Bill To</p>
                            <div class="form-one">
                                <form accept="#">
                                    @csrf
                                    <input type="text" placeholder="Full Name *">
                                    <input type="text" placeholder="Phone">
                                    <input type="text" placeholder="Email*">
                                    <input type="text" placeholder="Address 1 *">
                                    <input type="text" placeholder="Address 2">
                                    <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery"
                                    rows="10"></textarea>
                                    <br>
                                @include('public.partials.paypal')
                                </form>
                            </div>

                        </div>
                    </div> 
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--/#cart_items-->
</body>

<script src="{{asset('assets/public/js/jquery.js')}}"></script>
<script src="{{asset('assets/public/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/public/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('assets/public/js/price-range.js')}}"></script>
<script src="{{asset('assets/public/js/jquery.prettyPhoto.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('assets/public/js/main.js')}}"></script>
</body>

</html>