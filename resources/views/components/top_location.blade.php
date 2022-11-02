<section class="top-location">
    <div class="top-location__header">
        <h1 class="page-h1">Cho thuê phòng trọ, cho thuê nhà trọ, tìm phòng trọ</h1>
        <p class="page-description">Cho thuê phòng trọ, nhà trọ số 1 Việt Nam - Website đăng tin cho thuê phòng trọ, tìm
            phòng trọ nhanh, hiệu quả với hơn 70.000+ tin đăng và 2.000.000 lượt xem mõi tháng.</p>
    </div>
    <div class="top-location__body">
        <div class="body-title">
            Khu vực nổi bật
        </div>
        <div class="location-list">
            @foreach($locationsHot ?? [] as $item)
                <a class="location-item city-1" href="{{ route('get.room.by_location',['id' => $item->id, 'slug' => $item->slug]) }}" title="Cho thuê phòng trọ {{ $item->name }}">
                    <img src="{{ pare_url_file($item->avatar) }}" style="height: 110px;object-fit:cover" alt="">
                    <span class="location-cat">Phòng trọ <span class="location-name">{{ $item->name }}</span></span>
                </a>
            @endforeach
        </div>
    </div>
</section>
