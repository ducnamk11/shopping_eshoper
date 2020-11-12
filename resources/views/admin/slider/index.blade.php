@extends('admin')
@section('title','Slider Index')
@section('content')
    <div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>'Slider', 'key'=>' home'])
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-8">
                    <a href="{{route('slider_create')}}" class="btn btn-success m-2  "> Add New Slider</a>
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
                             <th scope="col">Image</th>
                             <th scope="col">Description</th>
                             <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $sliders as $slider)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$slider->name}}</td>
                                <td><img height="200px" width="200px" src="{{asset($slider->image_path)}}" alt="">
                                <td>{{$slider->description}}</td>
                                <td>
                                    <a href="{{route('slider_edit',['id'=>$slider->id])}}"
                                       class="btn btn-primary  "> Edit</a>
                                    <a href="{{route('slider_delete',['id'=>$slider->id])}}" class="btn btn-danger"
                                       onclick=" return confirm('Are you sure you want to delete this item?');">
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <?php echo $sliders->links(); ?>
                </div>
            </div>
        </div>
@stop
