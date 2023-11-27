@extends('frontend.layouts.app_master')
@section('title', '404')
@push('css')
    <link href="/css/home.css" rel="stylesheet">
@endpush

@section('content')

    <section class="grid post-category">
        <div class="wrapper">
            <div class="content">
                <div class="card">
                    <style>
                        .alert-warning {
                            color: #856404;
                            background-color: #fff3cd;
                            border-color: #ffeeba;
                        }
                    </style>
                    <div class="card-header">
                        <div class="alert alert-warning" role="alert">
                        <p>Không tồn tại đường dẫn này.</p>
                        <p>Xin cảm ơn!</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop

@push('script')
    <script src="/js/home.js"></script>
@endpush
