@extends('layouts.homeRest')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
.filter-content label {
  display: block; /* Make labels stack vertically */
}

.filter-box {
  width: 300px; /* Adjust as needed */
  max-height: 400px; /* Limit overall height */
  overflow-y: auto; /* Enable scrollbar for overall container if needed */
  background-color: #f6f4f4c4;
}

.filterbox {

  overflow-y: auto; /* Enable scrollbar for overall container if needed */
  background-color: #f6f4f4c4;
  ;
}


.filter-header {
  cursor: pointer;
  background-color: #f6f4f4c4;
  padding: 10px;
  margin: 1px;
  text-align: left; /* Left align the heading */
  font-size: smaller;
}

.filter-content {
  display: none; /* Hidden by default */
  max-height: 150px; /* Set maximum height for individual scroll */
  overflow-y: auto; /* Enable vertical scrollbar for individual filter */
  padding: 4px;
  border: 1px solid #ddd; /* Optional border */
  background-color: #f7f2f2c7;
}

.filter-content label {
  display: block; /* Make labels stack vertically */
  text-align: left; /* Left align the label */
  margin-left: 0; /* Reset any margin if needed */
  margin-bottom: 0.1rem;
  font-size: x-small;
}

.filter-section {
  border: 1px solid #ddd; /* Add border around each filter section */
  border-radius: 4px; /* Optional: add rounded corners */
  transition: box-shadow 0.3s ease; /* Smooth transition for the glow effect */
}

.filter-section:hover {
  box-shadow: 0 0 10px rgba(0, 150, 255, 0.8); /* Blue glow on hover */
}


.my-legend .legend-title {
    text-align: left;
    margin-bottom: 5px;
    font-weight: bold;
    font-size: 90%;
    }
  .my-legend .legend-scale ul {
    margin: 0;
    margin-bottom: 5px;
    padding: 0;
    float: left;
    list-style: none;
    }
  .my-legend .legend-scale ul li {
    font-size: 80%;
    list-style: none;
    margin-left: 0;
    line-height: 18px;
    margin-bottom: 2px;
    }
  .my-legend ul.legend-labels li span {
    display: block;
    float: left;
    height: 16px;
    width: 30px;
    margin-right: 5px;
    margin-left: 0;
    border: 1px solid #999;
    }
    .filter-content label>span{
        display: inline-block;
    float: none;
    height: 14px;
    width: 14px;
    margin-right: 0px;
    margin-left: 3px;
    border: 1px solid #999;
    position: relative;
    z-index: 1; 
    }
  .my-legend .legend-source {
    font-size: 70%;
    color: #999;
    clear: both;
    }
  .my-legend a {
    color: #777;
    }

</style>


@endpush
@section('content')
 <!--Maps-->
 <section id="about" class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col">

          <!--Info header-->
          <div class="info-header mb-5">
            <h1 class="text-primary pb-3">
              MINES AND MINERALS MAP GILGIT BALTISTAN
            </h1>
            <p class="lead ">
              The Mines and Minerals Map Gilgit Baltistan is a comprehensive map of the area's mineral resources,
               including the study areas, applied areas, exploration sites, mining facilities, and reserved areas.
            </p>
          </div>
          {{-- MAP GOES HERE --}}

            <div class="container mt-3 position-relative">
                            <div id="map" style="height: 450px;"></div>

                     <div class=" row position-absolute top-0 end-0 p-3" style="z-index: 1000;">
                           
                        <div class="filterBox" style="width: 50vh;margin-top: -7%; display:flex; align-items: center;
                                    justify-content: center; ">
                    <div class="filter-box";>
                            <h5>Legends</h5>

                            <!-- Lease Type Filter -->
                            <div class="filter-section">
                                <h6 class="filter-header"> Type Of Lease</h6>
                                <div class="filter-content leasetypes">
                               
                                <label><input type="checkbox" id="lease-select-all" checked> Select All</label>
                                <label><input type="checkbox"  id="mining" checked><span style='background:#8DD3C7;'></span> Mining </label>
                                <label><input type="checkbox"  id="exploration" checked><span style='background:#FFFFB3;'></span> Exploration</label>
                                <label><input type="checkbox"   id="applied" checked><span style='background:#ffc107;'></span> Applied</label>
                                <label><input type="checkbox"  id="study" checked><span style='background:#FB8072;'></span> Study Area</label>
                                </div>
                            </div>
                            @php
                                // Generate a list of random colors
                                function getRandomColor() {
                                    $colors = [
    '#FF5733', '#33FF57', '#3357FF', '#F0FF33', '#FF33F0', '#33FFF0', '#F033FF', '#FF8C33', '#33FF8C', '#8C33FF',
    '#FF3333', '#33FF33', '#3333FF', '#FF33A1', '#33FFA1', '#FF8C8C', '#8CFF8C', '#8C8CFF', '#FFC300', '#33D1FF',
    '#DFFF33', '#FF33DF', '#33FFDF', '#D8FF33', '#FF335E', '#335EFF', '#D1FF33', '#FF33D1', '#33FF6E', '#6E33FF',
    '#FFB233', '#33FFB2', '#B233FF', '#33B2FF'
];
                                    return $colors[array_rand($colors)];
                                }
                            @endphp
                            <!-- Mineral Type Filter -->
                            <div class="filter-section">
                                <h6 class="filter-header">Mineral Type</h6>
                                <div class="filter-content minerals">
                                <label><input type="checkbox" id="mineral-select-all" checked> Select All</label>

                                                    @foreach($minerals as $mineral)
                                <label>
                                    <input type="checkbox" class="mineral-checkbox" id="{{ $mineral->category_id }}" data-mineral="{{ $mineral->category_name }}" checked>
                                    <span style="background-color: {{ getRandomColor() }};"></span>{{ $mineral->category_name }}
                                </label>
                            @endforeach
                                </div>
                            </div>

                            <!-- Status Filter -->
                            <div class="filter-section">
                                <h6 class="filter-header">Scale</h6>
                                <div class="filter-content">
                                <label><input type="checkbox" id="status-select-all" checked> Select All</label>

                                <label><input type="checkbox" checked><span style='background:#8DD3C7;'></span> Medium</label>
                                <label><input type="checkbox" checked><span style='background:#33FFB2;'></span> Small</label>
                                <label><input type="checkbox" checked> <span style='background:#D1FF33;'></span>Large</label>
                                </div>
                            </div>

                        </div>

                        </div>

                        

                    </div>
                            
               
                                </div>


                        <!-- /.card-body -->
                        </div>
                                
                            
                            
             </div>


        </div>


<!-- Leaflet Map -->
<!-- <div id="map" style="height: 600px;"></div> -->


         
          {{-- END MAP --}}
        </div>
      </div>
    </div>
  </section>



@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
crossorigin="anonymous"></script>

<script>
// Get the current year for the copyright
$('#year').text(new Date().getFullYear());

//Initialize scrollspy
$('body').scrollspy({target: '#main-nav'});

//Smooth scrolling
$("#main-nav a").on('click', function(event) {
  if(this.hash !== "") {
    event.preventDefault();

    const hash = this.hash;

    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 800, function() {
      window.location.hash = hash;
    });
  }
});
</script>

<!-- /////////// Maps Scripts -------------------/////////////      -->
<script type="text/javascript">
    //alert("shdkashj");
    //Initialize the map

    const Allpolygons = []; /// an array to hold all polygons data
      // Define the map bounds for Gilgit-Baltistan
      var bounds = [
        [34.0, 73.0],  // South-West corner (latitude, longitude)
        [38.5, 78.5]   // North-East corner (latitude, longitude)
    ];

    //var map = L.map('map').setView([36, 75.35], 7); // [up/down][right/left]
    // Initialize the map
    var map = L.map('map', {
        maxBounds: bounds,
        maxBoundsVisble: true, // Ensures the bounds are visible
        worldCopyJump: true // Ensures seamless panning across the world
    }).setView([36, 75.35], 7); 
  

    let allDistrictsLayer = L.layerGroup();
    let allMineralsLayer = L.layerGroup();
    // Step 2: Initialize the Geocoder
    // const geocoder = L.Control.geocoder({
    //         defaultMarkGeocode: true
    //     }).addTo(map);
    //       // Optional: Handle geocode results
    //       geocoder.on('markgeocode', function(e) {
    //                   const latLng = e.geocode.center;
    //                   L.marker(latLng).addTo(map).bindPopup(e.geocode.name).openPopup();
    //                   map.setView(latLng, 15);
    //               });
              // Function to add polygons to the map
              function addPolygons() {
                

                        // // Add a tile layer (you can choose your preferred tiles)
                        //https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png

                            // Define tile layers
                        const topoLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
                            maxZoom: 20,
                            minZoom: 07,
                        
                        });

                        const  streetsLayer= L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                            maxZoom: 19,
                            minZoom: 07,
                        });
                        //

                        // Add initial tile layer
                        topoLayer.addTo(map);
                    ///////////////////////// To Change the Layers of the Map based on the current zoom level//////
                    //////////////////////////////////////////////////////////////////////////////////////////////
                        // Change tile layer based on zoom level
                        map.on('zoomend', function() {
                            const currentZoom = map.getZoom();
                            //console.log('Current zoom level: ' + currentZoom );
                            if (currentZoom >11) {
                                if (map.hasLayer(topoLayer)) {
                                    map.removeLayer(topoLayer);
                                }
                                if (!map.hasLayer(streetsLayer)) {
                                    streetsLayer.addTo(map);
                                }
                            } else {
                                if (map.hasLayer(streetsLayer)) {
                                    map.removeLayer(streetsLayer);
                                }
                                if (!map.hasLayer(topoLayer)) {
                                    topoLayer.addTo(map);
                                }
                            }
                        });
                    /////////////////////////End To Change the Layers of the Map based on the current zoom level//////
                    //////////////////////////////////////////////////////////////////////////////////////////////

                        //Parse WKT data from your PHP variables
                        //var dis = ;
                        var districts = @json($districts);
                        var studyAreas = @json($studyAreas);
                        var companyPolygons = @json($companyPolygons);
                        // This function displays the boundary line for each district of Gilgit Baltistan
                            districts.forEach(area => {
                                area.forEach(polygonData => {
                                    // Extract coordinates from the WKT format
                                    const coords = polygonData.geo.match(/(\d+\.\d+ \d+\.\d+)/g).map(coord => {
                                        const [lng, lat] = coord.split(' ');
                                        return [parseFloat(lat), parseFloat(lng)]; // Leaflet uses [lat, lng]
                                    });

                                    // Create a polygon
                                    const polygon = L.polygon(coords, {
                                        color: '#778899', // Customize your polygon color
                                        fillOpacity: 0.2,
                                        weight: 2, 
                                    }).addTo(map);
                                    polygon.addTo(allDistrictsLayer); /// add to districts layer
                                    // Bind a popup with the polygon ID
                                    // polygon.bindPopup(polygonData.polygonid);
                                });
                            });



                        if (document.getElementById('study').checked) {

                            // Step 3: Loop through the polygons and add to the map
                        studyAreas.forEach(area => {
                            area.forEach(polygonData => {
                                // Extract coordinates from the WKT format
                                const coordsstudyArea = polygonData.geo.match(/(\d+\.\d+ \d+\.\d+)/g).map(coord => {
                                    const [lng, lat] = coord.split(' ');
                                    return [parseFloat(lat), parseFloat(lng)]; // Leaflet uses [lat, lng]
                                });

                                // Create a polygon
                                const polygon = L.polygon(coordsstudyArea, {
                                    color: '#FB8072', // Customize your polygon color
                                    fillOpacity: 0.8,
                                }).addTo(map);

                                Allpolygons.push({polygonData, mineral: polygonData.mineral});    
                                // Convert coordinates to [lng, lat] format for Turf.js
                                const turfCoords = coordsstudyArea.map(coord => [coord[1], coord[0]]);
                                const turfPolygon = turf.polygon([turfCoords]);

                                // Calculate area in square meters
                                const areaInSquareMeters = turf.area(turfPolygon);

                                // Format area for display (e.g., convert to sqkms)
                                const areaInSqkms = areaInSquareMeters / 1000000; // Convert to hectares if needed

                                // Bind a popup with the polygon ID and area study_area_district as district, study_area_village as village, mineral_name as mineral
                                
                                    polygon.bindPopup(`
                                    <div style="font-family: Arial, sans-serif; color: #333; max-width: 350px;">
                                    
                                        <table style="width: 100%; border-collapse: collapse; margin-top: 5px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-mountain"></i> Name :</td>
                                                    <td style="padding: 4px; color: #555;">${polygonData.polygonid}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-gem"></i> Mineral :</td>
                                                    <td style="padding: 4px; color: #555;">${polygonData.mineral}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-ruler-combined"></i> Area:</td>
                                                    <td style="padding: 4px; color: #555;">${areaInSqkms.toFixed(2)} sqkms</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-map-marker-alt"></i> District:</td>
                                                    <td style="padding: 4px; color: #555;">${polygonData.district}</td>
                                                </tr>
                                            
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-map-marker-alt"></i> Village:</td>
                                                    <td style="padding: 4px; color: #555;">${polygonData.village}</td>
                                                </tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                `);

                                polygon.addTo(allMineralsLayer); /// add to minerals layer
                            });
                            });
                        // L.geoJSON(studyAreas, { style: { color: 'yellow' } }).addTo(map);
                        }
                // `company_name`, `mineral_name`, `description`, `district`, `status`, `granted_date`, `coordinates`, `contact`, `address`, `area`, `scale`, `tanure`
                
                        if (document.getElementById('applied').checked) {
                            companyPolygons.forEach(area => {
                            area.forEach(polygonData => {
                                // Extract coordinates from the WKT format
                                console.log(polygonData);
                                if(polygonData.grantstatus == "APPLIED"){
                                    const coordsApplied = polygonData.geo.match(/(\d+\.\d+ \d+\.\d+)/g).map(coord => {
                                    const [lng, lat] = coord.split(' ');
                                    return [parseFloat(lat), parseFloat(lng)]; // Leaflet uses [lat, lng]
                                });

                                // Create a polygon
                                const polygon = L.polygon(coordsApplied, {
                                    color: '#ffc107', // Customize your polygon color
                                    fillOpacity: 0.9,
                                }).addTo(map);
                            
                                Allpolygons.push({polygonData, mineral: polygonData.mineral}); 
                                
                                    // Convert coordinates to [lng, lat] format for Turf.js
                                const turfCoordsApplied = coordsApplied.map(coord => [coord[1], coord[0]]);
                                const turfPolygonApplied = turf.polygon([turfCoordsApplied]);

                                // Calculate area in square meters
                                const areaInSquareMetersApplied = turf.area(turfPolygonApplied);

                                // Format area for display (e.g., convert to sqkms)
                                const areaInSqkmsApplied = areaInSquareMetersApplied / 1000000; // Convert to hectares if needed
                                // `company_name`, `mineral_name`, `description`, `district`, `status`, `granted_date`, `coordinates`, `contact`, `address`, `area`, `scale`, `tanure`
                                //
                                // Bind a popup with the polygon ID and area
                                polygon.bindPopup(`
                                    <div style="font-family: Arial, sans-serif; color: #333; max-width: 350px;">
                                    
                                        <table style="width: 100%; border-collapse: collapse; margin-top: 5px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-gem"></i> Mineral :</td>
                                                    <td style="padding: 4px; color: #555;">${polygonData.mineral}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-ruler-combined"></i> Area:</td>
                                                    <td style="padding: 4px; color: #555;">${areaInSqkmsApplied.toFixed(2)} sqkms</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-building"></i> Company:</td>
                                                    <td style="padding: 4px; color: #555;">${polygonData.company_name}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-info-circle"></i> Status:</td>
                                                    <td style="padding: 4px; color: #555;">
                                                        <span style="color: ${polygonData.status === 'Active' ? 'green' : 'red'}; font-weight: bold;">
                                                            ${polygonData.status}
                                                        </span>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-calendar-alt"></i> Applied On:</td>
                                                    <td style="padding: 4px; color: #555;">${new Date(polygonData.granted_date).toLocaleDateString()}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-map-marker-alt"></i> District:</td>
                                                    <td style="padding: 4px; color: #555;">${polygonData.district}</td>
                                                </tr>
                                                ${polygonData.granted_date && !isNaN(new Date(polygonData.granted_date).getTime()) ?`
                                                <tr>
                                                    <td style="padding: 8px; font-weight: bold;"><i class="fa fa-calendar-alt"></i> Tenure:</td>
                                                    <td style="padding: 8px; color: #555;">${new Date(polygonData.granted_date).toLocaleDateString()}</td>
                                                </tr>` : ''}
                                            </tbody>
                                        </table>
                                    </div>
                                `);

                                polygon.addTo(allMineralsLayer);// add to minerals layer      
                                }
                            
                            });
                        });
                    }
                        if (document.getElementById('exploration').checked) {
                            companyPolygons.forEach(area => {
                            area.forEach(polygonData => {
                                // Extract coordinates from the WKT format
                                //console.log(polygonData.grantstatus);
                                if(polygonData.grantstatus == "EXPLORATION"){
                                    const coordsExploration = polygonData.geo.match(/(\d+\.\d+ \d+\.\d+)/g).map(coord => {
                                    const [lng, lat] = coord.split(' ');
                                    return [parseFloat(lat), parseFloat(lng)]; // Leaflet uses [lat, lng]
                                });

                                // Create a polygon
                                const polygon = L.polygon(coordsExploration, {
                                    color: '#FFFFB3', // Customize your polygon color
                                    fillOpacity: 0.7,
                                }).addTo(map);

                                Allpolygons.push({polygonData, mineral: polygonData.mineral}); 
                                    // Convert coordinates to [lng, lat] format for Turf.js
                                    const turfcoordsExploration = coordsExploration.map(coord => [coord[1], coord[0]]);
                                const turfPolygonExploration = turf.polygon([turfcoordsExploration]);

                                // Calculate area in square meters
                                const areaInSquareMetersExploration = turf.area(turfPolygonExploration);

                                // Format area for display (e.g., convert to sqkms)
                                const areaInSqkmsExploration = areaInSquareMetersExploration / 1000000; // Convert to hectares if needed
                                // `company_name`, `mineral_name`, `description`, `district`, `status`, `granted_date`, `coordinates`, `contact`, `address`, `area`, `scale`, `tanure`
                                //
                                // Bind a popup with the polygon ID and area
                                polygon.bindPopup(`
                                    <div style="font-family: Arial, sans-serif; color: #333; max-width: 350px;">
                                    
                                        <table style="width: 100%; border-collapse: collapse; margin-top: 5px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-gem"></i> Mineral :</td>
                                                    <td style="padding: 4px; color: #555;">${polygonData.mineral}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-ruler-combined"></i> Area:</td>
                                                    <td style="padding: 4px; color: #555;">${areaInSqkmsExploration.toFixed(2)} sqkms</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-building"></i> Company:</td>
                                                    <td style="padding: 4px; color: #555;">${polygonData.company_name}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-info-circle"></i> Status:</td>
                                                    <td style="padding: 4px; color: #555;">
                                                        <span style="color: ${polygonData.status === 'Active' ? 'green' : 'red'}; font-weight: bold;">
                                                            ${polygonData.status}
                                                        </span>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-calendar-alt"></i> Applied On:</td>
                                                    <td style="padding: 4px; color: #555;">${new Date(polygonData.granted_date).toLocaleDateString()}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 4px; font-weight: bold;"><i class="fa fa-map-marker-alt"></i> District:</td>
                                                    <td style="padding: 4px; color: #555;">${polygonData.district}</td>
                                                </tr>
                                                ${polygonData.granted_date && !isNaN(new Date(polygonData.granted_date).getTime()) ?`
                                                <tr>
                                                    <td style="padding: 8px; font-weight: bold;"><i class="fa fa-calendar-alt"></i> Tenure:</td>
                                                    <td style="padding: 8px; color: #555;">${new Date(polygonData.granted_date).toLocaleDateString()}</td>
                                                </tr>` : ''}
                                            </tbody>
                                        </table>
                                    </div>
                                `);

                                polygon.addTo(allMineralsLayer); // add to minerals layer
                                }
                            
                        });});}
                        // if (document.getElementById('mining').checked) {
                        //     L.geoJSON(companyPolygons.mining, { style: { color: 'purple' } }).addTo(map);
                        // }

                        if (document.getElementById('mining').checked) {
                            companyPolygons.forEach(area => {
                            area.forEach(polygonData => {
                                // Extract coordinates from the WKT format
                            // console.log(polygonData.grantstatus);
                                if(polygonData.grantstatus == "MINING"){
                                    const CoordsMining = polygonData.geo.match(/(\d+\.\d+ \d+\.\d+)/g).map(coord => {
                                    const [lng, lat] = coord.split(' ');
                                    return [parseFloat(lat), parseFloat(lng)]; // Leaflet uses [lat, lng]
                                });

                                // Create a polygon
                                const polygon = L.polygon(CoordsMining, {
                                    color: '#8DD3C7', // Customize your polygon color
                                    fillOpacity: 0.7,
                                }).addTo(map);

                                Allpolygons.push({polygonData, mineral: polygonData.mineral}); 
                                    // Convert coordinates to [lng, lat] format for Turf.js
                                const turfCoordsMining = CoordsMining.map(coord => [coord[1], coord[0]]);
                                const turfPolygonMining = turf.polygon([turfCoordsMining]);

                                // Calculate area in square meters
                                const areaInSquareMetersMining = turf.area(turfPolygonMining);

                                // Format area for display (e.g., convert to sqkms)
                                const areaInSqkmsMining = areaInSquareMetersMining / 1000000; // Convert to hectares if needed
                                // `company_name`, `mineral_name`, `description`, `district`, `status`, `granted_date`, `coordinates`, `contact`, `address`, `area`, `scale`, `tanure`
                                //
                                // Bind a popup with the polygon ID and area
                                // Bind a popup with the polygon ID and area
                                polygon.bindPopup(`
                                <div style="font-family: Arial, sans-serif; color: #333; max-width: 350px;">
                                
                                    <table style="width: 100%; border-collapse: collapse; margin-top: 5px;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 4px; font-weight: bold;"><i class="fa fa-gem"></i> Mineral :</td>
                                                <td style="padding: 4px; color: #555;">${polygonData.mineral}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px; font-weight: bold;"><i class="fa fa-ruler-combined"></i> Area:</td>
                                                <td style="padding: 4px; color: #555;">${areaInSqkmsMining.toFixed(2)} sqkms</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px; font-weight: bold;"><i class="fa fa-building"></i> Company:</td>
                                                <td style="padding: 4px; color: #555;">${polygonData.company_name}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px; font-weight: bold;"><i class="fa fa-info-circle"></i> Status:</td>
                                                <td style="padding: 4px; color: #555;">
                                                    <span style="color: ${polygonData.status === 'Active' ? 'green' : 'red'}; font-weight: bold;">
                                                        ${polygonData.status}
                                                    </span>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="padding: 4px; font-weight: bold;"><i class="fa fa-calendar-alt"></i> Applied On:</td>
                                                <td style="padding: 4px; color: #555;">${new Date(polygonData.granted_date).toLocaleDateString()}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 4px; font-weight: bold;"><i class="fa fa-map-marker-alt"></i> District:</td>
                                                <td style="padding: 4px; color: #555;">${polygonData.district}</td>
                                            </tr>
                                            ${polygonData.granted_date && !isNaN(new Date(polygonData.granted_date).getTime()) ?`
                                            <tr>
                                                <td style="padding: 8px; font-weight: bold;"><i class="fa fa-calendar-alt"></i> Tenure:</td>
                                                <td style="padding: 8px; color: #555;">${new Date(polygonData.granted_date).toLocaleDateString()}</td>
                                            </tr>` : ''}
                                        </tbody>
                                    </table>
                                </div>
                            `);
                            polygon.addTo(allMineralsLayer); // add to minerals layer
                                }
                            
                        });});}
    } /// End of function addPolygons()

    // Function to filter polygons based on selected minerals
function filterPolygons() {
    const selectedMinerals = [];
    
    // Get all checked minerals
    document.querySelectorAll('.mineral-checkbox:checked').forEach(checkbox => {
        selectedMinerals.push(checkbox.getAttribute('data-mineral'));
    });

    // Show or hide polygons based on selected minerals
    //console.log('filtered: ',Allpolygons)
    Allpolygons.forEach((data) => {
    const polygonData = data.polygonData;  // Extract polygonData from the array
    
    // Check if the selected mineral matches the mineral in the polygon data
    var mineralName = polygonData.mineral.trim();

    if (selectedMinerals.includes(mineralName)) {
       // console.log('filtered: ', mineralName);
        
        // Parse the geo coordinates from the polygon data
        
           var coordinates = polygonData.geo.match(/(\d+\.\d+ \d+\.\d+)/g).map(coord => {
                                    const [lng, lat] = coord.split(' ');
                                    return [parseFloat(lat), parseFloat(lng)]; // Leaflet uses [lat, lng]
                                });
                                console.log(coordinates);
        // Create a Leaflet polygon and add it to the map
        var polygon = L.polygon(coordinates, {
            color: 'green',      // Set color based on input
            fillColor: 'green',  // Set fill color based on input
            fillOpacity: 0.7
        }).bindPopup(`
            <b>Mineral Name:</b> ${polygonData.mineral}<br>
            <b>Company Name:</b> ${polygonData.company_name}<br>
            <b>Grant Status:</b> ${polygonData.grantstatus}<br>
          
        `);
        
        polygon.addTo(map); 
        
        // Add the polygon to the map
    } else {
        // Remove the polygon from the map if it doesn't match the selected mineral
        map.eachLayer(function(layer) {
            
            if (layer instanceof L.Polygon ) {
                map.removeLayer(layer);
            }
        });
    }
});
}

// Attach event listeners to the checkboxes
document.querySelectorAll('.mineral-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', filterPolygons);
});

// 'Select All' functionality
document.getElementById('mineral-select-all').addEventListener('change', function() {
    const isChecked = this.checked;

    // Check/uncheck all mineral checkboxes
    document.querySelectorAll('.mineral-checkbox').forEach(checkbox => {
        checkbox.checked = isChecked;
    });

    // Apply the filtering
    filterPolygons();
});
    // Add event listeners to checkboxes
    document.querySelectorAll('input[type=checkbox]:not(#lease-select-all):not(.mineral-checkbox):not(#mineral-select-all):not(#status-select-all)').forEach(function(checkbox)  {
        
        checkbox.addEventListener('change', function() {
           
            // Clear existing layers and re-add based on checked states
           
               
            map.eachLayer(function(layer) {
                map.removeLayer(layer);
            });
            addPolygons();
      
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
    // Lease Type Select All
    document.getElementById('lease-select-all').addEventListener('change', function() {
       
        const checkboxes = document.querySelectorAll('.leasetypes input[type="checkbox"]:not(#lease-select-all)');
        console.log(checkboxes,'Lease Type Select All');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        map.eachLayer(function(layer) {
                map.removeLayer(layer);
            });
            addPolygons();
    });

    // Mineral Type Select All
    document.getElementById('mineral-select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.minerals input[type="checkbox"]:not(#mineral-select-all)');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    // Status Select All
    document.getElementById('status-select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.status input[type="checkbox"]:not(#status-select-all)');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
});

    addPolygons(); // Initial call to add polygons



 //// script to open download files
 ///////////////////////////////////////////////////
 
        // Function to open the Word document in a new window
        function openDoc2024() {
            window.open('{{ url('/view-mcr2024') }}', '_blank', 'width=800,height=600');
        }

        function openDoc2016() {
            window.open('{{ url('/view-mcr2016') }}', '_blank', 'width=800,height=600');
        }
        function openDocFresh() {
            window.open('{{ url('/view-fresh') }}', '_blank', 'width=800,height=600');
        }


       ///////////////////////////////////////////////////////////
       ///////////////////////////////////////////////////////////
       document.querySelectorAll('.filter-header').forEach(header => {
  header.addEventListener('click', function() {
    const content = this.nextElementSibling;

    // Collapse other open sections
    document.querySelectorAll('.filter-content').forEach(otherContent => {
      if (otherContent !== content) {
        otherContent.style.display = 'none';
      }
    });

    // Toggle the clicked section
    content.style.display = (content.style.display === 'block') ? 'none' : 'block';
  });
});




    </script>


@endpush


