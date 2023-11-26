@extends('frontend.layouts.app_master')
@section('title', 'Register')
@push('css')
    <link href="/css/auth.css" rel="stylesheet">
@endpush

@section('content')
    <div class="b-auth">
        <div class="auth-header">
            <h1 class="title">Tạo tài khoản mới</h1>
        </div>
        <div class="auth-content">
            <form action="" method="POST" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="name">Họ tên</label>
                    <input type="text" class="form-control" required placeholder="" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control"  placeholder="" name="email" value="{{ old('email') }}">
                    @if($errors->first('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" required placeholder="" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="password">Tạo mật khẩu</label>
                    <input type="password" class="form-control" required placeholder="" name="password">
                    @if($errors->first('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Mật khẩu xác nhận</label>
                    <input type="password" class="form-control" required placeholder="" name="password_confirmation">
                    @if($errors->first('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-blue btn-submit">Tạo tài khoản</button>
                </div>
                <div class="form-group form-group-register">
                    <p>Bấm vào nút đăng ký tức là bạn đã đồng ý với <a href="#" target="_blank">quy định sử dụng</a> của chúng tôi</p>
                    <p>Bạn đã có tài khoản? <a class="link" href="{{ route('get.login') }}">Đăng nhập ngay</a></p>
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
