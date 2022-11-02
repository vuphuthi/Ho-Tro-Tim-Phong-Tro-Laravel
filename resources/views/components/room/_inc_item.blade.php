<div class="post-item bd-red">
    <div class="post-item__image">
        <a href="{{ route('get.room.detail',['id' => $item->id,'slug' => $item->slug]) }}" class="a-img">
            <img src="{{ pare_url_file($item->avatar) }}" alt="{{ $item->name }}">
            {{--                                            <span class="images-number">5 ảnh</span>--}}
            <span class="post-save js-btn-save">
                <i></i>
            </span>
        </a>
    </div>
    <div class="post-item__info">
        <div class="post-title">
            @if ($item->service_hot > 0)
                @for($i = 1 ; $i <= $item->service_hot ; $i ++)
                    <span class="star"></span>
                @endfor
            @endif
            <a href="{{ route('get.room.detail',['id' => $item->id,'slug' => $item->slug]) }}" title="{{ $item->name }}">{{ $item->name }}</a>
        </div>
        <div class="meta-salry-time">
            <div class="post-price">{{ number_format($item->price,0,',','.') }} đ
            </div>
            <div class="post-time fz-13">Cập nhật: {{ $item->updated_at }}</div>
        </div>
        <div class="meta-acreage-location">
            <span class="post-acreage fz-13">{{ $item->area }}m²</span>
            <span class="post-location">
                <a href="#" title="{{ $item->full_address }}">{{ $item->full_address }}</a>
            </span>
        </div>
        {{--                                        <span class="post-hot"></span>--}}
        <p class="post-summary">
            {{ $item->description }}
        </p>
    </div>
</div>
