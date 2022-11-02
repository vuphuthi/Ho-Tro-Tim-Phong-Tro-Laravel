@extends('frontend.layouts.app_master')
@section('title', 'Trang chủ')
@push('css')
    <link href="/css/home.css" rel="stylesheet">
@endpush

@section('content')
    @include('components.searchbar')
    @include('components.top_location',['locationsHot' => $locationsHot ?? []])
    @include('frontend.pages.home.include._inc_room_hot',['roomHots' => $roomHots ?? []])
    <section class="grid post-category">
        <div class="wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <div class="cpn-heading">Tin đăng mới nhất</div>
                    </div>
                    <div class="card-body">
                        <div class="post-list">
                           @foreach($roomNew ?? [] as $item)
                                @include('components.room._inc_item',['item' => $item])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar sidebar-right">
                @include('frontend.components._inc_sidebar')
            </div>
        </div>
    </section>
    @include('components.link_footer')
    @include('components.whyus')
    @include('components.support')
@stop

@push('script')
    <script src="/js/home.js"></script>
@endpush
