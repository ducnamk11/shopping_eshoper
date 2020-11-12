@extends('admin')
@section('title','Role Index')

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/dist/css/style.css')}}">@endsection
@section('js')
    <script src={{ asset('assets/admin/dist/js/main.js')}}></script>
@endsection
@section('content')
    <div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>'Role', 'key'=>' home'])
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <form method="POST" action="{{route('role_store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Role</label>
                                <input type="text" class="form-control" value="{{old('name')}}"
                                       name="name" placeholder="Role">
                                @error('name')
                                <div class="alert alert-danger"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Permission</label>
                                <small>(press Ctrl or Shift to multy select ) </small>
                                <div id="myselect">
                                    <select size="10" class="form-control"  name="permission[]" multiple>
                                        @foreach($permissions as $per)
                                            <option value="{{$per->id}}" >{{$per->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('permission')
                                <div class="alert alert-danger"> {{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $roles as $role)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        @foreach($role->permissions()->get() as $per)
                                            {{ $per->name}},
                                        @endforeach</td>
                                    <td>
                                        <a href="{{route('role_edit',['id'=>$role->id])}}"
                                           class="btn btn-primary  "> Edit</a>
                                        <a href="{{route('role_delete',['id'=>$role->id])}}" class="btn btn-danger"
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
