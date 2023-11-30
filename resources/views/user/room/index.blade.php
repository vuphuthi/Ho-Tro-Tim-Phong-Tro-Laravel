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
    <h1 class="page-title-h1" style="display: flex;justify-content: space-between">Cho thuê phòng trọ, cho thuê nhà trọ, tìm phòng trọ <a href="{{ route('get_user.room.create') }}" title="Thêm mới" class="btn btn-sm btn-blue">Thêm tin mới</a></h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th style="width: 40px;text-align: center">ID</th>
                <th style="width: 100px;">Ảnh đại diện</th>
                <th style="width: 40%">Thông tin</th>
                <th style="text-align: center">Giá</th>
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
                        <p style="font-size: 14px;font-weight: 400;color: #212121;text-decoration: none;margin-bottom: 5px">
                            <span class="fa fa-map-marker"></span>
                            @if (isset($item->wards->name))
                                <span>{{ $item->wards->name ?? "" }} - </span>
                            @endif
                            @if (isset($item->district->name))
                                <span>{{ $item->district->name ?? "" }} - </span>
                            @endif
                            @if (isset($item->city))
                                <span>{{ $item->city->name }}</span>
                            @endif
                        </p>
                        <p>
                            @if ($item->status == \App\Models\Room::STATUS_ACTIVE)
                                <a href="{{ route('get_user.room.hide', $item->id) }}"> <i class="fa fa-eye-slash"></i> Ẩn tin</a>
                            @endif
                            @if ($item->status == \App\Models\Room::STATUS_EXPIRED || $item->status == \App\Models\Room::STATUS_DEFAULT)
                                <a href="{{ route('get_user.room.pay', $item->id) }}"> <i class="fa fa-refresh"></i> Thanh toán hoạc gia hạn</a>
                                <a href="{{ route('get_user.room.update', $item->id) }}"> <i class="fa fa-pencil"></i> Sửa tin</a>
                            @endif
                            @if ($item->status == \App\Models\Room::STATUS_DEFAULT && ($item->paymentHistory->count() ?? 0) > 0)
                                <a href="{{ route('get_user.room.active', $item->id) }}"> <i class="fa fa-eye-slash"></i> Hiển thị tin</a>
                            @endif
                        </p>
                    </td>
                    <td style="text-align: center">{{ number_format($item->price,0,',','.') }} đ</td>
                    <td style="text-align: center"><span>{{ $item->time_start }}</span></td>
                    <td style="text-align: center"><span>{{ $item->time_stop }}</span></td>
                    <td style="text-align: center">
                        <span class="{{ $item->getStatus($item->status)['class'] ?? "..." }}">{{ $item->getStatus($item->status)['name'] ?? "..." }}</span>
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
