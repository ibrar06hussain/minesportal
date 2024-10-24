@extends('layouts.companyAdmin')
@yield('css')
<link rel="stylesheet" href="{{ asset('frontend/applicant/css/main.css') }}">
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- /.container-fluid -->
      <div class="container-fluid">
        <!-- /.Main-row -->
        <div class="row">
            
          <!-- ./col -->
        <!-- /.col-md-4 -->
        
        <!-- /.col-md-4 -->
        <!-- /.col-md-8 -->
        <div class="col-md-12">
            <div class="card p-2">
                <div class="card-header bg-purple">
                    <h2>Register your Application</h2>
                    <p class="text-white">Please provide all the required data in each stage to reach the next stage of the application</p>
                </div>
                <div id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active" id="register"><strong>Registration</strong></li>
                        <li id="coordinates"><strong>Coordinates</strong></li>
                        <li id="challan_generate"><strong>Challan Generation</strong></li>
                        <li id="challan_upload"><strong>Challan Upload</strong></li>
                        <li id="confirm"><strong>Finish</strong></li>
                    </ul>
                    <div class="row card-body">
                        <div class="col-md-2"></div>
                        <div class="form-class col-md-8 text-right">
                            <h3 class="mb-3 mt-2 text-center" style="text-decoration: underline;">Registration Form</h3>
                            <form class="form-horizontal" id="registrationform" action="http://127.0.0.1:8000/new_application_store" method="POST" enctype="multipart/form-data">
                    <fieldset>
                    @include('home.partials.test');
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                         <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully completed your application</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
                </div>
            </div>
        </div>
        <!-- /.col-md-8 -->
        </div>
        <!-- /.Main-row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')
<script src="{{ asset('frontend/applicant/js/main.js') }}"></script>
@endpush
