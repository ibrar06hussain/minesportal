@extends('layouts.leaseApplications')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<style>
#map {
    height: 300px;
    width: 100%;
    margin-top: 20px;
    margin-bottom: 20px;
}
</style>
<style>
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


.notification-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            background-color: #f8f9fa;
        }
        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .notification-header h5 {
            margin: 0;
        }
        .notification-date {
            font-size: 0.9rem;
            color: #6c757d;
        }
</style>

<script type="text/javascript">
        // Function to open the Word document in a new window
        function openDoc() {
            window.open('{{ url('/view-procedure') }}', '_blank', 'width=800,height=600');
        }

        // Automatically open the document on page load
        window.onload = function() {
            openDoc();
        };
    </script>

@section('content')
  <!-- Main content -->
<section class="content">
    <div class="container">
    <div class="clearfix blog-list">
    @foreach ($applicantdata as $key=>$data)
    <div class="container mt-5">
    <h3 class="section-heading">Upload Challan Form </h3>
        <form action="{{ route('uploadchallan') }}" method="POST" enctype="multipart/form-data" style="width:80%; margin:auto">
        @csrf
            <div class="row">
                <div class="col-md-4">
                    <p>Upload Deposited Challan Form: </p>
                </div>
                <div class="col-md-5">
                    <input id="challan_form" type="file" name="challan_form"
                        value="{{ old('challan_form') }}"
                        class="form-control @error('challan_form') is-invalid @enderror" required
                        placeholder="Enter Your Deposited Challan form">
                    <input id="application_id" name="application_id" type="hidden"
                        value="{{$data->application_id}}">
                    <input id="name" name="name" type="hidden" value="{{$data->name}}">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary ">Confirm Upload</button>
                </div>
            </div>
        </form>
    </div>
    @endforeach
    </div>
    </div>
</section>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

@if($coordinatedata && $coordinatedata->isNotEmpty())
<script>
// Convert the coordinates from Blade to a JavaScript array
var coordinates = @json($coordinatedata -> map(function($item) {
    return [
        $item -> latitude,
        $item -> longitude
    ];
}));

// Initialize the map
var map = L.map('map').setView([coordinates[0][0], coordinates[0][1]], 15);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 12,
}).addTo(map);

// Create a polygon from the coordinates
var polygon = L.polygon(coordinates, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5
}).addTo(map);

// Add a popup to the polygon
polygon.bindPopup('Polygon Area');
</script>

@else
<script>

            // Initialize the map
var map = L.map('map').setView(['35.920834','74.308334'], 15);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 12,
}).addTo(map);
var message = "No coordinate data available to draw the map.";
        L.popup()
            .setLatLng(map.getCenter())
            .setContent(message)
            .openOn(map);


    </script>
@endif



@stop


@push('scripts')
<script></script>
@endpush
