@extends('layouts.admin')
@section('title','Menu Add')
@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Menu', 'key'=>'Add'])

    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

                <div class="col-md-6">
                    <form method="POST" action="{{route('menu_store')}}">
                        @csrf
                        <div class="form-group">
                            <label>Menu</label>
                            <input type="text" class="form-control"
                                   name="name" placeholder="Menu">

                        </div>
                        <div class="form-group">
                            <label>Parent Menu</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">--Parent Menu--</option>
                                {!! $optionSelect !!}
                             </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div><!-- /.col -->
            </div>


        </div>
@stop
