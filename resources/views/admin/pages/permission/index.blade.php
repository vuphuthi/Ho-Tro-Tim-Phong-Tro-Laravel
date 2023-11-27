@extends('admin.layouts.master_admin')
@section('content')

<section class="content">
    <div class="container-fluid">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách</h3>

              <form class="card-tools">
                <div
                  class="input-group input-group-sm"
                  style="width: 150px"
                >
                <input type="text" placeholder="Name" value="{{ Request::get('n') }}" name="n" class="form-control float-right">
                  

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead >
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Guard</th>
                        <th scope="col">Loại</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions ?? [] as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->guard_name }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('get_admin.permission.update', $item->id) }}" class="btn btn-sm btn-info">Sửa</a>
                            <a href="{{ route('get_admin.permission.delete', $item->id) }}" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            {!! $permissions->appends($query ?? [])->links('vendor.pagination.simple-bootstrap-4') !!}
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
     
    </div>
 
  </section>

@stop