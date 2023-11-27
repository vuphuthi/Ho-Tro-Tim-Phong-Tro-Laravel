@extends('frontend.layouts.app_master')
@section('title', 'Nạp tiền ATM ')
@push('css')
    <link href="/css/home.css" rel="stylesheet">
@endpush

@section('content')
    <section class="breadcrumb">
        <ol>
            <li>
                <a href="">
                    <span>Trang chủ</span>
                </a>
            </li>
            <li>
                <span>Nạp tiền</span>
            </li>
        </ol>
    </section>
    <h1 class="page-title-h1">Nạp tiền</h1>
    <div class="b-auth">
        <div class="auth-content">
            <form action="" method="POST" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="price">Số tiền nạp</label>
                    <input type="number" class="form-control" placeholder="" name="price" value="">
                    <p><i>Số tiền cần nạp tối thiểu phải lớn 10.000 đ</i></p>
                    @if($errors->first('price'))
                        <p class="text-danger">{{ $errors->first('price') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-blue btn-submit">Tiếp tục ></button>
                </div>
            </form>
        </div>
    </div>
@stop

@push('script')
    <script src="/js/home.js"></script>
@endpush
