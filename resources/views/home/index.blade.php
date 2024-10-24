@extends('layouts.appHome')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<div class="todo-container">
    <div class="header-section-a">
        @if (Auth::check())
            {{ Auth::user()->name }}
            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @else
            <a href="\login">login</a>
        @endif
    </div>
    <div class="header-section">
    <div id="index-gallery ">
        <div class="item">
            <img src="{{ asset('frontend/img/logo.png')}}" alt="" style="width: 100px;"/>
            <div class="seven mt-4">
                <h1>Minerals & Mines Department Portal</h1>
            </div>
        </div>
        </div>
    </div>
<div class="cat-element">
		<h1>Portal Menu</h1>
	<div class="category-selection">
		<div class="categories">
            <div class="row">
                <div class="col-md-4 category" data-id="1">
                    <div class="process-card">
                        <h3>Process Guidelines</h3>
                        <a href="{{route('home.guidelines')}}" class="btn btn-sm">More Details</a>
                    </div>
                </div>
                <div class="col-md-4 category" data-id="1">
                    <div class="process-card2">
                        <h3>Interactive Map</h3>
                        <a href="{{route('home.interactivemap')}}" class="btn btn-sm">More Details</a>
                    </div>
                </div>
                <div class="col-md-4 category" data-id="1">
                    <div class="process-card3">
                        <h3>Apply for Registration</h3>
                        <a href="/register" class="btn btn-sm">Apply Now</a>
                    </div>
                </div>
                <div class="col-md-4 category" data-id="1">
                    <div class="process-card4">
                        <h3>Mining Concession Rules</h3>
                        <a href="{{route('home.concession-rules')}}" class="btn btn-sm">More Details</a>
                    </div>
                </div>
                <div class="col-md-4 category" data-id="1">
                    <div class="process-card5">
                        <h3>Lease Holders</h3>
                        <a href="{{route('allcompaniesdata.index')}}" class="btn btn-sm">More Details</a>
                    </div>
                </div>
                <div class="col-md-4 category" data-id="1">
                    <div class="process-card6">
                        <h3>Downloads</h3>
                        <a href="{{route('home.downloads')}}" class="btn btn-sm">More Details</a>
                    </div>
                </div>
            </div>
		</div>
    </div>
</div>
@endsection


