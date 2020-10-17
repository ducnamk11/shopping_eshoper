@extends('main')

@section('title','Home')
@section('main')

<div class="col-sm-9 padding-right">
    <div class="features_items">
        <!--features_items-->
    <h2 class="title text-center">{{$category_name}}</h2>
        @foreach($products_category as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{$product->feature_image_path}}" alt="" />
                        <h2>{{number_format($product->price)}} <span style="font-size: 15px">₫</span></h2>
                        <p>{{$product->name}}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                            to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{number_format($product->price)}} <span style="font-size: 15px">₫</span></h2>
                            <p>{{$product->name}}</p>
                         
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach


        <ul class="pagination">
            {{ $products_category->links() }}
        </ul>
    </div>
    <!--features_items-->
</div>
@endsection