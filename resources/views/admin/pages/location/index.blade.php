@extends('admin.layouts.app_master_admin')
@section('content')
    <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Danh sách địa điểm</span> <a href="{{ route('get_admin.location.create') }}" style="font-size: 16px;">Thêm mới</a></h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Phân loại</th>
                <th>Trạng thái</th>
                <th>Nổi bật</th>
                <th>Ngày tạo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations ?? [] as $item)
                <tr>
                    <td scope="row">{{ $item->id }}</td>
                    <td scope="row">{{ $item->name }}</td>
                    <td scope="row">{{ $item->getType($item->type) }}</td>
                    <td scope="row"><span class="text-success">Active</span></td>
                    <td scope="row">
                        @if ($item->hot == 1)
                            <span class="text-danger">Hot</span>
                        @else
                            <span class="text-pink">Mặc định</span>
                        @endif
                    </td>
                    <td scope="row">{{ $item->created_at }}</td>
                    <td scope="row">
                        <a href="{{ route('get_admin.location.update', $item->id) }}" class="text-blue">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
