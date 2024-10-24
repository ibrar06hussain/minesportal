@extends('layouts.homeRest')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('frontend/home/css/home.css') }}">
@endpush
@section('content')

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
            <a href="/mmlnc" target="_blank">
          <div class="card text-center border-primary mb-resp mb-3">
            <div class="card-body">
              <span class="d-block h3 text-primary">Minerals Agreement For Mining Lease</span>
              <p class="text-muted">Minerals Agreement For Mining Lease</p>
            </div>
          </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="/workorder" target="_blank">
          <div class="card text-center border-primary text-white mb-resp mb-3">
            <div class="card-body">
              <span class="d-block h3 text-primary">Work Order</span>
              <p class="text-muted">Specimen of Work Order</p>
            </div>
          </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="/mnoc" target="_blank">
          <div class="card text-center border-primary text-white mb-resp mb-3">
            <div class="card-body">
              <span class="d-block h3 text-primary">NOC Document</span>
              <p class="text-muted">Specimen of Mining No Object Certificate</p>
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
          <div class="card text-center border-primary mb-resp mb-3">
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


