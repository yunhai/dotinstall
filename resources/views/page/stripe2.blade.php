@extends('layout.master')
@section('title', 'プログラミングＧＯ')
@section('breadcrumbs', Breadcrumbs::render('stripe'))
@push('css')
    <link rel="stylesheet" href="/css/lesson/lesson_detail/detail.css">
    <link rel="stylesheet" href="/css/stripe.css">
@endpush

@push('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="/js/stripe.js"></script>
@endpush

@section('content')
<div style='width: 300px;'>
    <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
    </div>
</div>

@stop
