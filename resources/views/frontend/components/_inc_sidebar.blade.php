<div class="card b-list-cate">
    <div class="card-header">
        <div class="cpn-heading">Danh mục</div>
    </div>
    <div class="card-body list-cate">
        <ul>
            @foreach($categoriesGlobalSidebar ?? [] as $item)
                <li>
                    <a href="{{ route('get.category.item',['slug' => $item->slug,'id' => $item->id]) }}"
                       title="{{ $item->name }}">{{ $item->name }} <span class="count">({{ $item->room_count }})</span></a>
                </li>
            @endforeach
{{--            <li class="sub">--}}
{{--                <a href="#" title=""><i class="la la-angle-right" aria-hidden="true"></i>Cho thuê căn hộ mini</a>--}}
{{--            </li>--}}
{{--            <li class="sub">--}}
{{--                <a href="#" title=""><i class="la la-angle-right" aria-hidden="true"></i>Cho thuê căn hộ dịch vụ</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" title="">Cho thuê mặt bằng <span class="count">(2.127)</span></a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
<div class="card b-list-article">
    <div class="card-header">
        <div class="cpn-heading">Bài viết mới</div>
    </div>
    <div class="card-body">
        <div class="list-article">
            @foreach($articlesNew ?? [] as $item)
                <div class="article-item">
                    <a href="{{ route('get.room.blog_detail',['id' => $item->id,'slug' => $item->slug]) }}">
                        <div class="article-image">
                            <img src="{{ pare_url_file($item->avatar) }}" alt="{{ $item->name }}">
                        </div>
                        <div class="article-info">
                            <h4 class="article-title">{{ $item->name }}</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
