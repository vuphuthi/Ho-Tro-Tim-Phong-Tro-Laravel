@extends('admin.layouts.master_admin')

@section('content')

<section class="content">
    <div class="container-fluid">
      
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách nạp tiền</h3>

              <div class="card-tools">
                <h2 class="" style="display: flex; justify-content: space-between">
                    
                    <a href="{{ route('get_admin.recharge.create') }}" class="btn btn-primary" style="font-size: 16px;">Thêm mới</a>
                </h2>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã giao dịch</th>
                        <th>Hình thức</th>
                        <th>Khách hàng</th>
                        <th>Số tiền</th>
                        <th>Khuyến mãi</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Ghi chú</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rechargeHistory ?? [] as $item)
                    <tr>
                        <td>{{ $item->code }}</td>
                        <td>
                            @if ($item->type == 1)
                            Chuyển khoản
                            @elseif($item->type == 2)
                            Tiền mặt
                            @elseif($item->type == 3)
                            Thẻ ATM Internet Banking
                            @else
                            ...
                            @endif
                        </td>
                        <td>{{ $item->user->name ?? "..." }}</td>
                        <td>{{ number_format($item->money, 0, ',', '.') }}đ</td>
                        <td>{{ number_format($item->discount, 0, ',', '.') }}đ</td>
                        <td>
                            <span class="text-danger text-bold">{{ number_format($item->total_money, 0, ',', '.') }}đ</span>
                        </td>
                        <td>
                            <span class="{{ $item->getStatus($item->status)['class'] }}">
                                {{ $item->getStatus($item->status)['name'] }}
                            </span>
                        </td>
                        <td>
                            @if ($item->status == \App\Models\RechargeHistory::STATUS_CANCEL)
                            <span class="text-danger" style="font-size: 13px;">{{ $item->note }}</span>
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            @if ($item->status != \App\Models\RechargeHistory::STATUS_SUCCESS)
                            <a href="{{ route('get_admin.recharge.update', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="mt-3">
                {!! $rechargeHistory->appends($query ?? [])->links('vendor.pagination.bootstrap-4') !!}
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