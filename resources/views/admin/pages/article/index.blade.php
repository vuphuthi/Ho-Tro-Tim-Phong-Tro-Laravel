@extends('admin.layouts.master_admin')
@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="pt-4">
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
            <h2 class="" style="display: flex; justify-content: space-between; align-items: center;">
      
                <a href="{{ route('get_admin.article.create') }}" class="btn btn-success" style="font-size: 16px;">Thêm mới</a>
            </h2>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Quản lí bài viết</h3>

              <form action="" class="card-tools">
                <div
                  class="input-group input-group-sm"
                  style="width: 150px"
                >
                <input type="text" placeholder="Tìm kiếm" value="{{ Request::get('n') }}" name="n" class="form-control float-right">
                  

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
                        <th style="width: 20px;">#</th>
                        <th style="width: 80px;">Ảnh đại diện</th>
                        <th style="width: 65%;">Thông tin</th>
                        <th style="width: 200px;">Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles ?? [] as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="{{ pare_url_file($item->avatar) }}" alt="Ảnh đại diện" class="img-thumbnail" style="max-width: 100px; height: auto;">
                        </td>
                        <td>
                            <h5>{{ $item->name }}</h5>
                            <p>{{ $item->description }}</p>
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="{{ route('get_admin.article.update', $item->id) }}" class="btn btn-info btn-sm">sửa</a>
                            <a href="{{ route('get_admin.article.delete', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')">Xóa</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Không có bài viết nào.</td>
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
  </div>
  </section>

@stop