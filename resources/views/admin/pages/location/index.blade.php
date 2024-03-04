@extends('admin.layouts.master_admin')

<link href="/css/mini_apartment.css" rel="stylesheet">
<style>
    /* Set map container size */
    #map {
        width: 100%;
        height: 500px;
        margin-bottom: 20px;
    }

    #searchbar {
        margin: 0;
    }

    .custom-popup {
        background-color: white;
        border-radius: 4px;
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
        padding: 10px;
        font-size: 14px;
    }

    /* Style for the popup's title */
    .popup-title {
        font-weight: bold;
        margin-bottom: 5px;
        color: red
    }

    .mapboxgl-popup-close-button {
        display: none !important;
    }

</style>

<script src='https://maps.vietmap.vn/sdk/vietmap-gl/1.15.3/vietmap-gl.js'></script>
<link href='https://maps.vietmap.vn/sdk/vietmap-gl/1.15.3/vietmap-gl.css' rel='stylesheet' />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



@section('content')
    <div>
        @include('admin.pages.location.search')
    </div>
    <div id="map"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>

        let userLocation = navigator.geolocation;
        if(userLocation) {
            userLocation.getCurrentPosition(initializeMap);
        } else {
            console.log('error')
        }

        function initializeMap(data) {
            let lat = data.coords.latitude;
            let long = data.coords.longitude;
            var map = new vietmapgl.Map({
                container: "map",
                style: "https://maps.vietmap.vn/mt/tm/style.json?apikey={{ env('VIETMAP_API') }}",
                center: [105.74805163484348, 21.038255098347214],
                zoom: 10,
                maxZoom: 30
            });

            var rooms = @json($showMap);

            let points = [];
            rooms.forEach(function (room) {
                points.push({name: room.name, coordinates: [room.y, room.x], category: room.category_id, id: room.id, category_name: room.category_name})
            })

            points.push({name: 'Vị trí hiện tại', coordinates: [105.73875018200059, 21.040534166339537], current: true, category_name: '' })

            points.forEach(function (point) {
                let color = '';

                if (point.current) {
                    color = 'yellow'
                }

                if (point.category == 1) {
                    color = 'red'
                } else if (point.category == 2) {
                    color = 'blue'
                }
                // Assuming this code is within a Blade template

                var roomDetailURL = "{{ route('room-admin.detail', ['id' => ':pointId']) }}";
                roomDetailURL = roomDetailURL.replace(':pointId', point.id);

                var popupContent = '<h6>' + point.name + '</h6> <p>' + point.category_name + '</p> <a href="' + roomDetailURL + '">Xem thêm....</a>';

                new vietmapgl.Marker({color: color}) // Set marker color as needed
                    .setLngLat(point.coordinates)
                    .setPopup(new vietmapgl.Popup().setHTML(popupContent))
                    .addTo(map);
            });

        }

        window.addEventListener('load', initializeMap);

        var URL_LOAD_DISTRICT = '{{ route("get_user.load.district") }}'
        var URL_LOAD_WARD = '{{ route("get_user.load.wards") }}'

        var expanded = false;

        function showCheckboxes() {
            var checkboxes = document.getElementById("checkboxes");
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        }

        $(function () {
            $("#city_id").change(function () {
                let $this = $(this);
                let city_id = $this.val();
                console.log('----', city_id);

                $.ajax({
                    url: URL_LOAD_DISTRICT,
                    data: {
                        city_id: city_id
                    },
                })
                    .done(function (data) {
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

            $("#district_id").change(function () {
                let $this = $(this);
                let district_id = $this.val();
                console.log('----', district_id);

                $.ajax({
                    url: URL_LOAD_WARD,
                    data: {
                        district_id: district_id
                    },
                })
                    .done(function (data) {
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
@stop
