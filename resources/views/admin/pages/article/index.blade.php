@extends('admin.layouts.app_master_admin')
@section('content')
    <h2 class="mt-3" style="display: flex;justify-content: space-between"><span>Danh sách bài viết</span> <a href="{{ route('get_admin.article.create') }}" style="font-size: 16px;">Thêm mới</a></h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Avatar</th>
                <th>Thông tin</th>
                <th style="width: 150px">Ngày tạo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles ?? [] as $item)
                <tr>
                    <td scope="row">{{ $item->id }}</td>
                    <td scope="row">
                        <img src="{{ pare_url_file($item->avatar) }}" alt="" style="display: block;width: 100px;height: auto;object-fit: cover;">
                    </td>
                    <td scope="row">
                        <h5>{{ $item->name }}</h5>
                        <p>{{ $item->description }}</p>
                    </td>
                    <td scope="row">{{ $item->created_at }}</td>
                    <td scope="row">
                        <a href="{{ route('get_admin.article.update', $item->id) }}" class="text-blue">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
