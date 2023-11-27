@extends('admin.layouts.master_admin')

@section('content')

<section class="content">
    <div class="container-fluid">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card my-5">
            <div class="card-header">
              <h3 class="card-title">Danh sách thanh toán</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead >
                    <tr>
                        <th scope="col" style="text-align: left">Mã giao dịch</th>
                        <th scope="col" class="text-center">Khách hàng</th>
                        <th scope="col" class="text-center">Loại</th>
                        <th scope="col" class="text-center">Tổng tiền</th>
                        <th scope="col" class="text-center">Tin</th>
                        <th scope="col" class="text-center">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paymentHistory ?? [] as $item)
                    <tr style="text-align: center">
                        <td scope="row" style="text-align: left">{{ $item->id }}</td>
                        <td scope="row" style="text-align: center">{{ $item->user->name ?? "" }} - ID {{ $item->user_id }}</td>
                        <td>
                            @if ($item->type == 1)
                            <span>Tin tường</span>
                            @elseif($item->type == 2)
                            <span>Vip 3</span>
                            @elseif($item->type == 3)
                            <span>Vip 2</span>
                            @elseif($item->type == 4)
                            <span>Vip 1</span>
                            @else
                            <span>Đặc biệt</span>
                            @endif
                            <span>{{ $item->type }}</span>
                        </td>
                        <td scope="row"><span class="text-danger text-bold">{{ number_format($item->money, 0, ',', '.') }}đ</span></td>
                        <td scope="row">
                            <a href="">{{ $item->room_id }}</a>
                        </td>
                        <td scope="row">
                            {{ $item->created_at }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="mt-3">
                {!! $paymentHistory->appends($query ?? [])->links('vendor.pagination.bootstrap-4') !!}
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