@extends('admin')
@section('title','Category Add')
@section('content')
    <div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>'Category', 'key'=>'Add'])

    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="col-md-6">
                    <form method="POST" action="{{route('category_store')}}">
                        @csrf
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control"
                                   name="name" placeholder="Category">

                        </div>
                        <div class="form-group">
                            <label>Parent Category</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">--Select--</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div><!-- /.col -->
            </div>


        </div>
@stop
