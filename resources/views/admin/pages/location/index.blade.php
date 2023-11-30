@extends('admin.layouts.master_admin')

@section('content')
    <div id="map"></div>
</body>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" ></script>    
    <script src="https://rubenholthuijsen.nl/geolet/geolet.js"></script>
     {{-- <script src="{{ asset('data/Central.js') }}"></script>
     <script src="{{ asset('data/North.js') }}"></script>
     <script src="{{ asset('data/South.js') }}"></script>
     <script src="{{ asset('data/TN.js') }}"></script> --}}
    
    <script>
        var map = L.map('map', {
            center: [21.8582952038295, 106.732825239514],
            zoom: 10,
            maxZoom: 30
        });
        
        var data1 = @json($abc);
        console.log(data1);

// Chon icon 
    var myIcon1 = new L.icon({
        iconUrl: 'https://cdn4.iconfinder.com/data/icons/basic-ui-pack-flat-s94-1/64/Basic_UI_Icon_Pack_-_Flat_map_pointer-512.png',
        iconSize: [30, 30],
        iconAnchor: [12, 12],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    // For de hien thi du lieu len ban do
    for (var i = 0; i < data1.length; i++) {
        marker = new L.marker([data1[i][0], data1[i][1]],data1[i][3], { icon: myIcon1 });  // DDieemr  ban len
        // $abc[$key][3] = floatval($room->description);
        // console.log($abc)
        marker.bindPopup(`
        them du lieu them tu day
        `).openPopup(); // popup hien thi
        marker.addTo(map);
    }
// Layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> '
        });
    osm.addTo(map);

    

	var google3D= L.tileLayer('http://mt0.google.com/vt/lyrs=p&hl=en&x={x}&y={y}&z={z}', {
             attribution: '&copy; <a href="https://www.google.com">Google map</a> contributors'
    });

    
    // var centrals = L.geoJSON(CentralJSON, {
    //     onEachFeature: function (feature, layer) {
    //         const popupContent1 =
               
    //             "<tr><td> Tỉnh: </td><td>" +
    //             feature.properties.NAME_1 + ", Việt Nam" +
    //             "<br></td></tr>" +
    //             "<tr><td> Diện tích: </td><td>" +
    //             feature.properties.Shape_Area + "km<sup>2"
    //             "</td></tr>";
    //         layer.bindPopup(popupContent1);
    //     },
    //     style:{
    //         fillColor: 'orange',
    //         fillOpacity:0.8,
            
    //     }
        
    // }).addTo(map);

    // var norths = L.geoJSON(NorthJSON,{
    //     onEachFeature: function (feature, layer) {
    //         const popupContent1 =
               
    //             "<tr><td> Tỉnh: </td><td>" +
    //             feature.properties.NAME_1 + ", Việt Nam" +
    //             "<br></td></tr>" +
    //             "<tr><td> Diện tích: </td><td>" +
    //             feature.properties.Shape_Area + "km<sup>2"
    //             "</td></tr>";
    //         layer.bindPopup(popupContent1);
    //     },
    //     style:{
    //         fillColor: 'green',
    //         fillOpacity:0.8,
            
    //     }
        
    // }).addTo(map);

    // var souths = L.geoJSON(SouthJSON,{
    //     onEachFeature: function (feature, layer) {
    //         const popupContent1 =
               
    //             "<tr><td> Tỉnh: </td><td>" +
    //             feature.properties.NAME_1 + ", Việt Nam" +
    //             "<br></td></tr>" +
    //             "<tr><td> Diện tích: </td><td>" +
    //             feature.properties.Shape_Area + "km<sup>2"
    //             "</td></tr>";
    //         layer.bindPopup(popupContent1);
    //     },
    //     style:{
    //         fillColor: 'red',
    //         fillOpacity:0.8,
            
    //     }
        
    // }).addTo(map);

    // var tns = L.geoJSON(TNJSON,{
    //     onEachFeature: function (feature, layer) {
    //         const popupContent1 =
               
    //             "<tr><td> Tỉnh: </td><td>" +
    //             feature.properties.NAME_1 + ", Việt Nam" +
    //             "<br></td></tr>" +
    //             "<tr><td> Diện tích: </td><td>" +
    //             feature.properties.Shape_Area + "km<sup>2"
    //             "</td></tr>";
    //         layer.bindPopup(popupContent1);
    //     },
    //     style:{
    //         fillColor: 'pink',
    //         fillOpacity:0.8,
            
    //     }
        
    // }).addTo(map);

    // Control
    var baseLayers = {
            'OSM': osm,
            'Google map': google3D,
            
          };
    var overlayers={
      
   
        
    }
    L.control.layers(baseLayers, overlayers).addTo(map);

    L.geolet({
				position: 'bottomleft'
			}).addTo(map);
    </script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    

</section>

@stop
