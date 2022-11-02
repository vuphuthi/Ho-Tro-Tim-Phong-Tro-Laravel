@extends('frontend.layouts.app_master')
@section('title', 'Login')
@push('css')
    <link href="/css/auth.css" rel="stylesheet">
@endpush

@section('content')
    <div class="b-auth">
        <div class="auth-header">
            <h1 class="title">Đăng nhập</h1>
        </div>
        <div class="auth-content">
            <form action="" method="POST" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control" placeholder="" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-blue btn-submit">Đăng nhập</button>
                </div>
                <div class="form-group">
                    <a href="#">Bạn quên mật khẩu?</a>
                    <a style="float: right;" href="{{ route('get.register') }}">Tạo tài khoản mới</a>
                </div>
            </form>
        </div>
    </div>

    @include('components.whyus')
    @include('components.support')
@stop

@push('script')
    <script src="/js/auth.js"></script>
@endpush
