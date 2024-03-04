@extends('frontend.layouts.app_master')
@section('title', 'Tìm kiếm')
@push('css')
    <link href="/css/mini_apartment.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush

@section('content')
    @include('components.searchbar')
    <section class="breadcrumb">
        <ol>
            <li><a href="{{ route('get.home') }}">Trang chủ</a></li>
            <li><span>Tìm kiếm</span></li>
        </ol>
    </section>

    <div class="info">
        <h1>Kết quả tìm kiếm</h1>
    </div>


    <section class="grid post-category">
        <div class="wrapper">
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <div class="cpn-heading">Danh sách tin đăng</div>
                    </div>
                    <div class="card-body">
                        <div class="post-list">
                            @foreach($rooms ?? [] as $item)
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
    {{--    @include('components.whyus')--}}
    {{--    @include('components.support')--}}
@stop

@push('script')
    <script src="/js/mini_apartment.js"></script>
@endpush
