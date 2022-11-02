@extends('admin.layouts.app_master_admin')
@section('content')
    <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Danh sách thành viên</span> </h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Avatar</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users ?? [] as $item)
            <tr>
                <td scope="row">{{ $item->id }}</td>
                <td scope="row">
                    <img src="{{ pare_url_file($item->avatar) }}" style="width: 60px;height: 60px;border-radius: 50%" alt="">
                </td>
                <td scope="row">{{ $item->name }}</td>
                <td scope="row">{{ $item->email }}</td>
                <td scope="row">{{ $item->phone }}</td>
                <td scope="row">{{ $item->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
