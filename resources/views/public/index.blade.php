@extends('main')

@section('title','Home')
@section('main')
    <div class="col-sm-9 padding-right">
 @include('public.partials.new_product')
 @include('public.partials.recommended_item')
 @include('public.partials.category_tab')
        </div>
@endsection
