@extends('admin')
@section('title','Slider Edit')

@section('content')
    <div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>'Slider', 'key'=>'Edit'])

    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="col-md-8">
                    <form method="POST" action="{{route('slider_update',['id'=>$slider->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Slider</label>
                            <input type="text" class="form-control" value="{{$slider->name}}"
                                   name="name" placeholder="Slider">
                            @error('name')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <div class="custom-file">
                                <input type="file" name="image_path" class="custom-file-input" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>

                            @error('image_path')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                            <div class="col-md-12 m-3">
                                <div class="row">
                                    <img height="200px" src="{{asset($slider->image_path)}}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea name="description" class="form-control"
                                      rows="6"> {{$slider->description}}     </textarea>
                            @error('description')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
