@extends('admin.layouts.app_master_admin')
@section('content')
    <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Lịch sử thanh toán</span> </h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th style="text-align: left">Mã giao dịch</th>
            <th class="text-center">Khách hàng</th>
            <th class="text-center">Loại</th>
            <th class="text-center">Tổng tiền</th>
            <th class="text-center">Tin</th>
            <th class="text-center">Ngày tạo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paymentHistory ?? [] as $item)
            <tr style="text-align: center">
                <td style="text-align: left" scope="row">{{ $item->id }}</td>
                <td style="text-align: center" scope="row">{{ $item->user->name ?? "" }} - ID {{ $item->user_id }}</td>
                <td>
                    @if ($item->type == 1)
                        <span>Tin tường</span>
                    @elseif($item->type == 2)
                        <span>Vip 3</span>
                    @elseif($item->type == 3)
                        <span>Vip 2</span>
                    @elseif($item->type == 4)
                        <span>Vip 1</span>
                    @else
                        <span>Đặc biệt</span>
                    @endif
                    <span>{{ $item->type }}</span>
                </td>
                <td scope="row"><span class="text-danger text-bold">{{ number_format($item->money,0,',','.') }}đ</span></td>
                <td scope="row">
                    <a href="">{{ $item->room_id }}</a>
                </td>
                <td scope="">
                    {{ $item->created_at }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {!! $paymentHistory->appends($query ?? [])->links('vendor.pagination.bootstrap-4') !!}
    </div>
@stop
