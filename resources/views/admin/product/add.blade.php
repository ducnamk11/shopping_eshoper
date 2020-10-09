@extends('layouts.admin')
@section('title','Product Add')

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
    @include('partials.content-header',['name'=>'Product', 'key'=>'Add'])

    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="col-md-8">
                    <form method="POST" action="{{route('product_store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Product</label>
                            <input type="text" class="form-control" value="{{old('name')}}"
                                   name="name" placeholder="Product">
                           @error('name')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" value="{{old('price')}}"
                                   name="price" placeholder="price">
                            @error('price')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option value="0">--Select--</option>
                                {!! $htmlOption !!}
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="feature_image_path" type="file" class="form-control-file">

                            @error('feature_image_path')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>Detail Image</label>
                            <input multiple name="image_path[]" type="file" class="form-control-file">
                            @error('image_path')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror

                        </div>
                        <div class="form-group ">
                            <label>Tags</label>
                            <input type="text" name="tags"   value="{{old('tags')}}" data-role="tagsinput" </div>
                        @error('tags')
                        <div class="alert alert-danger"> {{$message}}</div>
                        @enderror

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Content</label>
                            <textarea name="content" class="form-control" id='article-ckeditor'
                                      rows="6"> {{old('content')}}  </textarea> {{--  để hiện thị nút BROWER SERVER khi chọn ảnh     https://github.com/UniSharp/laravel-filemanager/issues/20--}}
                            @error('content')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
