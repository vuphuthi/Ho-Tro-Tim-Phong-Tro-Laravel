@extends('frontend.layouts.app_master')
@section('title', 'Cập nhật thông tin')
@push('css')
    <link href="/css/auth.css" rel="stylesheet">
@endpush

@section('content')
    <div class="b-auth">
        <div class="auth-header">
            <h1 class="title">Cập nhật thông tin</h1>
        </div>
        <div class="auth-content">
            <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="phone">Mã TV</label>
                    <input type="text" class="form-control" required placeholder="" disabled  value="{{ $user->id }}">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" required placeholder="" disabled value="{{ $user->phone }}">
                    <a href="{{ route('get_user.profile.update_phone') }}" title="Đổi số điện thoại">Đổi số điện thoại</a>
                </div>
                <div class="form-group">
                    <label for="name">Họ tên</label>
                    <input type="text" class="form-control" required placeholder="" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" disabled placeholder="" name="email" value="{{ $user->email }}">
                </div>
                <div class="row-lists">
                    <div class="form-group w-100">
                        <label for="name">Hình ảnh</label>
                        <input type="file" name="avatar">
                    </div>
                    @if ($user->avatar)
                        <img src="{{ pare_url_file($user->avatar) }}" style="width: 100px;height: 100px;border-radius: 50%" alt="">
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-blue btn-submit">Cập nhật tài khoản</button>
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
