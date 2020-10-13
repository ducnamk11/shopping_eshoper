@extends('admin')
@section('title','Menu Edit')
@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>'Menu', 'key'=>'Edit'])
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-6">
                    <form method="POST" action="{{route('menu_update',['id'=>$menu->id])}}">
                        @csrf
                        <div class="form-group">
                            <label>Menu</label>
                            <input type="text" class="form-control"
                                   name="name" value="{{$menu->name}}" placeholder="Category">
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
                </div>
            </div>
        </div>
@stop
