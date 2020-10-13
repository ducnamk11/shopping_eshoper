<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
             @foreach($feature_categories as $key=>$category)
                <li  @if($key==0)  class="active" @endif >
                    <a href="#category_tab_{{$category->id}}" data-toggle="tab">{{$category->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($feature_categories as $key=>$category)
            <div class="tab-pane fade {{$key == 0 ? 'active in' : ''}}" id="category_tab_{{$category->id}}">
                    @foreach($category->products as $product)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{$product->feature_image_path}}" alt=""/>
                                    <h2>{{number_format($product->price)}} <span style="font-size: 15px">₫</span></h2>
                                    <p>{{$product->name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>
</div><!--/category-tab-->
