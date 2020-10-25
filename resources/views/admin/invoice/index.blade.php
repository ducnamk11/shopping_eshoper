@extends('admin')
@section('title','Invoice Index')
@section('content')
<div class="content-wrapper">
    @include('admin.partials.content-header',['name'=>'Invoice', 'key'=>'Index'])
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
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
                            <th scope="col">User</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $invoices as $invoice)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <th scope="row">{{$invoice->fullname}}</th>
                            <th scope="row">{{number_format($invoice->total)}} đ</th>
                            <th>
                                @if($invoice->status == 0)
                                Unconfirm
                                @elseif($invoice->status == 1)
                                Confirmed
                                @elseif($invoice->status == 2)
                                Paid
                                @endif
                            </th>
                            <th scope="row">{{$invoice->created_at}}</th>

                            <td>
                                <a href="{{route('invoice_detail',['id'=>$invoice->id])}}" class="btn btn-primary  ">
                                    Detail</a>
                                <a href="{{route('product_delete',['id'=>$invoice->id])}}" class="btn btn-danger"
                                    onclick=" return confirm('Are you sure you want to delete this item?');">
                                    Delete</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <?php echo $invoices->links(); ?>
            </div>
        </div>
    </div>
    @stop