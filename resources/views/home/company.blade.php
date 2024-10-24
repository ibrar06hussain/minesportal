@extends('layouts.companyAdmin')
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
                <h3>150</h3>

                <p>Total Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53</h3>

                <p>New Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Completed Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Approved Applications</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
           <!-------------------------------Applicant Profile  --------------------------------->
            <!-- /.card-header -->
            <!-- Widget: user widget style 1 -->
              <div class="col-md-4">
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header">
                    <h1><span class="badge bg-secondary">NTN No: 2021-02-249</span></h1>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ asset('frontend/img/com_logo.png')}}" alt="User Avatar">
                  </div>
                  <div class="card-footer">
                    <div class="description-block">
                      <h1 class="mb-2">Hamza Mines</h1>
                      <div class="small-box bg-info">
                        <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                        </div>
                      </div>
                      <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>CEO</strong>
                        <span>Naeem</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <strong>GST NO:</strong>
                          <span>2372827</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <strong>Education</strong>
                          <span>Nature of Business</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <strong><i class="fa fa-envelope"></i></strong>
                          <span>info@hamzamines.com.pk</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <strong><i class="fa fa-map"></i>Address</strong>
                          <span>Gulberg Green Main Market City Center Lahore, Pakistan</span>
                        </li>
                        <li class="list-group-item">
                          <a href="/Admin/PatientStatus?visitId=204&amp;mrNumber=MR-2021-02-249" class="btn btn-block btn-info">
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
              <div class="col-md-8">
                <table class="table table-stripped" style="border: 1px solid rgba(0,0,0,.125)">
                    <thead>
                      <tr>
                        <th class="bg-info" colspan="6">
                          <h3 class="card-title"><i class="fa fa-file mr-1"></i>
                            List of Applications
                          </h3>
                          <div class="float-right">
                          <input name="search" placeholder="Search" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th colspan="6">
                          <div class="float-right">
                            <a class="btn btn-sm btn-danger"  href="{{ route('home.add_company')}}"><i class="fa fa-plus text-white"></i> Add New Application</a>
                          </div>
                        </th>
                      </tr>
                      <tr>
                          <th>S.No</th>
                          <th>Name</th>
                          <th>Type</th>
                          <th>Area</th>
                          <th>Status</th>
                          <th>Operations</th>
                      </tr>
                    </thead>
                    </thead>
                    <tbody>
                      <tr>
                          <td>1</td>
                          <td>Muhammad Naeem</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>Jaffer Hussain</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>3</td>
                          <td>Khalid Rahim</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>4</td>
                          <td>Farhan Ahmed</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>5</td>
                          <td>Ibrar Hussain</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>6</td>
                          <td>Waqar-ul-Hassan</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>7</td>
                          <td>Numair Khan</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>8</td>
                          <td>Muhammad Bashir</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>9</td>
                          <td>Sherjeel Ahmed</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>10</td>
                          <td>Gul Muhammad</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>11</td>
                          <td>Murtaza Rehbar</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                      <tr>
                          <td>12</td>
                          <td>Sajid Ali Naeem</td>
                          <td>Mining</td>
                          <td>12 sft</td>
                          <td>Complete</td>
                          <td><i class="fa fa-eye"></i>|<i class="fa fa-pen"></i></td>
                      </tr>
                    </tbody>
                </table>
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
