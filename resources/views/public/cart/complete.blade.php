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
            <h3 style="color: green"> Thank you for your purchase at our store,
                <br> we will quickly send the goods to you in the shortest time.  
                <br> You can check order in your mail. </h3>
                <br>
                <p> <a href="/"> back to home!</a></p>
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