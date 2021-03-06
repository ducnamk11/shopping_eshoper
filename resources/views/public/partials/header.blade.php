<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> {{getConfigValueFromSetting('phone')}}</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{getConfigValueFromSetting('email')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a target="_blank" href="{{getConfigValueFromSetting('facebook')}}"><i class="fa fa-facebook"
                                        target="_blank"></i></a></li>
                            <li><a target="_blank" href="{{getConfigValueFromSetting('twitter')}}"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a target="_blank"  href="{{getConfigValueFromSetting('linkedin')}}"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li><a target="_blank"  href="{{getConfigValueFromSetting('dribbble')}}"><i class="fa fa-dribbble"></i></a>
                            </li>
                            <li><a target="_blank"  href="{{getConfigValueFromSetting('google')}}"><i class="fa fa-google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">

                        <a href="{{route('home')}}"><img src="{{asset('assets/public/images/home/logo.png')}}"
                                alt="" /></a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
 
                        <li><a href="{{route('wish_index')}}"><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><a href="{{route('cart_checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <li><a href="{{route('cart_index')}}"><i class="fa fa-shopping-cart"></i> Cart
                                    ({{Cart::count()}})</a></li>
                            @if(empty(auth()->user()->name))
                            <li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
                            <li><a href="/register"> <i class="fa fa-user"></i> Register</a></li>
                            @else
                            <li><a href=""><i class="fa fa-user"></i> {{auth()->user()->name}}</a></li>
                            <li><a  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  href="{{ route('logout') }}" ><i class="fa fa-lock"></i> Logout</a></li>
                            @endif
                        </ul>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        @include('public.partials.menu_header')
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form action="/search/" method="GET">
                            <input type="text" name="search" placeholder="Search" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>
<!--/header-->