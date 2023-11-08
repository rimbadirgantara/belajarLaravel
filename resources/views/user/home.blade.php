@extends('layouts.mainLayouts')
@section('container');
<div class="container">
  <div class="row mt-3">
    <div class="col-lg">
      <h4 class="text-secondary">Selamat Datang,  {{Auth::user()->name }}</h4>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-1">
      <a href="{{route('logout')}}" style="text-decoration: none;"><p class="fw-semibold">Logout</p></a>
    </div>
  </div>
</div>
@endsection
