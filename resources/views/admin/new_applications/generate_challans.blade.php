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
                        <h2>Challan Generation</h2>
                        <p class="text-white">Please provide all the required data in each stage to reach the next stage of the application</p>
                    </div>
                    <div id="msform">
                    <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="register"><strong>Registration</strong></li>
                            <li class="active" id="coordinates"><strong>Coordinates</strong></li>
                            <li class="active" id="challan_generate"><strong>Challan Generation</strong></li>
                            <li id="challan_upload"><strong>Challan Upload</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 60%" aria-valuenow="60" >
                            <span id="progressValue">60%</span>
                            </div>
                        </div> <br> <!-- fieldsets -->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="form-class col-md-8 text-right">
                                <div class="seven">
                                    <h1>Challan Generation Section</h1>
                                </div>
                                <p class="text-center">Please click the following link to generate the challan. Once the challan is generated, you will need to proceed with the payment of the required fee. After successfully completing the payment, kindly upload the challan receipt in the next section to complete the process.</p>
                                <div class="text-left" style="float:left">
                                    <a href="#" class="text-center next action-button" id="exitButton" style="padding-left: 51px;padding-right: 51px;">Exit</a>
                                </div>
                                <a href="{{ route('admin.challans.generate_challan',['app_id'=>$app_id])}}" class="text-center next action-button" id="generate_challan"><i
                                        class="fas fa-plus"></i> Generate Application Challan</a>
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
    $('#generate_challan').click(function() {
    var id = {{$app_id}}; 
   // alert('he');
  //  window.location.href = "/admin/challans/browse_challan" + id;
    setTimeout(function() {
                    window.location.href = "/new_applications/browsechallan/"+id; // Use actual URL or variable
                }, 4000);
});
$("#exitButton").click(function() {
            var email = {!! json_encode($email) !!};
            window.location.href = '/applications/leaseapplications/' + encodeURIComponent(email);
        });
});
</script>
@endsection