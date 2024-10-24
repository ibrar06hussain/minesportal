@extends('layouts.leaseApplications')
@section('content')
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Applications</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
        <!-- Main row -->
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
              <i class="fa fa-users mr-1"></i>
              Applications
            </h3>
                    <div class="float-right">
                        <a class="btn btn-danger"  href="{{ route('new_applications.new_application')}}"><i class="fa fa-plus text-white"></i> New Application </a>
                    </div>
                </div>
            <div class="card-body" style="overflow:auto;">
                {{-- <div class="float-right mt-2 mb-3">
                    <form class="form-inline">
                        <input type="text" class="form-control" name="search" placeholder="Search Application">
                        <button type="submit" class="btn btn-primary ml-1">Search</button>
                    </form>
                </div> --}}
        <table class="table table-bordered table-sm table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Licence For</th>
                    <th>Mineral</th>
                    <th>Location </th>
                    <th>Applied On</th>
                    <th>Application Status</th>
                    <th>Challan Generated On</th>
                    <th class="text-center">view</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($applicantdata as $key=>$apps)
                <tr>
                    {{-- {{ dd($coordinatedata) }} --}}

                    <td>{{ $key+1 }}</td>

                    <td>{{ $apps->licence_for }}</td>
                    <td>{{ $apps->name_mineral }}</td>
                    <td>{{ $apps->location }}</td>
                    <td>{{ \Carbon\Carbon::parse($apps->challan_date)->format('j F Y') }}</td>
                    <td>
                        @if($apps->application_status=='complete')
                            <span>Submitted</span>
                        @else
                        <span>Incomplete</span>
                        @endif
                    </td>
                    <td>
                        @if(!is_null($apps->challan_generated_date))
                         {{ \Carbon\Carbon::parse($apps->challan_generated_date)->format('j F Y H:i') }}
                        @endif
                    </td>
                    <td class="text-center">
                        @if($apps->coor_added==0)
                        <span class="text-info" style="font-size: 12px;">Please add your coordinates access challan generate step</span><br>
                            <a href="{{ route('addcoordinates', ['app_id'=>$apps->application_id])}}" class="btn btn-xs btn-primary"><i
                                class="fas fa-plus"></i> Add Application Coordinates</a>
                        @endif
                        @if($apps->coor_added==1 && $apps->challan_added==0)
                        <span class="text-info" style="font-size: 12px;">You've successfully added your coordinates. Please generate your challan to submit application fee using the link below</span><br>
                            {{-- <a href="{{ route('user.challans',['name'=>$apps->application_id])}}" class="btn btn-xs btn-secondary"><i
                                    class="fas fa-plus"></i> Generate Application Challan</a> --}}
                            <a href="{{ route('admin.challans.generate_challan',['app_id'=>$apps->application_id])}}" class="btn btn-xs btn-secondary" id="generate_challan"><i
                                        class="fas fa-plus"></i> Generate Application Challan</a>
                        @endif
                        @if($apps->coor_added==1 && $apps->challan_added==1 && $apps->challan_uploaded==0)
                        <span class="text-info" style="font-size: 12px;">Please note that challan fee must be paid and uploaded within seven days of challan generation. You can upload the challan by clicking the link button below</span><br>
                         {{-- <a href="{{ route('lease_application_details',['appid'=>$apps->application_id])}}" class="btn btn-xs btn-info"><i
                                        class="fas fa-receipt"></i>Upload Challan</a> --}}
                        <a href="{{ route('admin.challans.browse_challan',['app_id'=>$apps->application_id])}}" class="btn btn-xs btn-info"><i
                                            class="fas fa-eye"></i> Upload Challan</a>
                        @endif

                        @if($apps->coor_added==1 && $apps->challan_added==1 && $apps->challan_uploaded==1)
                        <span class="text-info" style="font-size: 12px;">You have completed your application, you can view the application details below</span><br>
                        <a href="{{ route('admin.applications.index',['app_id'=>$apps->application_id])}}" class="btn btn-xs btn-success"><i
                            class="fas fa-eye"></i> View Status</a>
                        @endif



                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
</div>
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('scripts')
    
@endpush
