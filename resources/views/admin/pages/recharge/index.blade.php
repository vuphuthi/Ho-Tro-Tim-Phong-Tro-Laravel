@extends('admin.layouts.app_master_admin')
@section('content')
    <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Danh sách nạp tiền</span> <a href="{{ route('get_admin.recharge.create') }}" style="font-size: 16px;">Thêm mới</a></h2>
    <div class="">
        <form action="" class="row">
            <div class="col-sm-2">
                <input type="date" value="{{ Request::get('t') }}" name="t" class="form-control">
            </div>
            <div class="col-sm-2">
                <input type="text" value="{{ Request::get('code') }}" name="code" placeholder="mã giao dịch"  class="form-control">
            </div>
            <div class="col-sm-2">
                <select name="u" class="form-control" id="">
                    <option value="">Khách hàng</option>
                    @foreach($users as $item)
                        <option {{ Request::get('u') == $item->id ? "selected" : "" }} value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2">
                <select name="s" class="form-control" id="">
                    <option value="">Trạng thái</option>
                    <option value="-1" {{ Request::get('s') == -1 ? "selected" : "" }}>Đã huỷ</option>
                    <option value="1" {{ Request::get('s') == 1 ? "selected" : "" }}>Khởi tạo</option>
                    <option value="2" {{ Request::get('s') == 2 ? "selected" : "" }}>Hoàn thành</option>
                    <option value="-2" {{ Request::get('s') == -2 ? "selected" : "" }}>Lỗi</option>
                </select>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Find</button>
            </div>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Mã giao dịch</th>
            <th>Hình thức</th>
            <th>Khách hàng</th>
            <th>Số tiền</th>
            <th>Khuyến mãi</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Ghi chú</th>
            <th>Ngày tạo</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($rechargeHistory ?? [] as $item)
            <tr>
                <td scope="row">{{ $item->code }}</td>
                <td>
                    @if ($item->type == 1)
                        <span>Chuyển khoản</span>
                    @elseif($item->type == 2)
                        <span>Tiền mặt</span>
                    @elseif($item->type == 3)
                        <span>Thẻ ATM Internet Banking</span>
                    @else
                    @endif
                </td>
                <td scope="row">{{ $item->user->name ?? "..." }}</td>
                <td scope="row">{{ number_format($item->money,0,',','.') }}đ</td>
                <td scope="row">{{ number_format($item->discount,0,',','.') }}đ</td>
                <td scope="row"><span class="text-danger text-bold">{{ number_format($item->total_money,0,',','.') }}đ</span></td>
                <td scope="row"><span class="{{ $item->getStatus($item->status)['class'] }}">{{ $item->getStatus($item->status)['name'] }}</span></td>
                <td scope="row">
                    @if ($item->status == \App\Models\RechargeHistory::STATUS_CANCEL)
                        <span class="text-danger" style="font-size: 13px;">{{ $item->note }}</span>
                    @endif
                </td>
                <td scope="row">{{ $item->created_at }}</td>
                <td scope="row">
                    @if ($item->status != \App\Models\RechargeHistory::STATUS_SUCCESS)
                        <a href="{{ route('get_admin.recharge.update', $item->id) }}" class="text-blue">Edit</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {!! $rechargeHistory->appends($query ?? [])->links('vendor.pagination.bootstrap-4') !!}
    </div>
@stop
