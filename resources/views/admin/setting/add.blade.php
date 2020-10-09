@extends('layouts.admin')
@section('title','Setting Add')

@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Setting', 'key'=>'Add'])

    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="col-md-8">
                    <form method="POST" action="{{route('setting_store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Config Key</label>
                            <input type="text" class="form-control" value="{{old('name')}}"
                                   name="config_key" placeholder="Setting">
                            @error('config_key')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Config Value</label>
                            <textarea name="config_value" class="form-control"
                                      rows="6"> {{old('config_value')}}  </textarea>

                            @error('config_value')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
