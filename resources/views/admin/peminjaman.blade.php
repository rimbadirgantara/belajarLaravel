@extends('layouts.mainLayouts')
@section('container')
<div class="container mb-2">
  <div class="row mt-3">
    <div class="col-lg">
      <a href="#" class="btn btn-success">Tambah Peminjam</a>
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
          <input type="text" class="form-control" placeholder="Cari Peminjam / buku" name="search">
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
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Buku</th>
          <th scope="col">Peminjam</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Kekuatan Tidak Terbatas <br><small class="rounded p-1">Kode Buku: abcdeg</small></td>
          <td>Rimba Dirgantara</td>
          <td>Belum dikembalikan</td>
          <td>
            <a href="/admin/peminjaman/id/delete" class="btn btn-sm btn-danger">Hapus</a>
            <a href="/admin/peminjaman/id/edit" class="btn btn-sm btn-warning">Edit</a>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Ronald Read <br><small class="rounded p-1">Kode Buku: qwertt</small></td>
          <td>Kesaktian Letnan Cicak</td>
          <td>Sudah dikembalikan</td>
          <td>
            <a href="/admin/peminjaman/id/delete" class="btn btn-sm btn-danger">Hapus</a>
            <a href="/admin/peminjaman/id/edit" class="btn btn-sm btn-warning">Edit</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection