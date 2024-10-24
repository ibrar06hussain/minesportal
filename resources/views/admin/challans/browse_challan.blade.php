@extends('layouts.LeaseAppAdmin')
@yield('css')
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

// PRESENTATIONAL CSS
body {
  background-color: #f7f7f9;
}
</style>
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Applicant</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Applicant</a></li>
            <li class="breadcrumb-item active">Challans</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if (session('status'))
                  <div class="alert alert-success">
              <p>{{ session('status') }}</p>
                  </div>
              @endif
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
            <p>{{ session('status') }}</p>
                </div>
            @endif
        <div class="card">
            <div class="card-header bg-info">
                    <h3 class="card-title">
          <i class="fa fa-receipt mr-1"></i>
          Challan Submission Section
        </h3>
                <div class="float-right">
                    <a class="btn btn-danger"  href="{{ route('admin.challans.download_challan',['app_id'=>$data[0]->application_id]) }}""><i class="fa fa-download text-white"></i> Download Your Challan </a>
                </div>
            </div>
            <div class="card-body" style="overflow:auto;">
                <div class="container p-y-1">
                  <form action="{{ route('admin.challans.challan_upload') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="row m-b-1">
                      <div class="col-sm-6 offset-sm-3">
                        <div class="form-group inputDnD">
                            <label for="fee_paid_on">Challan Fee Payment Date</label>
                            <input type="Date" class="form-control @error('fee_paid_on') is-invalid @enderror" name="fee_paid_on" id="fee_paid_on" value={{old('fee_paid_on')}}>
                            @error('fee_paid_on')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                      </div>
                      <div class="col-sm-6 offset-sm-3">
                        <button type="button" class="btn btn-primary btn-block" onclick="document.getElementById('challan_form').click()">Upload Your Challan</button>
                        <div class="form-group inputDnD">
                            <label class="sr-only" for="challan_form">File Upload</label>
                            <input type="file" class="form-control-file text-primary font-weight-bold @error('challan_form') is-invalid @enderror" name="challan_form" id="challan_form" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop the challan file">
                            @error('challan_form')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            <input id="application_id" name="application_id" type="hidden" value="{{$data[0]->application_id}}">
                            <input id="name" name="name" type="hidden" value="{{$data[0]->name}}">
                            <input type="submit" class="btn btn-primary" value="submit" style="width:100%">
                        </div>
                      </div>
                    </div>
                  </form>
                  </div>
            </div>

        </div>
        </div>
      </div>
      </div>
  </section>
  <!-- /.content -->
@endsection
@yield('js')
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
</script>
