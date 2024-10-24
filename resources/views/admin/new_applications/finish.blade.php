@extends('layouts.companyAdmin')
@yield('css')
<link rel="stylesheet" href="{{ asset('frontend/applicant/css/main.css') }}">
<style>
    .inputDnD {
  .form-control-file {
    position: relative;
    width: 100%;
    /* height: 100%; */
    min-height: 8em;
    outline: none;
    visibility: hidden;
    cursor: pointer;
    background-color: #c61c23;
    box-shadow: 0 0 5px solid currentColor;
    &:before {
      content: attr(data-title);
      position: absolute;
      top: 0.5em;
      left: 0;
      width: 100%;
      min-height: 6em;
      line-height: 2em;
      padding-top: 1.5em;
      opacity: 1;
      visibility: visible;
      text-align: center;
      border: 0.25em dashed currentColor;
      transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
      overflow: hidden;
    }
    &:hover {
      &:before {
        border-style: solid;
        box-shadow: inset 0px 0px 0px 0.25em currentColor;
      }
    }
  }
}
</style>
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
                        <h2>Completion</h2>
                        <p class="text-white">You have finally reached the end of your application</p>
                    </div>
                    <div id="msform">
                    <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="register"><strong>Registration</strong></li>
                            <li class="active" id="coordinates"><strong>Coordinates</strong></li>
                            <li class="active" id="challan_generate"><strong>Challan Generation</strong></li>
                            <li class="active" id="challan_upload"><strong>Challan Upload</strong></li>
                            <li class="active" id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%" aria-valuenow="100" >
                            <span id="progressValue">100%</span>
                            </div>
                        </div> <br> <!-- fieldsets -->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="form-class col-md-8 text-right">
                                <div class="seven">
                                  <h1>Completion Section</h1>
                                </div>
                                <div class="alert alert-info">
                                    <h5 class="text-center"><i class="icon fas fa-check"></i>Success Alert!</h5>
                                    <p class="text-center text-white">Your application has been submitted successfully.</p>
                                </div>
                                <a href="{{route('user.applications',['email'=>$email])}}" class="mt-5 next action-button" style="text-decoration:none">Go back to your profile</a>
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
@endsection