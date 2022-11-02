<section class="popular-posts">
    <div class="section-title">Tin nổi bật</div>
    <div class="posts-listing style-gird">
        @foreach($roomHots ?? [] as $item)
            <div class="col-item">
                <div class="col-item__image">
                    <a href="{{ route('get.room.detail',['id' => $item->id,'slug' => $item->slug]) }}" class="a-img">
                        <img src="{{ pare_url_file($item->avatar) }}" alt="{{ $item->name }}">
{{--                        <span class="images-number">5 ảnh</span>--}}
{{--                        <span class="chothuenhanh-label"></span>--}}
                        <span class="post-save js-btn-save">
                        <i></i>
                    </span>
                    </a>
                </div>
                <div class="col-item__info">
                    <div class="post-title">
                        @if ($item->service_hot > 0)
                            @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                                <span class="star"></span>
                            @endfor
                        @endif
                        <a href="{{ route('get.room.detail',['id' => $item->id,'slug' => $item->slug]) }}">{{ $item->name }}</a>
                    </div>
                    <div class="post-price">{{ number_format($item->price,0,',','.') }} đ</div>
                    <div class="post-acreage fz-13">{{ $item->area }}m²</div>
                    <div class="post-location fz-13">
                        <a href="{{ route('get.room.detail',['id' => $item->id,'slug' => $item->slug]) }}" title="{{ $item->full_address }}">{{ $item->full_address }}</a>
                    </div>
                    <time class="post-time fz-13">Cập nhật: {{ $item->updated_at }}</time>
                    <span class="post-hot"></span>
                </div>
            </div>
        @endforeach
    </div>
</section>
