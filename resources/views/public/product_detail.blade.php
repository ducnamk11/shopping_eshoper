@extends('main',['key' => 'product_detail'])
@section('title',$product->name)
@section('main')
<div class="col-sm-9 padding-right">
    <div class="product-details">
        <!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{$product->feature_image_path}}" alt="" />
                <h3>ZOOM</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($product->images as $key=>$img)
                    @if($key%3 == 0)
                    <div class="item {{ $key  == 0  ? 'active' : ''  }}  ">
                        @endif
                        <a href=""><img height="84" width="84" src="{{$img->image_path}}" alt=""></a>
                        @if($key%3 == 2)
                    </div>
                    @endif
                    @endforeach
                </div>
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information">
                <!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$product->name}}</h2>
                {{-- <p>Web ID: 1089772</p> --}}
                <img src="{{asset('assets/public/images/product-details/rating.png')}}" alt="" />
                <span>
                    <span>{{number_format( $product->price )}} đ</span>
                    <label>Quantity:</label>
                    <input type="number" value="1" />
                    <button type="button" class="btn btn-fefault  cart">
                        <i class="fa fa-shopping-cart"></i>
                        <a class="add-cart " data-url="{{route('cart_store',['id'=>$product->id])}}" href="#">
                            Add to cart</a>
                    </button>

                </span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> E-SHOPPER</p>
                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
            </div>
            <!--/product-information-->
        </div>
    </div>

</div>
<!--/product-details-->

<div class="category-tab shop-details-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Details</a></li>
            <li><a href="#tag" data-toggle="tab">Tag</a></li>
            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="details">
            {!! $product->content!!}
        </div>


        <div class="tab-pane fade" id="tag">
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{asset('assets/public/images/home/gallery1.jpg')}}" alt="" />
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade active in" id="reviews">
            <div class="col-sm-12">
                @foreach($reviews as $review)
                <div>
                    <ul>
                    <li><a href=""><i class="fa fa-user"></i>{{$review->user->name}}</a></li>

                    
                        <li><a href=""><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($review->created_at)->format('H:m')}}</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y')}}</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</p>
                    <p>
                    <hr>
                </div>
                @endforeach
                <b>Write Your Review</b></p>
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name" />
                        <input type="email" placeholder="Email Address" />
                    </span>
                    <textarea name=""></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
<!--/category-tab-->

@include('public.partials.recommended_item')
</div>
@endsection