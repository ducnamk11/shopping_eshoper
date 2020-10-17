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
                    <li class="active">Wish list</li>
                </ol>
            </div>
            @if($wishlists->count()>0)
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                                     <tbody>
                        @foreach ($wishlists as $wish)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{$wish->product->feature_image_path}}" alt="" />
                                        <h2>{{number_format($wish->product->price)}} <span style="font-size: 15px">₫</span></h2>
                                        <p>{{ucfirst($wish->product->name)}} </p>
                    
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{number_format($wish->product->price)}}
                                            </h2>
                                            <p>{{$wish->product->name}}</p>
                                            <a href="{{route('product_detail',['id'=>$wish->product->id,'slug'=>$wish->product->name])}}"
                                                class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li>
                                            <a class="delete-wishlist" data-url="{{route('wish_delete',['id'=>$wish->id])}}" href="#"><i
                                                    class="fa fa-minus"></i>
                                                Remove</a>
                                        </li>
                                        <li>
                                            <a class="add-cart" data-url="{{route('cart_store',['id'=>$wish->product->id])}}" href="#"><i
                                                    class="fa fa-plus-square"></i>
                                                Add to cart</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                         
                    </tbody>
                </table>
            </div>
            
            @else
            <h3>Your wishlist is empty !</h3>
            @endif
        </div>
    </section>
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