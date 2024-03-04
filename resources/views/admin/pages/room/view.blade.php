@extends('admin.layouts.master_admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Thông tin phòng</span></h2>
            <p>Tên Phòng: {{ $room->name }}</p>
            <p>Địa Chỉ: {{ $room->full_address }}</p>
            <p>Thể loại: {{ $room->category->name }}</p>
            <p>Diện tích: {{ $room->range_area }}</p>
            <p>Giá tiền: {{ $room->price }}</p>
            <p>Tiện ích:
                @foreach($room->roomOptionItem as $optionItem)
                    {{ $optionItem->name }} ,
                @endforeach
            </p>
            <p style="font-size: 14px;">Trạng thái: <span class="{{ $room->getStatus($room->status)['class'] ?? '...' }}">{{ $room->getStatus($room->status)['name'] ?? '...' }}</span></p>
            <p>Ngày đăng: {{ $room->created_at }}</p>
            <p>Trạng thái: {{ $room->getStatus($room->status)['name'] ?? '...' }}</p>
            <p>Album ảnh:</p>
            <div class="d-flex" style="margin-bottom: 30px">
                @foreach($room->images as $image)
                    <img style="width: 300px; margin-right: 20px" src="{{ pare_url_file($image->path) }}" alt="">
                @endforeach
            </div>
            <div>
                <td>
                    <p style="margin-bottom: 2px;">
                        @if ($room->status != \App\Models\Room::STATUS_ACTIVE)
                            <a href="{{ route('get_admin.room.success', $room->id) }}"
                               class="text-success"
                               style="font-size: 15px; text-decoration: none; font-weight: 500;padding-right: 15px"><i
                                    class="fa fa-refresh"></i> Duyệt</a>
                            <a href="{{ route('get_admin.room.expires', $room->id) }}"
                               class="text-warning"
                               style="font-size: 15px; text-decoration: none; font-weight: 500;padding-right: 15px"><i
                                    class="fa fa-credit-card"></i> Hết hạn</a>
                        @endif
                        @if ($room->status == \App\Models\Room::STATUS_ACTIVE)
                            <a href="{{ route('get_admin.room.hide', $room->id) }}"
                               class="text-secondary"
                               style="font-size: 15px; text-decoration: none;padding-right: 15px"> <i
                                    class="fa fa-eye-slash"></i> Ẩn tin</a>
                        @endif
                        <a href="{{ route('get_admin.room.cancel', $room->id) }}"
                           class="text-danger"
                           style="font-size: 15px; text-decoration: none; font-weight: 500;padding-right: 15px"><i
                                class="fa fa-times"></i> Huỷ</a>
                        <a href="{{ route('get_admin.room.delete', $room->id) }}"
                           class="text-danger"
                           style="font-size: 15px; text-decoration: none; font-weight: 500;">
                            <i class="fa fa-trash"></i>Delete</a>
                    </p>
                    @if ($room->status == \App\Models\Room::STATUS_CANCEL)
                        <p style="margin-bottom: 2px; font-size: 12px;"><i
                                class="text-danger">{{ $room->reason }}</i></p>
                    @endif
                </td>
            </div>
        </div>
    </section>
@stop
