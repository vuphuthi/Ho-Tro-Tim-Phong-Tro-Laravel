<form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="form-room">
        <div class= "room-left">
            <h4>Địa chỉ cho thuê</h4>
            <div class="row-lists">
                <div class="form-group row-lists-3">
                    <label for="name">Tỉnh / TP</label>
                    <select name="city_id" class="form-control" id="city_id"  data-placeholder="Click chọn tỉnh thành">
                        <option value="">Chọn tỉnh / TP</option>
                        @foreach($cities  ?? [] as $item)
                            <option value="{{ $item->id }}" {{ $item->id == ($room->city_id ?? 0) ? "selected" : ""}}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('city_id'))
                        <span class="text-error">{{ $errors->first('city_id') }}</span>
                    @endif
                </div>
                <div class="form-group row-lists-3">
                    <label for="name">Quận huyện</label>
                    <select name="district_id" class="form-control " id="district_id" data-placeholder="Click chọn quận huyện">
                        <option value="">Chọn quận huyện</option>
                        @foreach($districts  ?? [] as $item)
                            <option value="{{ $item->id }}" {{ $item->id == ($room->district_id ?? 0) ? "selected" : ""}} >{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('district_id'))
                        <span class="text-error">{{ $errors->first('district_id') }}</span>
                    @endif
                </div>
                <div class="form-group row-lists-3">
                    <label for="name">Phường xã</label>
                    <select name="wards_id" class="form-control" id="wards_id" data-placeholder="Click chọn phường xã">
                        @foreach($wards  ?? [] as $item)
                            <option value="{{ $item->id }}" {{ $item->id == ($room->wards_id ?? 0) ? "selected" : ""}} >{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('wards_id'))
                        <span class="text-error">{{ $errors->first('wards_id') }}</span>
                    @endif
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group">
                    <label for="name">Số nhà</label>
                    <input type="text" name="apartment_number" class="form-control" placeholder="Số nhà" value="{{ $room->apartment_number ?? "" }}">
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group w-100">
                    <label for="name">Địa chỉ chính xác</label>
                    <input type="text" name="full_address" class="form-control" placeholder="Địa chỉ chính xác">
                </div>
            </div>
            <h4>Thông tin mô tả</h4>
            <div class="row-lists">
                <div class="form-group row-lists-3">
                    <label for="name">Loại chuyên mục</label>
                    <select name="category_id" class="form-control" id="" data-placeholder="Click chọn danh mục">
                        @foreach($categories ?? [] as $item)
                            <option value="{{ $item->id }}" {{ $item->id == ($room->category_id ?? 0) ? "selected" : ""}}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group w-100">
                    <label for="name">Tiêu đề</label>
                    <input type="text" class="form-control" name="name" placeholder="Tiêu đề" value="{{ $room->name ?? "" }}">
                    @if ($errors->first('name'))
                        <span class="text-error">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group w-100">
                    <label for="name">Ảnh bìa</label>
                    <input type="file" name="avatar">
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group w-100">
                    <label for="name">Mô tả nội dung</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="3">{{ $room->description ?? "" }}</textarea>
                    @if ($errors->first('description'))
                        <span class="text-error">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group w-100">
                    <label for="name">Map</label>
                    <textarea name="map" class="form-control" id="" cols="30" rows="3">{{ $room->map ?? "" }}</textarea>
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group">
                    <label for="name">Tông tin liên hệ</label>
                    <input type="text" class="form-control" disabled placeholder="Thông tin liên hệ" value="{{ \Auth::user()->name }}">
                </div>
            </div>
            <div class="row-lists">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Album ảnh</h3>
                    </div>
                    <div class="box-body">
                        @if (isset($images))
                            <div class="row" style="margin-bottom: 15px;display: flex">
                                @foreach($images as $item)
                                    <div class="col-sm-2" style="margin-right: 10px;">
                                        <a href="{{ route('get_user.room.delete_image', $item->id) }}" style="display: block;">
                                            <img src="{{ pare_url_file($item->path) }}" style="width: 300px;height: auto">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="form-group">
                            <div class="file-loading">
                                <input id="images" type="file" name="file[]" multiple class="file"
                                       data-overwrite-initial="false" data-min-file-count="0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group">
                    <label for="name">Điện thoại</label>
                    <input type="text" class="form-control" disabled placeholder="Điện thoại" value="{{ \Auth::user()->phone }}">
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group">
                    <label for="name">Giá cho thuê ( Đồng )</label>
                    <input type="text" name="price" class="form-control" placeholder="" value="{{ number_format($room->price ?? 0,0,',','.') ?? 0 }}">
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group">
                    <label for="name">Diện tích ( m2 )</label>
                    <input type="text" name="area" class="form-control" placeholder="" value="{{ $room->area ?? 0 }}">
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-bottom: 20px;">Lưu dữ liệu</button>
        </div>
        <div class= "room-right">
            <div class="card mb-5" style="color: #856404; background-color: #fff3cd; border-color: #ffeeba;">
                <div class="card-body">
                    <h4 class="card-title">Lưu ý khi đăng tin</h4>
                    <ul>
                        <li style="list-style-type: square; margin-left: 15px;">Nội dung phải viết bằng tiếng Việt có dấu</li>
                        <li style="list-style-type: square; margin-left: 15px;">Tiêu đề tin không dài quá 100 kí tự</li>
                        <li style="list-style-type: square; margin-left: 15px;">Các bạn nên điền đầy đủ thông tin vào các mục để tin đăng có hiệu quả hơn.</li>
                        <li style="list-style-type: square; margin-left: 15px;">Để tăng độ tin cậy và tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách kéo icon tới đúng vị trí của tin rao.</li>
                        <li style="list-style-type: square; margin-left: 15px;">Tin đăng có hình ảnh rõ ràng sẽ được xem và gọi gấp nhiều lần so với tin rao không có ảnh. Hãy đăng ảnh để được giao dịch nhanh chóng!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    var URL_LOAD_DISTRICT = '{{ route("get_user.load.district") }}'
    var URL_LOAD_WARD = '{{ route("get_user.load.wards") }}'
</script>
@push('script')
    <script src="/js/user_room.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
          rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js"
            type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"
            type="text/javascript"></script>

    <script>
        $(function () {
            $("#city_id").change(function () {
                let $this = $(this);
                let city_id = $this.val();
                console.log('----', city_id);

                $.ajax({
                    url: URL_LOAD_DISTRICT,
                    data: {
                        city_id : city_id
                    },
                })
                    .done(function (data) {
                        if (data)
                        {
                            let options = `<option value="0"> Chọn quận huyện </option>`;
                            data.map((item, index) => {
                                options += `<option value="${item.id}"> ${item.name}</option>`
                            })
                            $("#district_id").html(options);
                        }
                        console.log('---------- data: ', data);
                    });
            })

            $("#district_id").change(function () {
                let $this = $(this);
                let district_id = $this.val();
                console.log('----', district_id);

                $.ajax({
                    url: URL_LOAD_WARD,
                    data: {
                        district_id : district_id
                    },
                })
                    .done(function (data) {
                        if (data)
                        {
                            let options = `<option value="0"> Chọn phường xã </option>`;
                            data.map((item, index) => {
                                options += `<option value="${item.id}"> ${item.name}</option>`
                            })
                            $("#wards_id").html(options);
                        }
                        console.log('---------- data: ', data);
                    });
            })
        })
    </script>
@endpush
