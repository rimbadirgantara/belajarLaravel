@extends('layouts.mainLayouts')
@section('container')
<div class="container mb-2">
  <div class="row mt-3">
    <div class="col-lg">
      <a href="{{route('admin.tambahBuku')}}" class="btn btn-success">Tambah Buku</a>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-1">
      <a href="{{route('logout')}}" style="text-decoration: none;"><p class="fw-semibold">Logout</p></a>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg">
      <form action="/admin/searchBuku" method="POST">
        <div class="input-group mb-3">
          @csrf
          <input type="text" class="form-control" placeholder="Search Some Book" name="search">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    @if (Session::get('success'))
      <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
      </div>
    @elseif (Session::get('failed'))
      <div class="alert alert-danger" role="alert">
        {{Session::get('failed')}}
      </div>
    @endif
  </div>
  <div class="row">
    @foreach ($data as $data => $db)
      <div class="col-lg-4 mb-3">
        <div class="card-group">
          <div class="card">
            <img width="200" height="250" src="{{asset('/images/'.$db->gambar)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a style="text-decoration: none" href="#">{{$db->judul_buku}}</a></h5>
              <a href="/admin/editBuku/{{$db->id}}" class="btn btn-sm btn-warning">Edit</a>
              <a href="/admin/hapusBuku/{{$db->id}}" class="btn btn-sm btn-danger">Delete</a>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">{{$db->tahun_terbit}}</small>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection