@extends('frontend.layouts.app_master')
@section('title', 'Cập nhật thông tin')
@push('css')
    <link href="/css/auth.css" rel="stylesheet">
@endpush

@section('content')
    <div class="b-auth">
        <div class="auth-header">
            <h1 class="title">Cập nhật số điện thoại</h1>
        </div>
        <div class="auth-content">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
            <form action="" method="POST" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="phone">Số điện thoại cũ</label>
                    <input type="text" class="form-control" placeholder="" name="phone_old" disabled value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại mới</label>
                    <input type="text" class="form-control" id="phone_new"  placeholder="" name="phone_new" value="{{ old('phone_new') }}">
                    @if ($errors->first('phone_new'))
                        <span class="text-error d-block">{{ $errors->first('phone_new') }}</span>
                    @endif
                    <a href="javascript:;void(0)" class="js-get-code-phone">Lấy mã xác thực</a>
                    <p><i>Mã xác thực sẽ gủi về số điện thoại / email mới của bạn</i></p>
                </div>
                <div class="form-group">
                    <label for="email">Mã xác thực</label>
                    <input type="text" class="form-control" placeholder="" name="code" value="{{ old('code') }}">
                    @if ($errors->first('code'))
                        <span class="text-error">{{ $errors->first('code') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-blue btn-submit">Cập nhật số điện thoại</button>
                </div>
            </form>
        </div>
    </div>

    @include('components.whyus')
    @include('components.support')
@stop

@push('script')
    <script> var URL_SEND_CODE_PHONE = '{{ route("post_user.send_code") }}' </script>
    <script src="/js/profile.js"></script>
@endpush
