@extends('layouts.leaseApplications')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<style>
#maps {
    height: 300px;
    width: 100%;
    margin-top: 20px;
    margin-bottom: 20px;
}


.card-body.user-profile h3 {
    width: 100%;
    margin-bottom: 20px;
}

@keyframes blink {
    0% {
        opacity: 1;
    }

    50% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

.blinking-text {
    text-align: center;
    margin-top: 20%;
    font-size: 24px;
    color: green;
    animation: blink 1s infinite;
}
</style>

<style>
.section-heading {
    background-color: #f8f9fa;
    padding: 10px;
    border-left: 5px solid #007bff;
    margin-top: 20px;
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 1.5rem;
}

.section-heading span {
    font-size: 1.25rem;
    color: #007bff;
}

.card-body p {
    margin-bottom: 10px;
}

.card-body a {
    color: #007bff;
    text-decoration: none;
}

.card-body a:hover {
    text-decoration: underline;
}
.table-sm {
        font-size: 12px; /* Make the table text smaller */
    }
</style>


@section('content')
<!-- Main content -->
<section class="content">

    <div class="container">
                       
                        
                          
            <div class="container ">
                <!-- Map Section -->
                    <div class="row ">
                        <div class="col-md-8">
                            <div id="maps" style="height: 400px; border-radius: 10px; border: 5px solid #ddd;">
                                <!-- The map will be rendered here -->
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card shadow-sm mt-4 mb-4" style="height: 400px;">
                                <div class="card-body">
                                    <span class="card-title text-primary">Overlap Information:</span>
                                    <div class="table-responsive">
                                        <table id="overlap-info" class="table table-sm table-bordered table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Overlapping Company</th>
                                                    <th>Overlap Area(sq km)</th>
                                                    <th>Overlap Percent</th>
                                                </tr>
                                            </thead>
                                            <tbody id="overlap-data">
                                                <tr>
                                                    <td colspan="3" class="text-center text-muted">No data available</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Form to input new polygon coordinates -->
                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="card shadow-sm mb-4">
                                <div class="card-body">
                                <p>
                            Please enter your coordinate.
                            </p>  
                                    <form id="polygonForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="user-coordinates" class="font-weight-bold">Enter Coordinates (lat, lng pairs in decimal degree system only, comma separated):</label>
                                            <textarea id="user-coordinates" rows="6" class="form-control" placeholder="e.g. 35.9 74.2, 35.9 74.3, 36 74.3, 36 74.2"></textarea>
                                        </div>
                                        <p id="statusMessage" class="text-danger"></p>
                                    </form>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button id="check-overlap" class="btn btn-primary">Check Overlap</button>
                                        <button id="saveButton"  class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



    </div>


                        <hr class="invis" />






      



</section>





@stop


@push('scripts')
  <!-- Leaflet.js -->
   <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <!-- Turf.js -->
    <script src="https://unpkg.com/@turf/turf@6.5.0"></script>

    <script>
        // Initialize the map

        $(document).ready(function() {
///// Document Ready .////////////////////////

        var map = L.map('maps').setView([36.11499977, 74.3008113], 8);

        // Add a base map layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        // Example of existing polygons from backend (hardcoded for now)
       // Get polygons from the controller
    var existingPolygons = @json($polygonData);
    var overlapResults = [];

    var tableBody = $('#overlap-data'); // Get the table body element
    var saveButton = $('#saveButton');  // Get the Save button element
    var statusMessage = $('#statusMessage');
    var hasOverlap = false;
    // Loop through the polygon data and add each polygon to the map
   
                existingPolygons.forEach(function(polygon, polygonIndex) {
                        // Extract the part inside the outer parentheses of the geo property
                        var coordinatesString = polygon.geo.match(/\(\(([^)]+)\)\)/)[1];
                    
                        // Split coordinates by commas, then split each coordinate by spaces
                        var coordinates = coordinatesString.split(',').map(function(coord) {
                            
                            var latlng = coord.trim().split(/\s+/); // Split by any number of spaces
                        
                            return [parseFloat(latlng[1]), parseFloat(latlng[0])]; // Leaflet expects [lat, lng]
                        });
                        

                    
                        // Define a few specific color palettes
                        var colorPalette = ['Green'];


                        // Function to pick a color from the palette
                        function getColorFromPalette(index) {
                            return colorPalette[index % colorPalette.length];
                        }

                        // Get a color from the palette for each polygon
                        var color = getColorFromPalette(polygonIndex);
                        // Generate a random color for each polygon
                        //var color = getRandomColor();

                        // Add polygon to the map
                        L.polygon(coordinates, {
                            color: color,
                            fillOpacity: 0.7
                        }).addTo(map);
                    });
       
   
            ////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////////////////////////End ADD Exixsting Polygons to map//////////////////////////



                    // Function to create a polygon from input coordinates
                    function createPolygonFromInput(coords) {
                        // Parse the POLYGON format into an array of lat/lngs


                        var coordinates = coords.replace('POLYGON((', '').replace('))', '').split(',').map(function(coord) {
                            
                            var latlng = coord.trim().split(/\s+/);
                            return [parseFloat(latlng[1]), parseFloat(latlng[0])];
                        });

                        var polygonAdded = L.polygon(coordinates, { color: 'Yellow',
                            fillOpacity: 0.5 }).addTo(map);
                        var center = polygonAdded.getBounds().getCenter();
                        map.setView(center, 11);
                        // Create a Leaflet polygon from the coordinates




        // Zoom the map to fit the polygon's bounds
        var bounds = polygonAdded.getBounds();  // Get the bounds of the polygon
        map.fitBounds(bounds);  // Zoom to the polygon's bounds

        // Set max bounds to restrict the map within a 20km radius
        var center = bounds.getCenter();  // Get the center of the polygon
        var radius = 80000;  // 20 km radius in meters

        // Calculate latitude and longitude changes for the 20 km radius (rough estimate)
        var latChange = radius / 111000; // Roughly 1 degree latitude = 111 km
        var lngChange = radius / (111000 * Math.cos(center.lat * Math.PI / 180)); // Longitude varies by latitude

        // Create a bounding box around the center with a 20km radius
        var maxBounds = L.latLngBounds(
            L.latLng(center.lat - latChange, center.lng - lngChange),  // South-West bound
            L.latLng(center.lat + latChange, center.lng + lngChange)   // North-East bound
        );

        // Set the max bounds on the map to lock within the 20km radius
        map.setMaxBounds(maxBounds);



            // Get the current zoom level after fitting bounds
            var currentZoom = map.getZoom();

            // Set the minimum and maximum zoom levels
            map.setMinZoom(currentZoom-2);   // Fix the zoom level to the current zoom
            map.setMaxZoom(currentZoom + 2); // Allow zooming in only by 2 levels




                        return 1;
                    }




            ////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////

                    // Function to check overlap using Turf.js
                // Function to check overlap using Turf.js
            function checkOverlap(existingPolygons, userPolygon, polygoncomp) {
                // Ensure the input polygons are valid GeoJSON
                var tableBody = $('#overlap-data'); 
                tableBody.html(''); // Clear the existing rows
                saveButton.prop('disabled', false); // Enable the Save button initially
                statusMessage.html(''); // Clear any previous status messages
                

                // Calculate the area of the user's polygon
                        var userArea = turf.area(userPolygon); // Area in square meters

                // Loop through each existing polygon (if there are multiple)
                
                    // Ensure each existing polygon is in GeoJSON format
                        var existingGeoJson = existingPolygons; // Assuming it's already a valid GeoJSON object

                    // Calculate the area of the existing polygon
                        var existingArea = turf.area(existingGeoJson);

                    // Find the intersection between the user polygon and the existing polygon
                        var intersection = turf.intersect(userPolygon, existingGeoJson);

                    // Check if there is an intersection
    if (intersection) {
                                hasOverlap = true; // Set overlap flag to true
                                var overlapArea = turf.area(intersection); // Overlap area in square meters
                                var overlapPercentage = (overlapArea / existingArea) * 100;

                                // Push the results to the array
                                overlapResults.push({
                                    polygonId: polygoncomp,
                                    overlapArea: overlapArea / 1e6, // Convert to square kilometers
                                    overlapPercentage: overlapPercentage
                                });

                                     console.log(`Polygon : Overlap Area = ${overlapArea / 1e6} sq. km, Overlap Percentage = ${overlapPercentage}%`);
                         } 
                         else {
                                console.log(`Polygon : No overlap`);
                                 }
            

                return overlapResults;
            }




            ////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////End Check overlapping /////////////////////////////////////////

                    // Event listener for "Check Overlap" button

                     // Add event listener to the button
  document.getElementById('check-overlap').addEventListener('click', function() {
    checkOverlapFunction(); // Call the function when the button is clicked
  });
        function checkOverlapFunction() {
            // Get user input coordinates
            var userCoordinates = document.getElementById('user-coordinates').value;
            var userWKTcoordinates = 'POLYGON((' + userCoordinates + '))'; 
            
            if (!userCoordinates) {
                alert("Please enter coordinates.");
                return;
            }

            // Remove any existing user polygons from map
                 map.eachLayer(function (layer) {
                        if (layer instanceof L.Polygon && layer.options.color === 'Yellow') {
                    map.removeLayer(layer);
                     }
                 });

          
            
            var userPolygon = createPolygonFromInput(userCoordinates);
           
            //existingPolygonss = JSON.parse(existingPolygons);
           
              // Add the user polygon to the map
              

                existingPolygons.forEach(function(polygon) {

                    const geoJSONPolygon = wktToGeoJSON(polygon.geo);
                    const userJSONPolygon = wktToGeoJSON(userWKTcoordinates);
                    var polygoncomp = polygon.company;
                    // Check for overlaps
                    var overlapResults = checkOverlap(geoJSONPolygon, userJSONPolygon,polygoncomp);
                });
                var tableBody = $('#overlap-data');
            // Display results
            if (overlapResults.length > 0) {
              // If overlap is found, disable Save button and show a message
              hasOverlap=true;
                    
                        saveButton.prop('disabled', true); // Disable the Save button
                        $("#saveButton").attr("id", "disabledB");
                        statusMessage.html('Overlap found. Please modify your coordinates to save.')
                            .addClass('text-danger'); // Display message in red
                   


                 // Get the table body element
                        overlapResults.forEach(function (result) {
                            // If overlap is found, populate the table with overlap data
                           
                                var row = `<tr>
                                <td>`+ result.polygonId +`</td>
                                <td>` + result.overlapArea.toFixed(2) + ` sq km</td>
                                <td>`+ result.overlapPercentage.toFixed(2) + `%</td>
                            </tr>`;
                            tableBody.append(row); // Append each row with data
                            });
                            overlapResults=[]; //

            } else {
                            // If no overlap is found, display a message in the table
                            hasOverlap=false;  
                        saveButton.prop('disabled', false); // Enable Save button if no overlap
                        $("#disabledB").attr("id", "saveButton");
                        statusMessage.html('No overlap found. You can save the coordinates.')
                            .addClass('text-success'); // Display success message in green
                  
                            var noOverlapRow = `<tr>
                            <td colspan="3">No overlap detected</td>
                        </tr>`;
                            tableBody.append(noOverlapRow);
                        }
           

        }
        


        /////////////// wkt to Json /////////////////////////

                    function wktToGeoJSON(wkt) {
                const coordinates = wkt.match(/\(\(([^)]+)\)\)/)[1]
                    .split(',').map(coord => {
                        const [lon, lat] = coord.trim().split(' ').map(Number);
                        return [lon, lat];
                    });
                return {
                    type: "Feature",
                    geometry: {
                        type: "Polygon",
                        coordinates: [coordinates.concat([coordinates[0]])] // Closing the polygon
                    }
                };
            }

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////



    ///////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    // Save Button  submission handler
 
    const saveCoordinate = document.getElementById('saveButton');
        saveCoordinate.addEventListener('click',function(e){
            e.preventDefault();
        var res= checkOverlapFunction();
        if(hasOverlap){
            alert("Please modify your coordinates to save.");
            return;
        }
        var polygonString = $('#user-coordinates').val(); // Get the input value
        // Get the server-side values embedded using Blade
        // Use the correct variable embedding
        var appid = {{ $appid }};
        var company_id = {{ $company_id }};
        var district_id = {{ $districtid }};
        var email = {!! json_encode($email) !!};

        // Send the polygon data via AJAX to the Laravel backend
        $.ajax({
            url: '/savepolygons',
            method: 'POST',
            data: {
                polygon: polygonString,  // Pass the input string
                appid: appid,
                companyid: company_id,
                districtid: district_id,// Get the application id
                _token: '{{ csrf_token() }}'  // For CSRF protection
            },
            success: function(response) {
                if (response && response.message) {
                alert(response.message); // Only alert if `message` exists
                window.location.href = '/applications/leaseapplications/' + encodeURIComponent(email);


            } else {
                console.log('Full Response:', response);
                alert('Unexpected response: ' + JSON.stringify(response)); // Alert if `message` is undefined
            }
            },
            error: function(xhr) {
                alert('An error occurred while saving the polygon.');
            }
        });

    });

    /////////////////////////End Save Button/////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////



        }); ///////////////// End Document Ready   //////////////
    </script>
@endpush
