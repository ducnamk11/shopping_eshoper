@extends('layouts.admin')
@section('title','Product Edit')

@section('css')
    <link rel="stylesheet"
          href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">@endsection
@section('js')
    <script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src={{ asset('vendor/ckeditor/ckeditor.js')}}></script>
    <script> CKEDITOR.replace('article-ckeditor'); </script>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Product', 'key'=>'Edit'])
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-8">
                    <form method="POST" action="{{route('product_update',['id'=>$product->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Product</label>
                            <input type="text" class="form-control" value="{{$product->name}}"
                                   name="name" placeholder="Product">
                            @if($errors->has('name'))  <p><span style="color: red">{!!$errors->first('name')!!}</span>
                            </p> @endif
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" value="{{$product->price}}"
                                   name="price" placeholder="price">
                            @if($errors->has('price'))  <p><span style="color: red">{!!$errors->first('price')!!}</span>
                            </p> @endif

                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option value="0">--Select--</option>
                                {!! $htmlOption !!}
                            </select>
                            @if($errors->has('category_id'))  <p><span
                                    style="color: red">{!!$errors->first('category_id')!!}</span></p> @endif
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="feature_image_path" type="file" class="form-control-file">
                            @if($errors->has('feature_image_path'))  <p><span
                                    style="color: red">{!!$errors->first('feature_image_path')!!}</span></p>
                            @endif
                            <div class="col-md-12 m-3">
                                <div class="row">
                                    <img height="200px" src="{{asset($product->feature_image_path)}}" alt="">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Detail Image</label>
                            <input multiple name="image_path[]" type="file" class="form-control-file">
                            @if($errors->has('image_path'))  <p><span
                                    style="color: red">{!!$errors->first('image_path')!!}</span></p>
                            @endif
                            <div class="col-md-12 m-3">
                                <div class="row">
                                    @foreach($product->images as $img)
                                        <div class="col-md-3">
                                            <img width="200px" height="150px" src="{{asset($img->image_path)}}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="form-group ">
                            <label>Tags</label>
                            <input type="text" name="tags" value="{{$tags}}" data-role="tagsinput"</div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Content</label>
                            <textarea name="content" class="form-control" id='article-ckeditor'
                                      rows="6"> {{$product->content}} </textarea> {{--  để hiện thị nút BROWER SERVER khi chọn ảnh     https://github.com/UniSharp/laravel-filemanager/issues/20--}}
                            @if($errors->has('content'))  <p><span
                                    style="color: red">{!!$errors->first('content')!!}</span></p> @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
