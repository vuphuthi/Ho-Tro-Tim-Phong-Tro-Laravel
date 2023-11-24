@extends('admin.layouts.master_admin')

@section('content')

<section class="content">
    <div class="container-fluid">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
            <h2 style="display: flex; justify-content: space-between; align-items: center;">
                <a href="{{ route('get_admin.role.create') }}" class="btn btn-success btn-sm">Thêm mới</a>
            </h2>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Responsive Hover Table</h3>

              <form class="card-tools">
                <div
                  class="input-group input-group-sm"
                  style="width: 150px"
                >
                <input type="text" class="form-control float-right" placeholder="Tên" value="{{ Request::get('n') }}" name="n">
                  

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
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Ngày tạo</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles ?? [] as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td class="text-center">
                            <a href="{{ route('get_admin.role.update', $item->id) }}" class="btn btn-sm btn-primary">Sửa</a>
                            <a href="{{ route('get_admin.role.delete', $item->id) }}" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Không có dữ liệu</td>
                    </tr>
                    @endforelse
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