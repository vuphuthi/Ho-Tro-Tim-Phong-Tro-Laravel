@extends('admin.layouts.app_master_admin')
@section('content')
    <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Danh sách thành viên</span> </h2>
    <div class="">
        <form action="" class="row">
            <div class="col-sm-3">
                <input type="text" placeholder="Name" value="{{ Request::get('n') }}" name="n" class="form-control">
            </div>
            <div class="col-sm-3">
                <input type="text" placeholder="Phone" value="{{ Request::get('p') }}" name="p" class="form-control">
            </div>
            <div class="col-sm-3">
                <input type="text" placeholder="Email" value="{{ Request::get('e') }}" name="e" class="form-control">
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
                <th>Avatar</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Facebook</th>
                <th>Ngày tạo</th>
                <th>#</th>
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
                <td scope="row">{{ $item->facebook ?? "Chưa cập nhật" }}</td>
                <td scope="row">{{ $item->created_at }}</td>
                <td scope="row">
                    <a href="{{ route('get_admin.user.update', $item->id) }}">Update</a>
                    <a href="{{ route('get_admin.user.delete', $item->id) }}" class="text-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop
