@extends('admin.layouts.master_admin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="pt-4">
                <h2 style="display: flex; justify-content: space-between;">

                    <a href="{{ route('get_admin.location.create') }}" class="btn btn-success" style="font-size: 16px;">Thêm
                        mới</a>
                </h2>


            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách địa điểm</h3>
                                <form action="" class="card-tools">

                                    <div class="input-group input-group-sm" style="width: 150px">
                                        <input type="text" class="form-control float-right" placeholder="Name"
                                            value="{{ Request::get('n') }}" name="n">


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
                                        <th>Phân loại</th>
                                        <th>Trạng thái</th>
                                        <th>.</th>
                                        <th>Nổi bật</th>
                                        <th>Ngày tạo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($locations ?? [] as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->getType($item->type) }}</td>
                                            <td><span class="text-success">Active</span></td>
                                            <td>
                                                @if ($item->hot == 1)
                                                    <span class="text-danger">Hot</span>
                                                @else
                                                    <span class="text-pink">Mặc định</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="{{ route('get_admin.location.update', $item->id) }}"
                                                    class="btn btn-info btn-sm">sửa</a>
                                                <a href="{{ route('get_admin.location.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
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
                            <div class="mt-3">
                                {!! $locations->appends($query ?? [])->links('vendor.pagination.simple-bootstrap-4') !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>

    </section>

@stop
