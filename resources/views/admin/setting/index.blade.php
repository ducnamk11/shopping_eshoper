@extends('layouts.admin')
@section('title','Setting Index')
@section('content')
    <div class="content-wrapper">
    @include('partials.content-header',['name'=>'Setting', 'key'=>'Home'])
    <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="col-md-8 m-2">
                    <a href="{{route('setting_create' ) }} " class="btn btn-primary "> Add</a>
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
                            <th scope="col">Config value</th>
                            <th scope="col">Config key</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $settings as $setting)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$setting->config_value}}</td>
                                <td>{{$setting->config_key}}</td>
                                <td>
                                    <a href="{{route('setting_edit',['id'=>$setting->id])}}"
                                       class="btn btn-primary  "> Edit</a>
                                    <a href="{{route('setting_delete',['id'=>$setting->id])}}" class="btn btn-danger"
                                       onclick=" return confirm('Are you sure you want to delete this item?');">
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <?php  echo $settings->links(); ?>
                </div>
            </div>
        </div>
@stop
