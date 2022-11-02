<header class="header-default {{ $container ? $container : '' }} container-header">
    <div class="header-area">
        <a class="top-logo" href="{{ route('get.home') }}" title="">
            <img src="{{ url('images/logo-2021-tet.jpg') }}" alt="">
        </a>
        <div class="user-welcome js-reload-html-header">
            @if (isset(Auth::user()->name))
                <div class="welcome-text">
                    <a href="{{ route('get_user.profile.index') }}">Hi !</a>
                    <a href="{{ route('get.logout') }}">{{ Auth::user()->name ?? "..." }}</a>
                    <a href="">{{ number_format(get_data_user('web','account_balance'),0,',','.') }} đ</a>
                </div>
                <a href="{{ route('get_user.recharge.history') }}" class="text-bold text-success">Lịch sử nạp tiền</a>  <a href=""> \ </a>
                <a href="{{ route('get_user.payment.history') }}" class="text-bold text-danger">Lịch sử thanh toán</a>
                <a rel="nofollow" class="btn btn-pink btn-add-post" href="{{ route('get_user.room.index') }}">
                    Đăng tin mới
                    <i class="la la-plus-circle" aria-hidden="true"></i>
                </a>
            @else
                <a rel="nofollow" class="btn btn-blue" href="{{ route('get.login') }}">Đăng nhập</a>
                <a rel="nofollow" class="btn btn-blue" href="{{ route('get.register') }}"> Đăng ký</a>
            @endif
        </div>
        <div class="mb-icon-nav js-mobile-panel">
            <i class="fa fa-bars" aria-hidden="true"></i>
            Danh mục
        </div>
    </div>
</header>
<nav class="navbar-menu">
    <ul id="menu-main-menu" class="container-menu level-1">
        <li class="navbar_item {{ \Request::route()->getName() == 'get.home' ? 'active' : '' }}"><a href="{{ route('get.home') }}">Trang chủ</a></li>
        @foreach($categoriesGlobal ?? [] as $item)
            <li class="navbar_item {{ \Request::path() == 'chuyen-muc-'. $item->slug.'-'. $item->id ? 'active' : '' }}">
                <a href="{{ route('get.category.item',['slug' => $item->slug,'id' => $item->id]) }}"
                                       title="{{ $item->name }}">{{ $item->name }} </a>
            </li>
        @endforeach
        <li class="navbar_item {{ \Request::route()->getName() == 'get.blog.index' ? 'active' : '' }}">
            <a href="{{ route('get.blog.index') }}" title="Bài viết">Bài viết</a>
        </li>
{{--        <li class="navbar_item"><a href="#">Hướng dẫn</a></li>--}}
        <li class="navbar_item {{ \Request::route()->getName() == 'get_user.recharge.index' ? 'active' : '' }}">
            <a href="{{ route('get_user.recharge.index') }}" title="Nạp tiền">Nạp tiền</a>
        </li>
{{--        <li class="navbar_item"><a href="#">Bảng giá</a></li>--}}
    </ul>
</nav>

<div class="mb-distance"></div>
