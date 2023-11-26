@extends('admin.layouts.app_master_admin')
@section('content')
    <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Danh sách địa điểm</span> <a href="{{ route('get_admin.location.create') }}" style="font-size: 16px;">Thêm mới</a></h2>
    <div class="">
        <form action="" class="row">
            <div class="col-sm-3">
                <input type="text" placeholder="Name" value="{{ Request::get('n') }}" name="n" class="form-control">
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary">Find</button>
            </div>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Phân loại</th>
                <th>Trạng thái</th>
                <th>.</th>
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
                    <td scope="row">{{ $item->type_text }}</td>
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
                        <a href="{{ route('get_admin.location.delete', $item->id) }}" class="text-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $locations->appends($query ?? [])->links('vendor.pagination.simple-bootstrap-4') !!}
@stop
