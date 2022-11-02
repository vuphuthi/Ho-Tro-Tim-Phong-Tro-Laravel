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
    <h1 class="page-title-h1">Chuyển khoản</h1>
    <style>
        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
    </style>
    <div class="alert alert-warning" role="alert">
        <p><strong>Lưu ý quan trọng:</strong></p>
        <p>- Nội dung chuyển tiền bạn vui lòng ghi đúng thông tin sau:</p><p>
        </p><p><strong style="color: red;">"PT123 - 104768 - 0986420994"</strong></p>
        <p>Trong đó 104768 là mã thành viên, 0986420994 là số điện thoại của bạn đăng ký trên website phongtro123.com.</p>
        <p>Xin cảm ơn!</p>
    </div>
    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <td><strong>Ngân hàng</strong></td>
            <td><strong>Chủ tài khoản</strong></td>
            <td><strong>Số tài khoản</strong></td>
            <td><strong>Chi nhánh</strong></td>
            <td><strong>Nội dung chuyển khoản</strong></td>
        </tr>
        <tr>
            <td><strong style="color: red;">VIETCOMBANK</strong> - NGÂN HÀNG THƯƠNG MẠI CỔ PHẦN NGOẠI THƯƠNG VIỆT NAM</td>
            <td style="white-space: nowrap;">TRẦN QUỐC BẢO</td>
            <td style="white-space: nowrap;">0071000939534<br><button class="btn btn-secondary btn-copy js-btn-copy" title="Sao chép liên kết" data-clipboard-text="0071000939534"><span class="icon-copy">Sao chép</span></button></td>
            <td style="white-space: nowrap;">CN HỒ CHÍ MINH</td>
            <td rowspan="6" style="white-space: nowrap; color: red;">Nội dung chuyển khoản, bạn ghi rõ:<br> <strong>"PT123 - 104768 - 0986420994"</strong><br><button class="btn btn-secondary btn-copy js-btn-copy" title="Sao chép liên kết" data-clipboard-text="PT123 - 104768 - 0986420994"><span class="icon-copy">Sao chép</span></button></td>
        </tr>
        <tr>
            <td><strong style="color: red;">BIDV</strong> - NGÂN HÀNG ĐẦU TƯ VÀ PHÁT TRIỂN VIỆT NAM</td>
            <td style="white-space: nowrap;">TRẦN QUỐC BẢO</td>
            <td style="white-space: nowrap;">31010001745233<br><button class="btn btn-secondary btn-copy js-btn-copy" title="Sao chép liên kết" data-clipboard-text="31010001745233"><span class="icon-copy">Sao chép</span></button></td>
            <td style="white-space: nowrap;">CN HỒ CHÍ MINH</td>
            <!-- <td style="white-space: nowrap; color: red;">PT123 - 104768 - 0986420994</td> -->
        </tr>
        <tr>
            <td><strong style="color: red;">ACB</strong> - NGÂN HÀNG THƯƠNG MẠI CỔ PHẦN Á CHÂU</td>
            <td style="white-space: nowrap;">TRẦN QUỐC BẢO</td>
            <td style="white-space: nowrap;">177563039<br><button class="btn btn-copy js-btn-copy btn-secondary" title="Sao chép liên kết" data-clipboard-text="177563039"><span class="icon-copy">Sao chép</span></button></td>
            <td style="white-space: nowrap;">PGD TRƯƠNG ĐỊNH</td>
            <!-- <td style="white-space: nowrap; color: red;">PT123 - 104768 - 0986420994</td> -->
        </tr>
        <tr>
            <td><strong style="color: red;">VIETINBANK</strong> - NGÂN HÀNG TMCP CÔNG THƯƠNG VIỆT NAM</td>
            <td style="white-space: nowrap;">TRẦN QUỐC BẢO</td>
            <td style="white-space: nowrap;">102868874881<br><button class="btn btn-copy js-btn-copy btn-secondary" title="Sao chép liên kết" data-clipboard-text="102868874881"><span class="icon-copy">Sao chép</span></button></td>
            <td style="white-space: nowrap;">CN THỦ THIÊM</td>
            <!-- <td style="white-space: nowrap; color: red;">PT123 - 104768 - 0986420994</td> -->
        </tr>
        <tr>
            <td><strong style="color: red;">AGRIBANK</strong> - NGÂN HÀNG NÔNG NGHIỆP VÀ PHÁT TRIỂN NÔNG THÔN VIỆT NAM</td>
            <td style="white-space: nowrap;">TRẦN QUỐC BẢO</td>
            <td style="white-space: nowrap;">6280205595686<br><button class="btn btn-secondary btn-copy js-btn-copy" title="Sao chép liên kết" data-clipboard-text="6280205595686"><span class="icon-copy">Sao chép</span></button></td>
            <td style="white-space: nowrap;">CN ĐÔNG SÀI GÒN</td>
            <!-- <td style="white-space: nowrap; color: red;">PT123 - 104768 - 0986420994</td> -->
        </tr>
        <tr>
            <td><strong style="color: red;">TECHCOMBANK</strong> - NGÂN HÀNG THƯƠNG MẠI CỔ PHẦN KỸ THƯƠNG VIỆT NAM</td>
            <td style="white-space: nowrap;">TRẦN QUỐC BẢO</td>
            <td style="white-space: nowrap;">19033684408018<br><button class="btn btn-secondary btn-copy js-btn-copy" title="Sao chép liên kết" data-clipboard-text="19033684408018"><span class="icon-copy">Sao chép</span></button></td>
            <td style="white-space: nowrap;">CN GIA ĐỊNH</td>
            <!-- <td style="white-space: nowrap; color: red;">PT123 - 104768 - 0986420994</td> -->
        </tr>
        </tbody>
    </table>
@stop

@push('script')
    <script src="/js/home.js"></script>
@endpush
