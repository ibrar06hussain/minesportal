@extends('layouts.homeRest')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
.wrapper {
    max-height: 274px;
    width: 1180px;
    max-width: 100%;
    margin: 16em auto;
    font-family: "Helvetica", Arial, sans-serif;
    min-height: 300px;
}

.note-box {
  background: #F7B50A;
  color: #fff;
  margin: 1.5em 0;
}

.note-box.note {background: #F7B50A;}
.note-box.alert {background: #d35757;}
.note-box.idea {background: #39cccc;}
.note-box.success {background: #1fa67a;}

.note-box * {transition: 0.3s all ease-in-out;}

.note-box .note-text {
  padding: 0.3em 2em;
  display: table-cell;
}

.note-box .note-text h3 {}

.note-box .note-icon {
  display: table-cell;
  height: 100%;
  min-width: 60px;
  padding: 0 1em;
  text-align: center;
  vertical-align: middle;
  background: rgba(0,0,0,.1);
}

.note-box .note-icon span, .note-box .note-icon span svg {
  font-size: 60px;
  max-width: 60px;
  color: #fff;
}

@media all and (max-width: 360px) {
.note-box .note-icon {
  display: block;
  padding: 0.2em;
}
.note-box .note-icon span, .note-box .note-icon span svg {
  font-size: 36px;
  max-width: 36px;
}
.note-box .note-text {
  padding: 0.3em 1em;
}
}
</style>
@endpush
@section('content')
<div class="wrapper">

<div class="note-box success">
<div class="note-icon">
<span><i class="fa fa-info" aria-hidden="true"></i>
</span>
</div>
    <div class="note-text">
      <h3>Success!</h3>
      <p>You have successfully registered with us. In order to use our system, you need to verify your email with us. An email has been sent to you at <strong>{{$email}}</strong>. Please check your email</strong></p>
    </div>
  </div>
    <a href="{{ route('home.index') }}" class="btn btn-info">Back to Home</a>
</div>
@endsection



