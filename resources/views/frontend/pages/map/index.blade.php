@extends('frontend.layouts.app_master')
<title>@yield('title','Map')</title>
@push('css')
    <link href="/css/mini_apartment.css" rel="stylesheet">
    <style>
        /* Set map container size */
        #map {
            width: 100%;
            height: 500px;
            margin-bottom: 20px;
            position: relative;
        }
        button.vietmapgl-popup-close-button.mapboxgl-popup-close-button {
            display: none;
        }

    </style>

    <script src='https://maps.vietmap.vn/sdk/vietmap-gl/1.15.3/vietmap-gl.js'></script>
    <link href='https://maps.vietmap.vn/sdk/vietmap-gl/1.15.3/vietmap-gl.css' rel='stylesheet' />
@endpush

@section('content')
    <section class="breadcrumb">
        <ol>
            <li><a href="{{ route('get.home') }}">Trang chủ</a></li>
            <li><a href="{{ route('map.user.index') }}">Map</a></li>
        </ol>
    </section>
    <div id="searchBox">
        @include('frontend.pages.map.searchbar')
    </div>
    <div id="map"></div>
    <script>

        let userLocation = navigator.geolocation;
        if(userLocation) {
            userLocation.getCurrentPosition(initializeMap);
        } else {
            console.log('error')
        }

        function initializeMap(data) {
            {{--console.log('log', @json($long ?? null))--}}
            {{--console.log('lat', @json($lat ?? null))--}}
            {{--let lat;--}}
            {{--if (@json($lat)) {--}}
            {{--    lat = @json($lat)--}}
            {{--} else {--}}
            {{--    lat = data.coords.latitude;--}}
            {{--}--}}

            {{--let long--}}
            {{--if (@json($long)) {--}}
            {{--    long = @json($long)--}}
            {{--} else {--}}
            {{--    long = data.coords.longitude;--}}
            {{--}--}}

            var map = new vietmapgl.Map({
                container: "map",
                style: "https://maps.vietmap.vn/mt/tm/style.json?apikey={{ env('VIETMAP_API') }}",
                center: [105.74805163484348, 21.038255098347214],
                zoom: 10,
                maxZoom: 30
            });

            var rooms = (@json($rooms));
            let points = [];
            rooms.forEach(function (room) {
                points.push({ name: room.name, coordinates: [room.y, room.x],distance: room.distance ?? 0 })
            })
            points.push({name: 'Vị trí hiện tại', coordinates: [105.74805163484348, 21.038255098347214], current: true, distance: 0 })
            console.log(points)
            points.forEach(function (point) {
                let color = 'red';

                if (point.current) {
                    color = 'blue'
                }

                new vietmapgl.Marker({ color: color }) // Set marker color as needed
                    .setLngLat(point.coordinates)
                    .setPopup(new vietmapgl.Popup().setHTML('<p>' + point.name + '</p><p>Khoảng cách:' +point.distance+ 'KM</p>'))
                    .addTo(map);
            });
        }

        window.addEventListener('load', initializeMap);

        var map = new vietmapgl.Map({
            container: "map",
            style: "https://maps.vietmap.vn/mt/tm/style.json?apikey={{ env('VIETMAP_API') }}",
            center: [105.75832390388301, 21.085321418272123],
            zoom: 10,
            maxZoom: 30
        });
    </script>

@stop

@push('script')
    <script src="/js/mini_apartment.js"></script>
@endpush
