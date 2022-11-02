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
                <select id="search_city" class="form-control tinh-tp js_select2_tinhthanh js-select-tinhthanhpho select2-hidden-accessible" name="location_city_id" tabindex="-1" aria-hidden="true">
                    <option value="">Tất cả</option>
                    @foreach($locationsCity ?? [] as $item)
                        <option value="{{ $item->id }}" {{ Request::get('location_city_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
{{--            <div class="search_field_item search_field_item_quanhuyen">--}}
{{--                <label class="search_field_item_label">Quận huyện</label>--}}
{{--                <select class="form-control js_select2_quanhuyen js-select-quanhuyen select2-hidden-accessible"--}}
{{--                    name="quan" data-current="" tabindex="-1" aria-hidden="true">--}}
{{--                    <option value="0">Tất cả</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="search_field_item search_field_item_duongpho">--}}
{{--                <label class="search_field_item_label">Đường phố</label>--}}
{{--                <select name="duong" class="form-control js_select2_duongpho js-select-duong select2-hidden-accessible" data-current="" tabindex="-1" aria-hidden="true">--}}
{{--                    <option value="0">Tất cả</option>--}}
{{--                </select>--}}
{{--            </div>--}}
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
                    <button type="submit" class="btn btn-default btn_search_box form-control"> Lọc tin </button>
                </div>
            </div>
        </div>
    </form>
</div>
