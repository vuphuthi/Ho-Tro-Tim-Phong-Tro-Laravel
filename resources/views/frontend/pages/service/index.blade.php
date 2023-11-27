@extends('frontend.layouts.app_master')
@section('title', 'Trang chủ')
@push('css')
    <link href="/css/home.css" rel="stylesheet">
@endpush

@section('content')

    <section class="grid post-category">
        <header class="page-header category clearfix">
            <h1 class="page-h1" style="float: none; margin-top: 50px; margin-bottom: 30px; text-align: center;">Giới thiệu Beehouse </h1>
        </header>
        <div class="container clearfix">
            <section class="section" style="padding: 20px; border: 0; box-shadow: 0 0 30px 10px rgb(0 0 0 / 3%);">
                <div class="section-content">
                    <p>ĐỪNG ĐỂ PHÒNG TRỐNG THÊM BẤT CỨ NGÀY NÀO!, đăng tin ngay tại Beehouse và tất cả các vấn đề sẽ được giải quyết một cách nhanh nhất.</p>
                    <p>ƯU ĐIỂM Beehouse:</p>
                    <p><img style="display: inline-block;float: left;margin-right: 10px;" src="/images/icon-tick-green.svg"><strong>Top đầu google</strong> về từ khóa: cho thuê phòng trọ, thuê phòng trọ, phòng trọ hồ chí minh, phòng trọ hà nội, thuê nhà nguyên căn, cho thuê căn hộ, tìm người ở ghép…với lưu lượng truy cập (traffic) cao nhất trong lĩnh vực. </p>
                    <p><img style="display: inline-block;float: left;margin-right: 10px;" src="/images/icon-tick-green.svg"> Beehouse tự hào có lượng dữ liệu bài đăng lớn nhất trong lĩnh vực cho thuê phòng trọ với hơn <strong>103.348</strong> tin trên hệ thống và tiếp tục tăng.</p>
                    <p><img style="display: inline-block;float: left;margin-right: 10px;" src="/images/icon-tick-green.svg"> Beehouse tự hào có số lượng người dùng lớn nhất trong lĩnh vực cho thuê phòng trọ với hơn <strong>300.000</strong> khách truy cập thường xuyên và hơn <strong>2.500.000</strong> lượt pageview mỗi tháng.</p>
                    <p><img style="display: inline-block;float: left;margin-right: 10px;" src="/images/icon-tick-green.svg"> Beehouse tự hào được sự tin tưởng sử dụng của hơn <strong>116.998 khách hàng</strong> là chủ nhà, đại lý, môi giới đăng tin thường xuyên tại website.</p>
                    <p><img style="display: inline-block;float: left;margin-right: 10px;" src="/images/icon-tick-green.svg"> Beehouse tự hào ghi nhận <strong>88.879</strong> giao dịch thành công khi sử dụng dịch vụ tại web, mức độ <strong>hiệu quả đạt xấp xỉ 85% tổng tin đăng</strong>.</p>
                </div>
            </section>
        </div>
        <header class="page-header category clearfix">
            <h1 class="page-h1" style="float: none; margin-top: 50px; margin-bottom: 30px; text-align: center;">Bảng giá</h1>
        </header>
        <div class="section-content">
            <p>
                <img style="display: inline-block;float: left;margin-right: 10px;" src="/images/icon-tick-green.svg">
                <strong>Tin tường</strong>  2.000 / 1 ngày
            </p>
            <p>
                <img style="display: inline-block;float: left;margin-right: 10px;" src="/images/icon-tick-green.svg">
                <strong>Tin Vip 3</strong>  20.000 / 1 ngày
            </p>
            <p>
                <img style="display: inline-block;float: left;margin-right: 10px;" src="/images/icon-tick-green.svg">
                <strong>Tin Vip 2</strong>  30.000 / 1 ngày
            </p>
            <p>
                <img style="display: inline-block;float: left;margin-right: 10px;" src="/images/icon-tick-green.svg">
                <strong>Tin Vip 1</strong>  50.000 / 1 ngày
            </p>
            <p>
                <img style="display: inline-block;float: left;margin-right: 10px;" src="/images/icon-tick-green.svg">
                <strong>Tin đặc biệt</strong>  80.000 / 1 ngày
            </p>
        </div>
    </section>
    @include('components.link_footer')
    @include('components.whyus')
    @include('components.support')
@stop

@push('script')
    <script src="/js/home.js"></script>
@endpush
