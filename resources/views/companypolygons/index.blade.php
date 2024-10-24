@extends('layouts.homeRest')

@push('styles')
<style>
    .small-text {
        font-size: 10px; /* You can set the size as per your needs */
    }
</style>
@endpush
@section('content')
<div class="container">
<div class="row" style="padding-top: 20px;">
    <div class="col-sm-12">
    <!-- Data Table -->
    <table class="table table-bordered table-stripped table-sm ">
    <thead>
        <tr class="text-white bg-primary">
            <th colspan="9">
                <h1>List of Companies</h1>
            </th>
        </tr>
        <tr>
            <th colspan="9">
                <div class="form-group">
                    <form method="GET" action="{{ route('allcompaniesdata.index') }}">
                        <div class="input-group">
                                <input type="text" class="form-control"  name="company_name" placeholder="Company Name" value="{{ request('company_name') }}">
                                <input type="text" class="form-control" name="mineral_name" placeholder="Mineral Name" value="{{ request('mineral_name') }}">
                                <input type="text" class="form-control" name="status" placeholder="Status" value="{{ request('status') }}">
                                <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                    </form>
                </div>
            </th>
    <!-- Export Links -->
    <!-- <a href="route('allcompaniesdatapdf') " class="btn btn-primary">Export PDF</a>
    <a href="route('allcompaniesdataexcel') " class="btn btn-primary">Export Excel</a> -->
            <tr><th>#</th>
                <th><a href="?sort_by=company_name&sort_order={{ request('sort_order') == 'asc' ? 'desc' : 'asc' }}">Company Name</a></th>
                <th><a href="?sort_by=mineral_name&sort_order={{ request('sort_order') == 'asc' ? 'desc' : 'asc' }}">Mineral Name</a></th>
                 <th>District</th>
                <th>Status</th>
                <th>Granted Date</th>
                <th>Area</th>
                <th>Scale</th>
                <th>Tenure</th>
            </tr>
        </thead>
        <tbody>
            @foreach($polygons as $polygon)
            <tr><td>  {{ ($polygons->currentPage() - 1) * $polygons->perPage() + $loop->iteration }}</td>
                <td><small>{{ $polygon->company_name }}</small></td>
                <td><small>{{ $polygon->mineral_name }}</small></td>
                <td><small>{{ $polygon->district }}</small></td>
                <td><small>{{ $polygon->status }}</small></td>
                <td><small>{{ date('d-m-Y', strtotime($polygon->granted_date)) }}</small></td>   
                <td><small>{{ $polygon->area }}</small></td>
                <td><small>{{ $polygon->scale }}</small></td>
                <td><small>{{ $polygon->tanure }}</small></td>
            </tr>
            @endforeach
          
        </tbody>
  
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $polygons->links('pagination::bootstrap-4') }}
    </div>

    </div>
    </div>
    <!-- /.row -->
   
</div>
@endsection
