@extends('admin.layouts.master_admin')

@section('content')

    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <div class="row">
                <div class="col-12 py-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách tin đăng phòng</h3>

                            <form action="" class="card-tools">
                                <div class="input-group input-group-sm" style="width: 320px">
                                    <input type="text" placeholder="Name" value="{{ Request::get('n') }}" name="n"
                                        class="form-control float-right">
                                    <select name="category_id" class="form-control">
                                        <option value="">Danh mục</option>
                                        @foreach ($categories as $item)
                                            <option {{ Request::get('category_id') == $item->id ? 'selected' : '' }}
                                                value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>

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
                                        <th style="width: 50px;">Code</th>
                                        <th style="width: 100px;">Ảnh đại diện</th>
                                        <th style="width: 350px;">Thông tin</th>
                                        <th>Danh mục</th>
                                        <th>Giá</th>
                                        <th>Bắt đầu</th>
                                        <th>Kết thúc</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms ?? [] as $item)
                                        <tr>
                                            <td>#{{ $item->id }}</td>
                                            <td>
                                                <div class="thumbnail"
                                                    style="width: 100px; height: 100px; overflow: hidden; margin: 0 auto;">
                                                    <a href="{{ route('get.room.detail', ['id' => $item->id, 'slug' => $item->slug]) }}"
                                                        target="_blank">
                                                        <img src="{{ pare_url_file($item->avatar) }}" alt=""
                                                            style="display: block; width: 100%; height: 100%; object-fit: cover;">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('get.room.detail', ['id' => $item->id, 'slug' => $item->slug]) }}"
                                                    target="_blank"
                                                    style="font-size: 14px; font-weight: 500; color: #007aff; text-decoration: none;">
                                                    @if ($item->service_hot > 0)
                                                        @for ($i = 1; $i <= $item->service_hot; $i++)
                                                            <span style="color: #fed553" class="fa fa-star"></span>
                                                        @endfor
                                                    @endif
                                                    {{ $item->name }}
                                                </a>
                                                <p
                                                    style="font-size: 14px; font-weight: 400; color: #212121; text-decoration: none; margin-bottom: 5px;">
                                                    <span class="fa fa-map-marker"></span>
                                                    @if (isset($item->wards->name))
                                                        <span>{{ $item->wards->name ?? '' }} - </span>
                                                    @endif
                                                    @if (isset($item->district->name))
                                                        <span>{{ $item->district->name ?? '' }} - </span>
                                                    @endif
                                                    @if (isset($item->city))
                                                        <span>{{ $item->city->name }}</span>
                                                    @endif
                                                </p>
                                                <p style="margin-bottom: 2px;">
                                                    @if ($item->status != \App\Models\Room::STATUS_ACTIVE)
                                                        <a href="{{ route('get_admin.room.success', $item->id) }}"
                                                            class="text-success"
                                                            style="font-size: 13px; text-decoration: none; font-weight: 500;"><i
                                                                class="fa fa-refresh"></i> Duyệt</a>
                                                        <a href="{{ route('get_admin.room.expires', $item->id) }}"
                                                            class="text-warning"
                                                            style="font-size: 13px; text-decoration: none; font-weight: 500;"><i
                                                                class="fa fa-credit-card"></i> Hết hạn</a>
                                                    @endif
                                                    @if ($item->status == \App\Models\Room::STATUS_ACTIVE)
                                                        <a href="{{ route('get_admin.room.hide', $item->id) }}"
                                                            class="text-secondary"
                                                            style="font-size: 13px; text-decoration: none;"> <i
                                                                class="fa fa-eye-slash"></i> Ẩn tin</a>
                                                    @endif
                                                    <a href="{{ route('get_admin.room.cancel', $item->id) }}"
                                                        class="text-danger"
                                                        style="font-size: 13px; text-decoration: none; font-weight: 500;"><i
                                                            class="fa fa-times"></i> Huỷ</a>
                                                    <a href="{{ route('get_admin.room.delete', $item->id) }}"
                                                        class="text-danger"
                                                        style="font-size: 13px; text-decoration: none; font-weight: 500;">
                                                        <i class="fa fa-trash"></i>Delete</a>
                                                </p>
                                                @if ($item->status == \App\Models\Room::STATUS_CANCEL)
                                                    <p style="margin-bottom: 2px; font-size: 12px;"><i
                                                            class="text-danger">{{ $item->reason }}</i></p>
                                                @endif
                                            </td>
                                            <td><span class="label label-danger"
                                                    style="font-size: 14px;">{{ $item->category->name ?? '[N\A]' }}</span>
                                            </td>
                                            <td><span
                                                    style="font-size: 14px;">{{ number_format($item->price, 0, ',', '.') }}
                                                    triệu / tháng</span></td>
                                            <td>
                                                <p style="font-size: 14px; margin-bottom: 5px;">
                                                    <span>{{ $item->time_start }}</span></p>
                                            </td>
                                            <td>
                                                <p style="font-size: 14px;"><span>{{ $item->time_stop }}</span></p>
                                            </td>
                                            <td>
                                                <span style="font-size: 14px;"
                                                    class="{{ $item->getStatus($item->status)['class'] ?? '...' }}">{{ $item->getStatus($item->status)['name'] ?? '...' }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {!! $rooms->appends($query ?? [])->links('vendor.pagination.bootstrap-4') !!}
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
