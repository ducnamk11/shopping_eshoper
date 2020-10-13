@extends('admin')
@section('title','Staff Edit')

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>'Staff', 'key'=>'Edit'])
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-8">
                    <form method="POST" action="{{route('staff_update',['id'=>$staff->id])}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{$staff->name}}"
                                   name="name" placeholder="Name">
                            @error('name')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{$staff->email}}"
                                   name="email" placeholder="Email">
                            @error('email')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" value="{{$staff->password}}"
                                   name="password" placeholder="Password ">
                            @error('password')
                            <div class="alert alert-danger"> {{$message}}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <small>(press Ctrl or Shift to multy select ) </small>
                                    <div id="myselect">
                                        <select size="10" class="form-control" name="role[]" multiple>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role')
                                    <div class="alert alert-danger"> {{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
