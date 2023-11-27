<div id="searchbar">
    <form role="search" method="GET" action="{{ route('get.room.search') }}" class="searchform js-form-submit-data">
        <div class="search_field" style="justify-content: space-between">
            <style>
                .search_field_item {
                    width: 100% !important;
                }
            </style>
            <div class="search_field_item search_field_item_loaitin">
                <label class="search_field_item_label">Loại tin</label>
                <select id="search_room_type" class="form-control js_select2_room_type" name="category_id">
                    <option value="">Tất cả</option>
                    @foreach($categoriesGlobal ?? [] as $item)
                        <option value="{{ $item->id }}" {{ Request::get('category_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search_field_item search_field_item_tinhthanh">
                <label class="search_field_item_label">Tỉnh thành</label>
{{--                <select id="search_city" class="form-control tinh-tp js_select2_tinhthanh js-select-tinhthanhpho select2-hidden-accessible" name="location_city_id" tabindex="-1" aria-hidden="true">--}}
{{--                    <option value="">Tất cả</option>--}}
{{--                    @foreach($locationsCity ?? [] as $item)--}}
{{--                        <option value="{{ $item->id }}" {{ Request::get('location_city_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
                <select name="city_id" class="form-control" id="city_id"  data-placeholder="Click chọn tỉnh thành">
                    <option value="">Chọn tỉnh / TP</option>
                    @foreach($locationsCity  ?? [] as $item)
                        <option value="{{ $item->id }}" {{ $item->id == ($room->city_id ?? (Request::get('city_id'))) ? "selected" : ""}}>{{ $item->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="search_field_item search_field_item_quanhuyen">
                <label class="search_field_item_label">Quận huyện</label>
                <select name="district_id" class="form-control " id="district_id" data-placeholder="Click chọn quận huyện">
                    <option value="">Chọn quận huyện</option>
                    @foreach($districts  ?? [] as $item)
                        <option value="{{ $item->id }}" {{ $item->id == ($room->district_id ?? (Request::get('district_id'))) ? "selected" : ""}} >{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search_field_item search_field_item_duongpho">
                <label class="search_field_item_label">Phường xã</label>
                <select name="wards_id" class="form-control" id="wards_id" data-placeholder="Click chọn phường xã">
                    <option value="">Chọn phường xã</option>
                    @foreach($wards  ?? [] as $item)
                        <option value="{{ $item->id }}" {{ $item->id == ($room->wards_id ?? (Request::get('wards_id'))) ? "selected" : ""}} >{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search_field_item search_field_item_mucgia">
                <label class="search_field_item_label">Khoảng giá</label>
                <select class="form-control price js_select2_price" name="price">
                    <option value="" >Chọn mức giá</option>
                    @foreach(config('config_search.price') as $key =>  $item)
                        <option value="{{ $key }}" {{ Request::get('price') == $key ? "selected" : "" }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search_field_item search_field_item_dientich">
                <label class="search_field_item_label">Diện tích</label>
                <select id="search_dientich" name="area" class="form-control js_select2_acreage">
                    <option value="">Chọn diện tích</option>
                    @foreach(config('config_search.area') as $key =>  $item)
                        <option value="{{ $key }}" {{ Request::get('area') == $key ? "selected" : "" }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search_field_item search_field_item_submit">
                <label class="search_field_item_label mb-item-label">&nbsp;</label>
                <div>
                    <button type="submit" class="btn btn-default btn_search_box form-control"> Tìm kiếm </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    var URL_LOAD_DISTRICT = '{{ route("get_user.load.district") }}'
    var URL_LOAD_WARD = '{{ route("get_user.load.wards") }}'
</script>
@push('script')
    <script src="/js/user_room.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
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
