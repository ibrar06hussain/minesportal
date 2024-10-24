@extends('layouts.appHome')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('frontend/home/css/home.css') }}">
@endpush
@section('content')
<!--Showcase-->
<section id="showcase" class="py-5" usemap="#steps-map">
  <!-- Transparent Clickable Areas -->
  <div class="step step1" onclick="goToStage('stage1.html')"></div>
  <div class="step step2" onclick="goToStage('stage2.html')"></div>
  <div class="step step3" onclick="goToStage('stage3.html')"></div>
  <div class="step step4" onclick="goToStage('stage4.html')"></div>
  <div class="step step5" onclick="goToStage('stage5.html')"></div>
  <div class="step step6" onclick="goToStage('stage6.html')"></div>
  <div class="step step7" onclick="goToStage('stage7.html')"></div>
  <div class="step step8" onclick="goToStage('stage8.html')"></div>
  <div class="step step9" onclick="goToStage('stage9.html')"></div>
  <div class="step step10" onclick="goToStage('stage10.html')"></div>
    <div  class="primary-overlay text-white">

    </div>
  </section>

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


          <div id="map" style="height: 450px;">
          <div id="leasecheckboxes">
              <!-- <label><input type="checkbox" id="district" checked> District</label> -->
              <!-- <label><input type="checkbox" id="reserved" checked> Reserved Area</label> -->
              <label><input type="checkbox" id="study" checked> Study Area</label>
              <label><input type="checkbox" id="applied" checked> Applied</label>
              <label><input type="checkbox" id="exploration" checked> Exploration</label>
              <label><input type="checkbox" id="mining" checked> Mining</label>
          </div>
          </div>

          {{-- END MAP --}}
        </div>
      </div>
    </div>
  </section>

  <!--Downloads-->
  <section id="boxes" class="py-5">
    <div class="container">
        <div class="info-header mb-5">
            <h1 class="text-primary pb-3" style="text-align: center">
              Downloads
            </h1>
          </div>
      <div class="row">
        <div class="col-lg-3">
            <a href="/mcr2024" target="_blank">
          <div class="card text-center border-primary mb-resp mb-3">
            <div class="card-body">
              <span class="d-block h3 text-primary">Mineral Concession Rules 2024</span>
              <p class="text-muted">Detailed document of Mineral Concession Rules 2024</p>
            </div>
          </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="/mcr2016" target="_blank">
          <div class="card text-center bg-primary text-white mb-resp mb-3">
            <div class="card-body">
              <span class="d-block h3">Mineral Concession Rules 2016</span>
              <p>Detailed document of Mineral Concession Rules 2016</p>
            </div>
          </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="/applicationprocedure"  target="_blank">
          <div class="card text-center border-primary mb-resp mb-3">
            <div class="card-body">
              <span class="d-block h3 text-primary">Guidelines for Fresh Applicants</span>
              <p class="text-muted">Guidelines for Fresh Applicants to apply for minerals lease</p>
            </div>
          </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="/applicationfees" target="_blank">
          <div class="card text-center bg-primary text-white mb-3">
            <div class="card-body">
              <span class="d-block h3">Fee Schedule</span>
              <p>Guidelines for various fees to be submitted during mining lease</p>

            </div>
          </div>
            </a>
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



    // Step 2: Initialize the Geocoder
    const geocoder = L.Control.geocoder({
            defaultMarkGeocode: true
        }).addTo(map);
          // Optional: Handle geocode results
          geocoder.on('markgeocode', function(e) {
                      const latLng = e.geocode.center;
                      L.marker(latLng).addTo(map).bindPopup(e.geocode.name).openPopup();
                      map.setView(latLng, 15);
                  });
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
                    color: 'yellow', // Customize your polygon color
                    fillOpacity: 0.5,
                }).addTo(map);

                Allpolygons.push(polygonData);
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
                    color: 'green', // Customize your polygon color
                    fillOpacity: 0.7,
                }).addTo(map);

                Allpolygons.push(polygonData);

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
                                    <td style="padding: 4px; color: #555;">${polygonData.polygonid}</td>
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
                    color: 'pink', // Customize your polygon color
                    fillOpacity: 0.7,
                }).addTo(map);

                Allpolygons.push(polygonData);
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
                                    <td style="padding: 4px; color: #555;">${polygonData.polygonid}</td>
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
                    color: 'orange', // Customize your polygon color
                    fillOpacity: 0.7,
                }).addTo(map);

                Allpolygons.push(polygonData);
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
                                <td style="padding: 4px; color: #555;">${polygonData.polygonid}</td>
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
                }

         });});}
    }

    // Add event listeners to checkboxes
    document.querySelectorAll('input[type=checkbox]').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Clear existing layers and re-add based on checked states
            map.eachLayer(function(layer) {
                map.removeLayer(layer);
            });
            addPolygons();
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



    </script>

<script>
    function goToStage(stageUrl) {
        window.location.href = stageUrl;
    }
</script>


@endpush


