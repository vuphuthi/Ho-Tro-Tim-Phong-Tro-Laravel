@extends('frontend.layouts.app_master')
@section('title', 'Trang chủ')
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
                <a href="">
                    <span>Phòng</span>
                </a>
            </li>
            <li>
                <span>Danh sách</span>
            </li>
        </ol>
    </section>
    <h1 class="page-title-h1">Đóng tiền mặt</h1>
    <style>
        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
    </style>
    <div class="alert alert-warning" role="alert">
        <h3 class="mt-4">Thanh toán tại văn phòng công ty</h3>
        <p>Bạn vui lòng đến địa chỉ văn phòng công ty LBKCorp theo địa chỉ sau:</p>
        <p>LE-4.07, Toà nhà Lexington Residence, Số 67 Mai Chí Thọ, Phường An Phú, Quận 2, Tp. Hồ Chí Minh.</p>
        <p>Số điện thoại: 0917 686 101</p>
        <h3 class="mt-5">Thu tiền tận nơi</h3>
        <p>Áp dụng cho khu vực Tp.Hồ Chí Minh và số tiền thanh toán lớn hơn 500.000đ</p>
        <p>Liên hệ: 0917 686 101 để chúng tôi hỗ trợ bạn</p>
        <p>Xin cảm ơn!</p>
    </div>
@stop

@push('script')
    <script src="/js/home.js"></script>
@endpush
