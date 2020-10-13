@extends('admin')
@section('title','Permission Index')
@section('content')
    <div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>'Permission', 'key'=>'admin.home'])
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <form method="POST" action="{{route('permission_store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Add Permission</label>
                                <input type="text" class="form-control" value="{{old('name')}}"
                                       name="name" placeholder="Permission">
                                @error('name')
                                <div class="alert alert-danger"> {{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>

                        </form>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $permissons as $per)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$per->name}}</td>
                                    <td>
                                        <a href="{{route('permission_edit',['id'=>$per->id])}}"
                                           class="btn btn-primary  "> Edit</a>
                                        <a href="{{route('permission_delete',['id'=>$per->id])}}" class="btn btn-danger"
                                           onclick=" return confirm('Are you sure you want to delete this item?');">
                                            Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
@stop
