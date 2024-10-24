@extends('layouts.companyAdmin')
@yield('css')
<style>
.page-item.active .page-link{
  z-index: 3;
    color: #fff;
    background-color: #17a2b8 !important;
    border-color: #17a2b8 !important;
}
</style>
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Applicant Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Applicant</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$total_count}}</h3>

                <p>Total Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$new_count}}</h3>

                <p>New Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$total_count-$new_count}}</h3>

                <p>Completed Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>

                <p>Approved Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
           <!-------------------------------Applicant Profile  --------------------------------->
            <!-- /.card-header -->
            <!-- Widget: user widget style 1 -->
             
              <div class="col-md-3">
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header">
                    <h1><span class="badge bg-secondary">NTN No: {{$applicantdata[0]->ntn_no}}</span></h1>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ asset('frontend/img/com_logo.png')}}" alt="User Avatar">
                  </div>
                  <div class="card-footer">
                    <div class="description-block">
                      <h1 class="mb-2">{{$applicantdata[0]->company_name}}</h1>
                      <div class="small-box bg-info">
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                      </div>
                      <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>CEO</strong>
                        <span>{{$applicantdata[0]->authorize_person}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <strong>GST NO:</strong>
                          <span>{{$applicantdata[0]->gst_no}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <strong>Business Nature</strong>
                          <span>{{$applicantdata[0]->nature_business}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <strong><i class="fa fa-map"></i>Address</strong>
                          <span>{{$applicantdata[0]->business_address}}</span>
                        </li>
                        <li class="list-group-item">
                          <a href="#" class="btn btn-block btn-info">
                            View Complete Profile
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- /.description-block -->
                    <!-- /.row -->
                  </div>
                </div>
              </div>
              <div class="col-md-9">
              <table class="table table-sm table-striped">
            <thead>
                  <tr>
                    <th class="bg-info" colspan="5">
                      <h3 class="card-title mt-2"><i class="fa fa-file mr-1"></i>
                        List of Applications
                      </h3>
                      <div class="float-right">
                      <input name="search" placeholder="Search" class="form-control">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th colspan="5">
                    @if (session('status'))
                      <div class="alert alert-danger" id="err-msg">
                          {{ session('status') }}
                      </div>
                    @endif
                      <div class="float-right">
                      <a class="btn btn-danger mt-2 mb-2"  href="{{ route('new_applications.new_application')}}"><i class="fa fa-plus text-white"></i> New Application </a>
                      </div>
                    </th>
                  </tr>
                <tr>
                    <th>S.No</th>
                    <th>Licence For</th>
                    <th>Applied On</th>
                    <th>Status</th>
                    <th class="text-center">Operation</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($applicantdata as $key=>$apps)
                
                    @if($apps->coor_added)
                <tr>
                    {{-- {{ dd($coordinatedata) }} --}}

                    <td>{{ $key+1 }}</td>

                    <td>{{ $apps->licence_for }}</td>
                    <td>{{ \Carbon\Carbon::parse($apps->challan_date)->format('d M Y') }}</td>
                    <td>
                        @if($apps->application_status=='complete')
                        <span class="badge badge-success" style="width: 100%;">Submitted
                        </span>
                        @else
                        <span class="badge badge-danger" style="width: 100%;">Incomplete
                        </span>
                        @endif
                    </td>
                    @if($apps->coor_added)
                    <td class="text-center">
                    @if($apps->coor_added==0)
                        <span class="text-info" style="font-size: 12px;">Please add your coordinates access challan generate step</span><br>
                            <a href="{{ route('new_applications.addcoordinates', ['app_id'=>$apps->application_id])}}" class="btn btn-xs btn-primary"><i
                                class="fas fa-plus"></i> Add Application Coordinates</a>
                        @endif
                        @if($apps->coor_added==1 && $apps->challan_added==0)
                        <span class="text-info" style="font-size: 12px;">You've successfully added your coordinates. Please generate your challan to submit application fee using the link below</span><br>
                            <a href="{{ route('admin.new_applications.generate_challans',['app_id'=>$apps->application_id])}}" class="btn btn-xs btn-secondary" id="generate_challan"><i
                                        class="fas fa-plus"></i> Generate Application Challan</a>
                        @endif
                        @if($apps->coor_added==1 && $apps->challan_added==1 && $apps->challan_uploaded==0)
                        <span class="text-info" style="font-size: 12px;">Please note that challan fee must be paid and uploaded within seven days of challan generation. You can upload the challan by clicking the link button below</span><br>
                        <a href="{{ route('admin.new_applications.browsechallan',['app_id'=>$apps->application_id])}}" class="btn btn-xs btn-info"><i
                                            class="fas fa-eye"></i> Upload Challan</a>
                        @endif

                        @if($apps->coor_added==1 && $apps->challan_added==1 && $apps->challan_uploaded==1)
                        <span class="text-info" style="font-size: 12px;">You have completed your application, you can view the application details below</span><br>
                        <a href="{{ route('admin.applications.index',['app_id'=>$apps->application_id])}}" class="btn btn-xs btn-success"><i
                            class="fas fa-eye"></i> View Status</a>
                        @endif
                    </td>
                    @endif

                </tr>
                    @else
                    <tr>
                        <td colspan="5">No Applications Found</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="pagination text-info float-right">
          {{ $applicantdata->links('pagination::bootstrap-4') }}
        </div>
              </div>
            

              <!-- /.widget-user -->
<!-- /.col -->
<!-- /.row -->
<!-- /.widget-user -->
           <!-------------------------------End Applicant Profile  ----------------------------->
        </div>
      </div> 
    </section>
    <!-- /.content -->
    @endsection
    @push('scripts')
    <script>
    // Wait until the DOM is fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Find the alert message by ID
        var statusMessage = document.getElementById('err-msg');

        // If the alert exists, set a timeout to hide it after 2 seconds
        if(statusMessage) {
            setTimeout(function() {
                statusMessage.style.display = 'none';
            }, 3000); // 2000 milliseconds = 2 seconds
        }
    });
</script>
@endpush
