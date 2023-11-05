@extends('frontend.layouts.app_master')
@section('title', 'Chi tiết')
@push('css')
{{--    <link href="/css/mini_apartment.css" rel="stylesheet">--}}
    <link href="/css/apartment_detail.css" rel="stylesheet">
@endpush

@section('content')
    <section class="post-category content-detail">
        <div class="content">
            <div class="card b-slide">
                <div class="card-body card-slide">
                    <div class="prev-next">
                        <div class="owl-style-buttons" id="js-owl-feature-job-button"></div>
                    </div>
                    <div class="slides">
                        <div class="carousel-handle">
                            <div class="carousel-handle__list-item" id="carousel-slide">
                                <div class="owl-carousel owl-theme">
                                    @foreach($images as $item)
                                        <div class="slide-item">
                                            <img src="{{ pare_url_file($item->path)  }}" alt="" title="" class="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="chothuenhanh-label"></span>
                    <span class="post-hot"></span>
                    <span class="post-save js-btn-save"><i></i></span>
                </div>
            </div>
            <div class="card b-base-info">
                @if ($room->status == 2)
                    <style>
                        .alert-warning {
                            color: #856404;
                            background-color: #fff3cd;
                            border-color: #ffeeba;
                        }
                    </style>
                    <div class="alert alert-warning" role="alert">
                        <p>Tin đăng đã hết hạn, xin vui lòng liên hệ Admin để giải quyết, hoạc click
                            <a href="{{ route('get_user.room.pay', $room->id) }}" target="_blank" title="Gia hạn tin">tại đây</a> để gia hạn !</p>
                    </div>
                @endif
                <div class="card-body breadcrumb">
                    <ol>
                        @if (isset($room->category->name))
                        <li>
                            <a href="{{ route('get.category.item',['slug' => $room->category->slug,'id' => $room->category_id]) }}" title="{{ $room->category->name }}"><span>{{ $room->category->name }}</span></a>
                        </li>
                        @endif
                        @if (isset($room->city->name))
                            <li>
                                <a href="{{ route('get.room.by_location',['id' => $room->city_id, 'slug' => $room->city->slug]) }}" title="{{ $room->city->name }}"><span>{{ $room->city->name }}</span></a>
                            </li>
                        @endif
                        <li><span>{{ $room->name }}</span></li>
                    </ol>
                </div>
                <div class="post-name">
                <span class="star-review">
                    @for($i = 1 ; $i <= $room->service_hot ; $i ++)
                        <span class="fa fa-star checked"></span>
                    @endfor
                </span>
                    <h1>{{ $room->name }}</h1>
                </div>
                @if (isset($room->category->name))
                    <div class="post-cate">
                        Chuyên mục: <a href="{{ route('get.category.item',['slug' => $room->category->slug,'id' => $room->category_id]) }}"> {{ $room->category->name ?? "" }}</a>
                    </div>
                @endif
                <div class="post-address">Địa chỉ: {{ $room->full_address }}</div>

                <div class="post-price">
                    <span class="price">
                        <span class="mb-price">Giá cho thuê</span> <i></i> {{ number_format($room->price,0,',','.') }} đ
                    </span>
                        <span class="acreage">
                        <span class="mb-price">Diện tích</span> <i></i>{{ $room->area }}m<sup>2</sup>
                    </span>
                        <span class="acreage mb-price">
                        <span>Mã tin</span> {{ $room->id }}
                    </span>
                        <span class="acreage mb-price">
                        <span>Ngày cập nhật</span> {{ $room->updated_at }}
                    </span>
                        <span class="acreage mb-price">
                        <span>Ngày hết hạn</span> {{ $room->time_stop }}
                    </span>
                </div>
            </div>
            <div class="card b-description">
                <div class="card-header">
                    <div class="cpn-heading">Thông tin mô tả</div>
                </div>
                <div class="card-body">
                    <div class="content-description">
                        {!! $room->description !!}
                    </div>
                </div>
            </div>
            <div class="card b-feature">
                <div class="card-header">
                    <div class="cpn-heading">Đặc điểm tin đăng</div>
                </div>
                <div class="card-body">
                    <table class="table-detail">
                        <tbody>
                        <tr>
                            <td class="name">Mã tin:</td>
                            <td>#{{ $room->id }}</td>
                        </tr>
                        @if (isset($room->city->name))
                            <tr>
                                <td class="name">Khu vực</td>
                                <td>
                                    @if (isset($room->wards->name))
                                        <span>{{ $room->wards->name ?? "" }} - </span>
                                    @endif
                                    @if (isset($room->district->name))
                                        <span>{{ $room->district->name ?? "" }} - </span>
                                    @endif
                                    <a href="{{ route('get.room.by_location',['id' => $room->city_id, 'slug' => $room->city->slug]) }}" title="">{{ $room->city->name }}</a>
                                </td>
                            </tr>
                        @endif
                        @if (isset($room->category->name))
                            <tr>
                                <td class="name">Loại tin rao:</td>
                                <td><a href="{{ route('get.category.item',['slug' => $room->category->slug,'id' => $room->category_id]) }}">{{ $room->category->name }}</a></td>
                            </tr>
                        @endif
                        <tr>
                            <td class="name">Đối tượng thuê:</td>
                            <td>Tất cả</td>
                        </tr>
                        <tr>
                            <td class="name">Gói tin:</td>
                            <td><span class="cl-red">{{ $room->service_hot }}</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card b-contact">
                <div class="card-header">
                    <div class="cpn-heading">Thông tin liên hệ</div>
                </div>
                <div class="card-body">
                    <table class="table-detail">
                        <tbody>
                        <tr>
                            <td class="name">Liên hệ:</td>
                            <td>{{ $author->name ?? '...' }}</td>
                        </tr>
                        <tr>
                            <td class="name">Điện thoại:</td>
                            <td>{{ $author->phone ?? '...' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card b-map">
                <div class="card-header">
                    <div class="cpn-heading">Bản đồ</div>
                </div>
                <div class="card-body">
                    <p class="map-address">Địa chỉ: {{ $room->full_address }}</p>
                    <div class="map">
                        {!! $room->map !!}
                    </div>
                    <p class="map-description">Mọi thông tin trên website chỉ mang tính chất tham khảo. Nếu bạn có phản hồi với tin đăng này (báo xấu, tin đã cho thuê, không liên lạc được,...), vui lòng thông báo để PhòngTrọ123 có thể xử lý.</p>
                    <a class="btn btn-report" target="_blank" rel="nofollow" href="/contact">
                        <i class="fa fa-flag" aria-hidden="true"></i> Gửi phản hồi
                    </a>
                </div>
            </div>
            <div class="card b-related">
                <div class="card-header">
                    <div class="cpn-heading">Có thể bạn quan tâm</div>
                </div>
                <div class="card-body">
                    <div class="post-list">
                        @foreach($roomsSuggests ?? [] as $item)
                            @include('components.room._inc_item',['item' => $item])
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="post-bottom-bar">
                <a class="item call" rel="nofollow" href="tel:0931039069"><i class="fa fa-phone" aria-hidden="true"></i> 0931039069</a>
                <a class="item zalo" rel="nofollow" href="https://zalo.me/0931039069">Zalo</a>
                <a class="item sms" rel="nofollow" href="sms:0931039069">Nhắn tin</a>
            </div>
        </div>
        <div class="sidebar sidebar-right">
            <div class="card b-author">
                <div class="card-body author">
                    <div class="author-aside">
                        <div class="author-avatar">
                            <img src="{{ url('images/default-user.png') }}">
                        </div>
                        <div class="author-info">
                            <span class="author-name">{{ $author->name ?? '' }}</span>
                            <a class="btn btn-phone" rel="nofollow" href="tel:{{ $author->phone ?? '' }}">
                                <i class="fa fa-phone" aria-hidden="true"></i> {{ $author->phone ?? '' }}
                            </a>
                            <a class="btn btn-zalo" target="_blank" rel="nofollow" href="https://zalo.me/{{ $author->phone ?? '' }}">
                                Nhắn Zalo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.components._inc_sidebar')
        </div>
    </section>

    @include('components.link_footer')
@stop

@push('script')
{{--    <script src="/js/mini_apartment.js"></script>--}}
    <script src="/js/apartment_detail.js"></script>
@endpush
