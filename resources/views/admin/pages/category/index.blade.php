@extends('admin.layouts.app_master_admin')
@section('content')
    <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Danh sách danh mục</span> <a href="{{ route('get_admin.category.create') }}" style="font-size: 16px;">Thêm mới</a></h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Trạng thái</th>
                <th>Mô tả</th>
                <th>Ngày tạo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories ?? [] as $item)
                <tr>
                    <td scope="row">{{ $item->id }}</td>
                    <td scope="row">{{ $item->name }}</td>
                    <td scope="row">
                        @if ($item->status == 1)
                            <span class="text-danger">Hiển thị</span>
                        @else
                            <span class="text-pink">Ẩn</span>
                        @endif
                    </td>
                    <td scope="row">{{ $item->description }}</td>
                    <td scope="row">{{ $item->created_at }}</td>
                    <td scope="row">
                        <a href="{{ route('get_admin.category.update', $item->id) }}" class="text-blue">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
