@extends('admin.layouts.master_admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="pt-4">
                <h2 style="display: flex; justify-content: space-between;">
                    
                    <a href="{{ route('get_admin.category.create') }}" class="btn btn-success" style="font-size: 16px;">Thêm
                        mới</a>
                </h2>

                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách danh mục</h3>

                                <form action="" class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px">
                                        <input type="text" placeholder="Name" value="{{ Request::get('n') }}"
                                            name="n" class="form-control float-right" />

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Trạng thái</th>
                                            <th>Mô tả</th>
                                            <th>Ngày tạo</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories ?? [] as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                        <span class="text-danger">Hiển thị</span>
                                                    @else
                                                        <span class="text-pink">Ẩn</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('get_admin.category.update', $item->id) }}"
                                                        class="btn btn-info btn-sm">sửa</a>
                                                    <a href="{{ route('get_admin.category.delete', $item->id) }}"
                                                        class="btn btn-danger btn-sm">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    {!! $categories->appends($query ?? [])->links('vendor.pagination.simple-bootstrap-4') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@stop
