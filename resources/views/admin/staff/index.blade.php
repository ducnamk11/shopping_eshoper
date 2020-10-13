@extends('admin')
@section('title','Staff Index')
@section('content')
    <div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>'Staff', 'key'=>'admin.home'])
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-8">
                    <a href="{{route('staff_create')}}" class="btn btn-success m-2  "> Add Staff</a>
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
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>

                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $staffs as $staff)
                            <tr>

                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$staff->name}}</td>
                                <td>{{$staff->email}}</td>
                                <td>
                                    @foreach($staff->roles()->get() as $role)
                                        <span style="font-weight: bold">{{  $role->name }}</span>
                                    @endforeach

                                </td>
                                <td>
                                    <a href="{{route('staff_edit',['id'=>$staff->id])}}"
                                       class="btn btn-primary  "> Edit</a>
                                    <a href="{{route('staff_delete',['id'=>$staff->id])}}" class="btn btn-danger"
                                       onclick=" return confirm('Are you sure you want to delete this item?');">
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <!--                    --><?php //echo $products->links(); ?>
                </div>
            </div>
        </div>
@stop
