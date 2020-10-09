@extends('layouts.admin')
@section('title','Product Index')
@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Product', 'key'=>'Home'])
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-8">
                    <a href="{{route('product_create')}}" class="btn btn-success m-2  "> Add New Product</a>
                </div>
                <div class="col-md-12 float-right">

                    @if(session()->get('success'))
                        <div class="alert alert-warning alert-dismissible fade show">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>

                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $products as $product)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{number_format($product->price)}} đ</td>
                                <td><img height="100px" width="100px" src="{{asset($product->feature_image_path)}}" alt="">
                                </td>
                                <td>{{optional($product->category)->name}}</td>
                                <td>
                                    <a href="{{route('product_edit',['id'=>$product->id])}}"
                                       class="btn btn-primary  "> Edit</a>
                                    <a href="{{route('product_delete',['id'=>$product->id])}}" class="btn btn-danger"
                                       onclick=" return confirm('Are you sure you want to delete this item?');">
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <?php echo $products->links(); ?>
                </div>
            </div>
        </div>
@stop
