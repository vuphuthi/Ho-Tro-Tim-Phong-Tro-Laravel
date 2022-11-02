@extends('admin.layouts.app_master_admin')
@section('content')
    <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Danh sách tin đăng</span></h2>
    <div class="table table-hover">
        <table class="table">
            <thead>
            <tr>
                <th style="width:50px;">Code</th>
                <th style="width: 100px;">Ảnh đại diện</th>
                <th style="width: 350px;">Thông tin</th>
                <th>Giá</th>
                <th>Ngày bắt đầu</th>
                <th>Trạng thái</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms ?? [] as $item)
                <tr>
                    <td>#{{ $item->id }}</td>
                    <td>
                        <div style="overflow: hidden;width: 100px;height: 100px;margin: 0 auto;position: relative;">
                            <a href="">
                                <img src="{{ pare_url_file($item->avatar) }}" alt="" style="display: block;width: 100%;height: 100%;object-fit: cover;">
                            </a>
                        </div>
                    </td>
                    <td>
                        <a href="" style="font-size: 14px;font-weight: 500;color: #007aff;text-decoration: none"><span class="label label-danger">{{ $item->category->name ?? "[N\A]" }}</span> {{ $item->name }}</a>
                        <p style="margin-bottom: 2px">
                            @if ($item->status != \App\Models\Room::STATUS_ACTIVE)
                                <a href="{{ route('get_admin.room.success', $item->id) }}" class="text-success" style="font-size: 13px;text-decoration: none;font-weight: 500"><i class="fa fa-refresh"></i> Duyệt</a>
                                <a href="{{ route('get_admin.room.expires', $item->id) }}" class="text-warning" style="font-size: 13px;text-decoration: none;font-weight: 500"><i class="fa fa-credit-card"></i> Hết hạn</a>
                            @endif
                            @if ($item->status == \App\Models\Room::STATUS_ACTIVE)
                                <a href="{{ route('get_admin.room.hide', $item->id) }}" class="text-secondary" style="font-size: 13px;text-decoration: none"> <i class="fa fa-eye-slash"></i> Ẩn tin</a>
                            @endif
                            <a href="{{ route('get_admin.room.cancel', $item->id) }}" class="text-danger" style="font-size: 13px;text-decoration: none;font-weight: 500"><i class="fa fa-cancel"></i> Huỷ</a>
                        </p>
                        @if ($item->status == \App\Models\Room::STATUS_CANCEL)
                            <p style="margin-bottom: 2px;font-size: 12px"><i class="text-danger">{{ $item->reason }}</i></p>
                        @endif
                    </td>
                    <td>2.5 triệu / tháng</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <span class="{{ $item->getStatus($item->status)['class'] ?? "..." }}">{{ $item->getStatus($item->status)['name'] ?? "..." }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
