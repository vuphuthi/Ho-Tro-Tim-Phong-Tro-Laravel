<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
    #map {
        height: 20vh;
        width: 100%;

    }
</style>
<form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <div class="form-room">
        <div class= "room-left">
            <h4>Địa chỉ cho thuê</h4>
            <div class="row-lists">
                <div class="form-group row-lists-3">
                    <label for="name">Tỉnh / TP</label>
                    <select name="city_id" class="form-control" id="city_id" data-placeholder="Click chọn tỉnh thành">
                        <option value="">Chọn tỉnh / TP</option>
                        @foreach ($cities ?? [] as $item)
                            <option value="{{ $item->id }}"
                                {{ $item->id == ($room->city_id ?? 0) ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('city_id'))
                        <span class="text-error">{{ $errors->first('city_id') }}</span>
                    @endif
                </div>
                <div class="form-group row-lists-3">
                    <label for="name">Quận huyện</label>
                    <select name="district_id" class="form-control " id="district_id"
                        data-placeholder="Click chọn quận huyện">
                        <option value="">Chọn quận huyện</option>
                        @foreach ($districts ?? [] as $item)
                            <option value="{{ $item->id }}"
                                {{ $item->id == ($room->district_id ?? old('district_id', 0)) ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('district_id'))
                        <span class="text-error">{{ $errors->first('district_id') }}</span>
                    @endif
                </div>
                <div class="form-group row-lists-3">
                    <label for="name">Phường xã</label>
                    <select name="wards_id" class="form-control" id="wards_id" data-placeholder="Click chọn phường xã">
                        @foreach ($wards ?? [] as $item)
                            <option value="{{ $item->id }}"
                                {{ $item->id == ($room->wards_id ?? 0) ? 'selected' : '' }}>{{ $item->name }}
                            </option>
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
                    <input type="text" name="apartment_number" class="form-control" placeholder="Số nhà"
                        value="{{ old('apartment_number', $room->apartment_number ?? '') }}">
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group w-100">
                    <label for="name">Địa chỉ chính xác</label>
                    <input type="text" name="full_address" class="form-control" placeholder="Địa chỉ chính xác"
                        value="{{ old('full_address', $room->full_address ?? '') }}">
                </div>
            </div>
            <h4>Thông tin mô tả</h4>
            <div class="row-lists">
                <div class="form-group row-lists-3">
                    <label for="name">Loại chuyên mục</label>
                    <select name="category_id" class="form-control" id=""
                        data-placeholder="Click chọn danh mục">
                        @foreach ($categories ?? [] as $item)
                            <option value="{{ $item->id }}"
                                {{ $item->id == ($room->category_id ?? old('category_id', 0)) ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group w-100">
                    <label for="name">Tiêu đề</label>
                    <input type="text" class="form-control" name="name" placeholder="Tiêu đề"
                        value="{{ old('name', $room->name ?? '') }}">
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
                    <textarea name="description" class="form-control" id="" cols="30" rows="3">{{ old('description', $room->description ?? '') }}</textarea>
                    @if ($errors->first('description'))
                        <span class="text-error">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
            {{-- <div>
                <h1>HTML Geolocation</h1>
                <p>Click the button to get your coordinates.</p>
            
                <button type="button" onclick="getLocation()">Try It</button>
            
                <p id="demo">
                    <input type="text" name="x" id="x" value="">
                    <input type="text" name="y" id="y" value="">
                </p>
            </div> --}}
            <div>
                <h1>HTML Geolocation</h1>
                <p>Click the button to get your coordinates.</p>

                <button type="button" onclick="getLocation()">Try It</button>

                <p id="demo">
                    <label for="x">Latitude:</label>
                    <input type="text" name="x" id="x" value="">
                    <label for="y">Longitude:</label>
                    <input type="text" name="y" id="y" value="">
                </p>
            </div>
            <div id="map" style="height: 100px;"></div>
            {{-- <div class="row-lists">
                <div class="form-group w-100">
                    <label for="name">Map</label>
                    <textarea name="map" class="form-control" id="" cols="30" rows="3">{{ old('map',$room->map ?? "") }}</textarea>
                </div>
            </div> --}}
            <div class="row-lists">
                <div class="form-group">
                    <label for="name">Tông tin liên hệ</label>
                    <input type="text" class="form-control" disabled placeholder="Thông tin liên hệ"
                        value="{{ \Auth::user()->name }}">
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
                                @foreach ($images as $item)
                                    <div class="col-sm-2" style="margin-right: 10px;">
                                        <a href="{{ route('get_user.room.delete_image', $item->id) }}"
                                            style="display: block;">
                                            <img src="{{ pare_url_file($item->path) }}"
                                                style="width: 300px;height: auto">
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
                    <input type="text" class="form-control" disabled placeholder="Điện thoại"
                        value="{{ \Auth::user()->phone }}">
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group">
                    <label for="name">Giá cho thuê ( Đồng )</label>
                    <input type="text" name="price" class="form-control" placeholder=""
                        value="{{ number_format($room->price ?? 0, 0, ',', '.') ?? 0 }}">
                </div>
            </div>
            <div class="row-lists">
                <div class="form-group">
                    <label for="name">Diện tích ( m2 )</label>
                    <input type="text" name="area" class="form-control" placeholder=""
                        value="{{ old('area', $room->area ?? 0) }}">
                </div>
            </div>
            <button type="submit" class="btn btn-success" style="margin-bottom: 20px;">Lưu dữ liệu</button>
        </div>
        <div class= "room-right">
            <div class="card mb-5" style="color: #856404; background-color: #fff3cd; border-color: #ffeeba;">
                <div class="card-body">
                    <h4 class="card-title">Lưu ý khi đăng tin</h4>
                    <ul>
                        <li style="list-style-type: square; margin-left: 15px;">Nội dung phải viết bằng tiếng Việt có
                            dấu</li>
                        <li style="list-style-type: square; margin-left: 15px;">Tiêu đề tin không dài quá 100 kí tự
                        </li>
                        <li style="list-style-type: square; margin-left: 15px;">Các bạn nên điền đầy đủ thông tin vào
                            các mục để tin đăng có hiệu quả hơn.</li>
                        <li style="list-style-type: square; margin-left: 15px;">Để tăng độ tin cậy và tin rao được
                            nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách kéo icon tới
                            đúng vị trí của tin rao.</li>
                        <li style="list-style-type: square; margin-left: 15px;">Tin đăng có hình ảnh rõ ràng sẽ được
                            xem và gọi gấp nhiều lần so với tin rao không có ảnh. Hãy đăng ảnh để được giao dịch nhanh
                            chóng!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js">
    var URL_LOAD_DISTRICT = '{{ route('get_user.load.district') }}'
    var URL_TOADO = '{{ route('get_user.toado') }}'
    var URL_LOAD_WARD = '{{ route('get_user.load.wards') }}'
</script>
@push('script')
    <script src="/js/user_room.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all"
        rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js"
        type="text/javascript"></script>

    <script>
        // function showPosition(position) {
        //     var x = document.getElementById("x");
        //     var y = document.getElementById("y");
        //     x.value = position.coords.latitude;
        //     y.value = position.coords.longitude;
        // }
        //         function showPosition(position) {
        //     var latitude = position.coords.latitude;
        //     var longitude = position.coords.longitude;

        //     // Hiển thị tọa độ trong input
        //     document.getElementById("coordinates").value = `${latitude}, ${longitude}`;

        //     // Tích hợp Leaflet và hiển thị bản đồ
        //     var map = L.map('map').setView([latitude, longitude], 13);
        //     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        //     L.marker([latitude, longitude]).addTo(map);
        // }
        const x = document.getElementById("coordinates");
        // var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 13);
        // var map = L.map('map').setView([21.8582952038295, 106.732825239514], 10);     

        var data = [
        [21.8582952038295, 106.732825239514],
        [21.8610864304347, 106.731192613847],
        [21.8627877227485, 106.730906188291],
        [21.8645155771512, 106.727096728372],
        [21.8664826473176, 106.724404328149],
        [21.8669877015013, 106.720251157592],
        [21.8669079562366, 106.720136587346],
        [21.869353457852, 106.718446676567]
    ];
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            var x = document.getElementById("x");
            var y = document.getElementById("y");
            x.value = position.coords.latitude;
            y.value = position.coords.longitude;

            // Tích hợp Leaflet và hiển thị bản đồ
            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 13);
            // var map = L.map('map').setView([21.8582952038295, 106.732825239514], 10);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
            L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
            
        }
        function fetchDataAndDisplayMarkers(map) {
        // Sử dụng AJAX để lấy dữ liệu từ Laravel
        $.ajax({
            url: '/lay-du-lieu-tu-db', // Đặt URL tương ứng với route Laravel của bạn
            method: 'GET',
            success: function(response) {
                // Lấy dữ liệu từ response và thêm vào bản đồ
                var myIcon1 = new L.icon({
                    iconUrl: 'https://cdn4.iconfinder.com/map/icons/basic-ui-pack-flat-s94-1/64/Basic_UI_Icon_Pack_-_Flat_map_pointer-512.png',
                    iconSize: [30, 30],
                    iconAnchor: [12, 12],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                });

                // Thêm marker vào bản đồ cho mỗi điểm dữ liệu từ cơ sở dữ liệu
                for (var i = 0; i < response.data.length; i++) {
                    var marker = new L.marker([response.data[i].x, response.data[i].y], {
                        icon: myIcon1
                    });
                    marker.bindPopup('Có thể đưa thêm dữ liệu vào đây').openPopup();
                    marker.addTo(map);
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
        var myIcon1 = new L.icon({
            iconUrl: 'https://cdn4.iconfinder.com/map/icons/basic-ui-pack-flat-s94-1/64/Basic_UI_Icon_Pack_-_Flat_map_pointer-512.png',
            iconSize: [30, 30],
            iconAnchor: [12, 12],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        for (var i = 0; i < data.length; i++) {
            marker = new L.marker([data[i][0], data[i][1]], {
                icon: myIcon1
            });
            marker.bindPopup('Co the do them du lieu ra day').openPopup();
            marker.addTo(map);
        }
        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> '
        });
        osm.addTo(map);



        var google3D = L.tileLayer('http://mt0.google.com/vt/lyrs=p&hl=en&x={x}&y={y}&z={z}', {
            attribution: '&copy; <a href="https://www.google.com">Google map</a> contributors'
        });


        var centrals = L.geoJSON(CentralJSON, {
            onEachFeature: function(feature, layer) {
                const popupContent1 =

                    "<tr><td> Tỉnh: </td><td>" +
                    feature.properties.NAME_1 + ", Việt Nam" +
                    "<br></td></tr>" +
                    "<tr><td> Diện tích: </td><td>" +
                    feature.properties.Shape_Area + "km<sup>2"
                "</td></tr>";
                layer.bindPopup(popupContent1);
            },
            style: {
                fillColor: 'orange',
                fillOpacity: 0.8,

            }

        }).addTo(map);

        var norths = L.geoJSON(NorthJSON, {
            onEachFeature: function(feature, layer) {
                const popupContent1 =

                    "<tr><td> Tỉnh: </td><td>" +
                    feature.properties.NAME_1 + ", Việt Nam" +
                    "<br></td></tr>" +
                    "<tr><td> Diện tích: </td><td>" +
                    feature.properties.Shape_Area + "km<sup>2"
                "</td></tr>";
                layer.bindPopup(popupContent1);
            },
            style: {
                fillColor: 'green',
                fillOpacity: 0.8,

            }

        }).addTo(map);

        var souths = L.geoJSON(SouthJSON, {
            onEachFeature: function(feature, layer) {
                const popupContent1 =

                    "<tr><td> Tỉnh: </td><td>" +
                    feature.properties.NAME_1 + ", Việt Nam" +
                    "<br></td></tr>" +
                    "<tr><td> Diện tích: </td><td>" +
                    feature.properties.Shape_Area + "km<sup>2"
                "</td></tr>";
                layer.bindPopup(popupContent1);
            },
            style: {
                fillColor: 'red',
                fillOpacity: 0.8,

            }

        }).addTo(map);

        var tns = L.geoJSON(TNJSON, {
            onEachFeature: function(feature, layer) {
                const popupContent1 =

                    "<tr><td> Tỉnh: </td><td>" +
                    feature.properties.NAME_1 + ", Việt Nam" +
                    "<br></td></tr>" +
                    "<tr><td> Diện tích: </td><td>" +
                    feature.properties.Shape_Area + "km<sup>2"
                "</td></tr>";
                layer.bindPopup(popupContent1);
            },
            style: {
                fillColor: 'pink',
                fillOpacity: 0.8,

            }

        }).addTo(map);

        // Control
        var baseLayers = {
            'OSM': osm,
            'Google map': google3D,

        };
        var overlayers = {


            'CenTral': centrals,
            'North': norths,
            'South': souths,
            'TN': tns,

        }
        L.control.layers(baseLayers, overlayers).addTo(map);
        $(function() {
            $("#city_id").change(function() {
                let $this = $(this);
                let city_id = $this.val();
                console.log('----', city_id);

                $.ajax({
                        url: URL_LOAD_DISTRICT,
                        data: {
                            city_id: city_id
                        },
                    })
                    .done(function(data) {
                        if (data) {
                            let options = `<option value="0"> Chọn quận huyện </option>`;
                            data.map((item, index) => {
                                options += `<option value="${item.id}"> ${item.name}</option>`
                            })
                            $("#district_id").html(options);
                        }
                        console.log('---------- data: ', data);
                    });
            })

            $("#district_id").change(function() {
                let $this = $(this);
                let district_id = $this.val();
                console.log('----', district_id);

                $.ajax({
                        url: URL_LOAD_WARD,
                        data: {
                            district_id: district_id
                        },
                    })
                    .done(function(data) {
                        if (data) {
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
