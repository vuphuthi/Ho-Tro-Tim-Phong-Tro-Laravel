<div id="searchbar">
    <form role="search" method="GET" action="{{ route('get_admin.location.index') }}" class="searchform js-form-submit-data">
        <div class="search_field" style="justify-content: space-between">
            <style>
                .search_field_item {
                    width: 100% !important;
                }

                .multiselect {
                    width: 200px;
                }

                .selectBox {
                    position: relative;
                }

                .overSelect {
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: 0;
                    bottom: 0;
                }

                #checkboxes {
                    display: none;
                    border: 1px #dadada solid;
                }

                #checkboxes label {
                    display: block;
                    background: #ffffff;
                }

                #checkboxes label:hover {
                    background-color: #1e90ff;
                }
                #searchbar .searchform .search_field .search_field_item .search_field_item_label {
                    font-size: unset;
                }

                .multiselect {
                    width: 200px;
                }

                .selectBox {
                    position: relative;
                }

                .overSelect {
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: 0;
                    bottom: 0;
                }

                #checkboxes {
                    display: none;
                    border: 1px #dadada solid;
                }

                #checkboxes label {
                    display: block;
                    background: #ffffff;
                }

                #checkboxes label:hover {
                    background-color: #1e90ff;
                }
                #searchbar .searchform .search_field .search_field_item .search_field_item_label {
                    font-size: unset;
                }

            </style>
            <div class="search_field_item search_field_item_loaitin">
                <label class="search_field_item_label">Loại tin</label>
                <select id="search_room_type" class="form-control js_select2_room_type" name="category_id">
                    <option value="">Tất cả</option>
                    @foreach($categoriesGlobal ?? [] as $item)
                        <option
                            value="{{ $item->id }}" {{ Request::get('category_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
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
                <select name="city_id" class="form-control" id="city_id" data-placeholder="Click chọn tỉnh thành">
                    <option value="">Chọn tỉnh / TP</option>
                    @foreach($locationsCity  ?? [] as $item)
                        <option
                            value="{{ $item->id }}" {{ $item->id == ($room->city_id ?? (Request::get('city_id'))) ? "selected" : ""}}>{{ $item->name }}</option>
                    @endforeach
                </select>

            </div>
            <div class="search_field_item search_field_item_quanhuyen">
                <label class="search_field_item_label">Quận huyện</label>
                <select name="district_id" class="form-control " id="district_id"
                        data-placeholder="Click chọn quận huyện">
                    <option value="">Chọn quận huyện</option>
                    @foreach($districts  ?? [] as $item)
                        <option
                            value="{{ $item->id }}" {{ $item->id == ($room->district_id ?? (Request::get('district_id'))) ? "selected" : ""}} >{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search_field_item search_field_item_duongpho">
                <label class="search_field_item_label">Phường xã</label>
                <select name="wards_id" class="form-control" id="wards_id" data-placeholder="Click chọn phường xã">
                    <option value="">Chọn phường xã</option>
                    @foreach($wards  ?? [] as $item)
                        <option
                            value="{{ $item->id }}" {{ $item->id == ($room->wards_id ?? (Request::get('wards_id'))) ? "selected" : ""}} >{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search_field_item search_field_item_mucgia">
                <label class="search_field_item_label">Khoảng giá</label>
                <select class="form-control price js_select2_price" name="price">
                    <option value="">Chọn mức giá</option>
                    @foreach(config('config_search.price') as $key =>  $item)
                        <option
                            value="{{ $key }}" {{ Request::get('price') == $key ? "selected" : "" }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search_field_item search_field_item_dientich">
                <label class="search_field_item_label">Diện tích</label>
                <select id="search_dientich" name="area" class="form-control js_select2_acreage">
                    <option value="">Chọn diện tích</option>
                    @foreach(config('config_search.area') as $key =>  $item)
                        <option
                            value="{{ $key }}" {{ Request::get('area') == $key ? "selected" : "" }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search_field_item search_field_item_tienich">
                <label class="search_field_item_label">Tiện ích</label>
                <div class="selectBox" onclick="showCheckboxes()">
                    <select class="form-control js_select2_acreage">
                        <option>Chọn tiện ích</option>
                    </select>
                    <div class="overSelect"></div>
                </div>
                <div id="checkboxes">
                    @foreach($optionItems as $key =>  $item)
                        <div class="d-flex" style="margin: 5px;background: #ffff;width: 200px">
                            <label style="margin-left: 10px" for="{{ $item->id }}">{{ $item->name }}</label>
                            <input style="width: 15px; margin-left: 100px;" type="checkbox" name="option_items[]" value="{{ $item->id }}" id="{{ $item->id }}"/>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="search_field_item search_field_item_submit">
                <label class="search_field_item_label mb-item-label">&nbsp;</label>
                <div>
                    <button type="submit" class="btn btn-default btn_search_box form-control"> Tìm kiếm</button>
                </div>
            </div>
        </div>
    </form>
</div>
