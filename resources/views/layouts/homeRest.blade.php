<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>{{ get_setting('minerals') }}</title> -->
     <title>Mines and Minerals Department GB</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link href="{{ asset('frontend/img/logo.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('adm/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
     <!-- Template Stylesheet -->
     <link href="{{asset('frontend/css/home.css')}}" rel="stylesheet">

    <!-- JavaScript Libraries -->
    <!-- <script src="{{asset('frontend/js/jquery-3.4.1.min.js')}}" ></script> -->


      <!-- Include Leaflet CSS and JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    @stack('styles')
</head>

<body id="home" data-spy="scroll" data-target="#main-nav">
  <!--Navbar-->
  <header>
    <nav id="main-nav" class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
        <a href="#home" class="navbar-brand">
          <img src="{{ asset('frontend/img/logo.png')}}" alt="" width="50" height="50" alt="logo">
          <h1 class="d-inline align-middle h3">MICL</h1>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li>
            <div class="four columns">
              <a href="{{ route("home.index") }}" class="buttons flatbutt turquoise">Home</a>
              </div>
            </li>
            <li>
            <div class="four columns">
                <a href="{{ route("allcompaniesdata.index") }}" class="buttons flatbutt turquoise" style="margin-left:10px">Companies</a>
              </div>
              </li>
            <li> 
                <div class="four columns">
                    <a href="{{ route("home.register") }}" class="buttons flatbutt turquoise" style="margin-left:10px">Register</a>
                </div>
            </li>
            <li> 
                <div class="four columns">
                    <a href="{{ route("home.guidelines") }}" class="buttons flatbutt turquoise" style="margin-left:10px">Guidelines</a>
                </div>
            </li>
            <li> 
                <div class="four columns">
                    <a href="{{ route("home.interactivemap") }}" class="buttons flatbutt turquoise" style="margin-left:10px">Maps</a>
                </div>
            </li>
            <li> 
                <div class="four columns">
                    <a href="{{ route("home.concession-rules") }}" class="buttons flatbutt turquoise" style="margin-left:10px">Rules</a>
                </div>
            </li>
            <li> 
                <div class="four columns">
                    <a href="{{ route("home.downloads") }}" class="buttons flatbutt turquoise" style="margin-left:10px">Downloads</a>
                </div>
            </li>
            @if (Auth::check())
            <li style="float: right;">
                <div class="four columns">
                    <a class="buttons flatbutt emerland" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @else
        <li style="float: right;">
                <div class="four columns">
                    <a href="{{ route("login") }}" class="buttons flatbutt emerland" style="margin-left:10px"><i class="fa fa-user"></i> Login</a>
                </div>
        </li>
        @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>
  @yield('content')
  <!--Footer-->
  <footer id="main-footer" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6 text-center">
          <p class="lead">
            Designed & Developed By &copy <span id="year"></span>
          </p>
          <p>IT Departament Gilgit Baltistan</p>
        </div>
      </div>
    </div>
  </footer>

    <!-- JavaScript Libraries -->
    <script src="{{asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('adm/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('adm/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script src="https://unpkg.com/@turf/turf/turf.min.js"></script>
    <script src="https://unpkg.com/wellknown/wellknown.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('frontend/js/main.js')}}"></script>
	<script>
	var $ticker = $('[data-ticker="list"]'),
    tickerItem = '[data-ticker="item"]'
    itemCount = $(tickerItem).length,
    viewportWidth = 0;

function setupViewport(){
    $ticker.find(tickerItem).clone().prependTo('[data-ticker="list"]');

    for (i = 0; i < itemCount; i ++){
        var itemWidth = $(tickerItem).eq(i).outerWidth();
        viewportWidth = viewportWidth + itemWidth;
    }

    $ticker.css('width', viewportWidth);
}

function animateTicker(){
    $ticker.animate({
        marginLeft: -viewportWidth
      }, 30000, "linear", function() {
        $ticker.css('margin-left', '0');
        animateTicker();
      });
}

function initializeTicker(){
    setupViewport();
    animateTicker();

    $ticker.on('mouseenter', function(){
        $(this).stop(true);
    }).on('mouseout', function(){
        animateTicker();
    });
}

initializeTicker();
	</script>
    @stack('scripts')
</body>

</html>
