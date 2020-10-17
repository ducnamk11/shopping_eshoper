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
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input name="name" type="text" placeholder="Name" />
                            @if ($errors->has('name')) <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>  @endif
                            <input name="email" type="email" placeholder="Email Address" />
                            @if ($errors->has('email')) <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>  @endif
                            <input name="password" type="password" placeholder="Password" />
                            @if ($errors->has('password')) <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>  @endif
                            <input name="password_confirmation" type="password" placeholder="Confirm password" />
                            
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
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