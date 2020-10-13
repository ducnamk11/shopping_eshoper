@extends('admin')
@section('title','Category Add')
@section('content')
    <div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>'Category', 'key'=>'admin.home'])
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-8">
                    <a href="{{route('category_create')}}" class="btn btn-success m-2  "> Add New Category</a>
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
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $categories as $category)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('category_edit',['id'=>$category->id])}}"
                                       class="btn btn-primary  "> Edit</a>
                                    <a href="{{route('category_delete',['id'=>$category->id])}}" class="btn btn-danger"
                                       onclick=" return confirm('Are you sure you want to delete this item?');">
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <?php echo $categories->links(); ?>
                </div><!-- /.col -->
            </div><!-- /.containew


    </div>
@stop
