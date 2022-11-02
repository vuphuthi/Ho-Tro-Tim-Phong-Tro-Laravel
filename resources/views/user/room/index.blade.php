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
    <h1 class="page-title-h1">Cho thuê phòng trọ, cho thuê nhà trọ, tìm phòng trọ <a href="{{ route('get_user.room.create') }}" title="Thêm mới">Thêm tin mới</a></h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th style="width: 80px;text-align: center">Mã tin</th>
                <th style="width: 100px;">Ảnh đại diện</th>
                <th style="width: 30%">Thông tin</th>
                <th>Giá</th>
                <th style="text-align: center;width: 120px;">Ngày bắt đầu</th>
                <th style="text-align: center;width: 120px;">Ngày kết thúc</th>
                <th style="width: 120px;text-align: center">Trạng thái</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms ?? [] as $item)
                <tr>
                    <td style="text-align: center">#{{ $item->id }}</td>
                    <td>
                        <div style="overflow: hidden;width: 100px;height: 100px;margin: 0 auto;position: relative;">
                            <a href="{{ route('get.room.detail',['id' => $item->id,'slug' => $item->slug]) }}" target="_blank">
                                <img src="{{ pare_url_file($item->avatar) }}" alt="" style="display: block;width: 100%;height: 100%;object-fit: cover;">
                            </a>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('get.room.detail',['id' => $item->id,'slug' => $item->slug]) }}" target="_blank" style="font-size: 14px;font-weight: 500;color: #007aff;"><span class="label label-danger">{{ $item->category->name ?? "[N\A]" }}</span> {{ $item->name }}</a>
                        <p>
                            @if ($item->status == \App\Models\Room::STATUS_ACTIVE)
                                <a href=""> <i class="fa fa-eye-slash"></i> Ẩn tin</a>
                            @endif
                            @if ($item->status == \App\Models\Room::STATUS_EXPIRED)
{{--                                <a href=""><i class="fa fa-refresh"></i> Đăng lại</a>--}}
                                <a href="{{ route('get_user.room.pay', $item->id) }}"> <i class="fa fa-refresh"></i> Thanh toán tin</a>
                            @endif
                            @if ($item->status <= \App\Models\Room::STATUS_EXPIRED)
                                <a href="{{ route('get_user.room.update', $item->id) }}"> <i class="fa fa-pencil"></i> Sửa tin</a>
                            @endif
                        </p>
                    </td>
                    <td>2.5 triệu / tháng</td>
                    <td style="text-align: center"><span>{{ $item->time_start }}</span></td>
                    <td style="text-align: center"><span>{{ $item->time_stop }}</span></td>
                    <td style="text-align: center">
                        <span>{{ $item->getStatus($item->status)['name'] ?? "..." }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@push('script')
    <script src="/js/home.js"></script>
@endpush
