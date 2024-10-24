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
    background-color: #17a2b8;
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
                        <h2>Fee Challan Submission</h2>
                        <p class="text-white">Please provide all the required data in each stage to reach the next stage of the application</p>
                    </div>
                    <div id="msform">
                    <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="register"><strong>Registration</strong></li>
                            <li class="active" id="coordinates"><strong>Coordinates</strong></li>
                            <li class="active" id="challan_generate"><strong>Challan Generation</strong></li>
                            <li class="active" id="challan_upload"><strong>Challan Upload</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 80%" aria-valuenow="80" >
                            <span id="progressValue">80%</span>
                            </div>
                        </div> <br> <!-- fieldsets -->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="form-class col-md-8 text-right">
                            <div class="seven">
                              <h1>Challan Upload Section</h1>
                            </div>
                            <form action="{{ route('admin.challans.challan_upload') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="row m-b-1">
                    <div class="col-sm-6 offset-sm-3">
                        <div class="form-group inputDnD">
                            <label for="bank_receipt_no" style="align-text:left;"><span style="font-size: 14px;font-weight: 500;text-align: left !important;">Bank Receipt Number</span></label>
                            <input type="text" class="form-control @error('bank_receipt_no') is-invalid @enderror" name="bank_receipt_no" id="bank_receipt_no" value={{old('bank_receipt_no')}}>
                            @error('bank_receipt_no')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-sm-6 offset-sm-3">
                        <div class="form-group inputDnD">
                            <label for="fee_paid_on" style="align-text:left;"><span style="font-size: 14px;font-weight: 500;text-align: left !important;">Challan Fee Payment Date</span></label>
                            <input type="Date" class="form-control @error('fee_paid_on') is-invalid @enderror" name="fee_paid_on" id="fee_paid_on" value={{old('fee_paid_on')}}>
                            @error('fee_paid_on')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-sm-6 offset-sm-3">
                        <button type="button" class="btn btn-info btn-block" onclick="document.getElementById('challan_form').click()">Upload Your Challan</button>
                        <div class="form-group inputDnD">
                            <label class="sr-only" for="challan_form">File Upload</label>
                            <input type="file" class="form-control-file text-info font-weight-bold @error('challan_form') is-invalid @enderror" name="challan_form" id="challan_form" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop the challan file">
                            @error('challan_form')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            <input id="application_id" name="application_id" type="hidden" value="{{$data[0]->application_id}}">
                            <input id="name" name="name" type="hidden" value="{{$data[0]->name}}">
                        </div>
                      </div>
                    </div>
                    <a class="text-center next action-button" id="exitButton" style="float:left">Exit</a>
                    <input type="submit" class="next action-button" value="Save & Next" style="float:right;">
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
function readUrl(input) {

  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = (e) => {
      let imgData = e.target.result;
      let imgName = input.files[0].name;
      input.setAttribute("data-title", imgName);
      console.log(e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }

}
$(document).ready(function() {
        $("#exitButton").click(function() {
            var email = {!! json_encode($email) !!};
            window.location.href = '/applications/leaseapplications/' + encodeURIComponent(email);
        });
    });
</script>
@endsection