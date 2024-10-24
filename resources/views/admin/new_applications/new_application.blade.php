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
                    <div class="card-header bg-info">
                        <h2>Register your Application</h2>
                        <p class="text-white">Please provide all the required data in each stage to reach the next stage of the application</p>
                    </div>
                    <div id="msform">
                    <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="register"><strong>Application Form</strong></li>
                            <li id="coordinates"><strong>Coordinates</strong></li>
                            <li id="challan_generate"><strong>Challan Generation</strong></li>
                            <li id="challan_upload"><strong>Challan Upload</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 20%" aria-valuenow="20" >
                            <span id="progressValue">20%</span>
                            </div>
                        </div> <br> <!-- fieldsets -->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="form-class col-md-8 text-right">
                            <div class="seven">
                                <h1>Application Form</h1>
                            </div>
                                <form method="POST" action="{{ route('new_applications.new_application_store') }}" class="form-horizontal" id="registrationform" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-12  bg-info">
                                                <div class="card-title">
                                                    <h3 class="mt-2 mb-2">Required Documents</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="firm_registration" class="col-sm-6 col-form-label">Firm/Company Registration Certificate:</label>
                                                    <div class="col-sm-6">
                                                        <input id="firm_registration" type="file" name="firm_registration" value="{{ old('firm_registration') }}" class="form-control @error('firm_registration') is-invalid @enderror" >
                                                    </div>
                                                    @error('firm_registration')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="deed_partnership" class="col-sm-6 col-form-label">Firm/Company Form/MOA/Deed Partnership:</label>
                                                    <div class="col-sm-6">
                                                        <input id="deed_partnership" type="file" name="deed_partnership" value="{{ old('deed_partnership') }}" class="form-control @error('deed_partnership') is-invalid @enderror" placeholder="Enter Your Firm Deed_partnership">
                                                    </div>
                                                    @error('deed_partnership')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12  bg-info">
                                                <div class="card-title">
                                                    <h3 class="mt-2 mb-2">Title Category</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="licence" class="col-sm-6 col-form-label">Type of Concession:</label>
                                                    <div class="col-sm-6">
                                                        <select id="licence" name="licence" class="form-control @error('licence') is-invalid @enderror"  fdprocessedid="s6mqn">
                                                            <option value="">Select Status</option>
                                                            <option value="Reconnaissance" {{ old('licence') == "Reconnaissance" ? 'selected' : ''}}>Reconnaissance License</option>
                                                            <option value="Exploration" {{ old('licence') == "Exploration" ? 'selected' : ''}}>Exploration License</option>
                                                            <option value="Mineral Deposit Retention" {{ old('licence') == "Mineral Deposit Retention" ? 'selected' : ''}}>Mineral Deposit Retention License</option>
                                                            <option value="Minning" {{ old('licence') == "Minning" ? 'selected' : ''}}>Minning lease</option>
                                                            <option value="Gem Stone Permit" {{ old('licence') == "Gem Stone Permit" ? 'selected' : ''}}>Gem Stone Permit</option>
                                                            <option value="Registration of Traders" {{ old('licence') == "Registration of Traders" ? 'selected' : ''}}>Registration of Traders</option>
                                                        </select>
                                                    </div>
                                                    @error('licence')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="name_mineral" class="col-sm-6 col-form-label">Mineral:</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control @error('name_mineral') is-invalid @enderror"  id="name_mineral" name="name_mineral" fdprocessedid="mge2rf">
                                                            <option value="">Select Mineral</option>
                                                            @foreach($minerals as $mineral)
                                                                <option value="{{$mineral->category_id}}" {{old("name_mineral")==$mineral->category_id?"selected":""}}>{{$mineral->category_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('name_mineral')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="location" class="col-sm-6 col-form-label">Site Location:</label>
                                                    <div class="col-sm-6">
                                                        <input id="location" type="text" name="location" value="{{old('location')}}" class="form-control @error('location') is-invalid @enderror"  placeholder="Enter your Location" fdprocessedid="z92vz">
                                                    </div>
                                                    @error('location')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="covered_area" class="col-sm-6 col-form-label">Covered Area:</label>
                                                    <div class="col-sm-6">
                                                        <input id="covered_area" type="text" name="covered_area" value="{{old('covered_area')}}" class="form-control @error('covered_area') is-invalid @enderror"  placeholder="Covered Area" fdprocessedid="z92vz">
                                                    </div>
                                                    @error('covered_area')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="district" class="col-sm-6 col-form-label">Site District:</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control @error('district') is-invalid @enderror"  id="district" name="district" fdprocessedid="mge2rf">
                                                            <option value="">Select Site District</option>
                                                            @foreach($districts as $district)
                                                                <option value="{{$district->District}}" {{old("district")==$district->District?"selected":""}}>{{$district->DistrictName}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('district')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="tehsil" class="col-sm-6 col-form-label">Site Tehsil:</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control @error('tehsil') is-invalid @enderror"  id="tehsil" name="tehsil" fdprocessedid="mge2rf">
                                                            <option value="">Select Site Tehsil</option>
                                                        </select>
                                                    </div>
                                                    @error('tehsil')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <a  class="text-center next action-button" id="exitButton" style="float:left">Exit</a>
                                        <input type="submit" class="next action-button" name="saveButton" value="Save & Next" />
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
@section('js')
<script>
    $(document).ready(function() {
        $('#district').on('change', function() {
            var districtId = $(this).val();
            if(districtId) {
                $.ajax({
                    url: '/tehsils/' + districtId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#tehsil').empty();
                        $('#tehsil').append('<option value="">Select Tehsil</option>');
                        $.each(data, function(key, value) {
                            $('#tehsil').append('<option value="'+ value.Tehsil +'">'+ value.TehsilName +'</option>');
                        });
                    }
                });
            } else {
                $('#tehsil').empty();
                $('#tehsil').append('<option value="">Select Tehsil</option>');
            }
        });
        $("#exitButton").click(function() {
            var email = {!! json_encode($email) !!};
            window.location.href = '/applications/leaseapplications/' + encodeURIComponent(email);
        });
    });
    </script>
@endsection