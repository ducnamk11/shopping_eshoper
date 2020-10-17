<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Newest Items</h2>
    @foreach($newest_products as $product)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{$product->feature_image_path}}" alt="" />
                    <h2>{{number_format($product->price)}} <span style="font-size: 15px">₫</span></h2>
                    <p>{{ucfirst($product->name)}} </p>

                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>{{number_format($product->price)}}
                        </h2>
                        <p>{{$product->name}}</p>
                        <a href="{{route('product_detail',['id'=>$product->id,'slug'=>$product->name])}}"
                            class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                    </div>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li>
                        <a class="add-cart" data-url="{{route('cart_store',['id'=>$product->id])}}" href="#"><i
                                class="fa fa-plus-square"></i>
                            Add to cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
</div>