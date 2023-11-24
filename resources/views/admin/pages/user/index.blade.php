@extends('admin.layouts.master_admin')

@section('content')

    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card my-5">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách thành viên</h3>

                            <form action="" class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px">
                                    <input type="text" placeholder="Name" value="{{ Request::get('n') }}" name="n"
                                        class="form-control float-right">


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
                                        <th>Avatar</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Ngày tạo</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users ?? [] as $item)
                                        <tr>
                                            <td scope="row">{{ $item->id }}</td>
                                            <td scope="row">
                                                <img src="{{ pare_url_file($item->avatar) }}"
                                                    style="width: 60px; height: 60px; border-radius: 50%;" alt="">
                                            </td>
                                            <td scope="row">{{ $item->name }}</td>
                                            <td scope="row">{{ $item->email }}</td>
                                            <td scope="row">{{ $item->phone }}</td>
                                            <td scope="row">{{ $item->created_at }}</td>
                                            <td scope="row">
                                                <a href="{{ route('get_admin.user.update', $item->id) }}"
                                                    class="btn btn-primary btn-sm">Update</a>
                                                <a href="{{ route('get_admin.user.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>

    </section>

@stop
