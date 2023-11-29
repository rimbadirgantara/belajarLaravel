@extends('layouts.mainLayouts')
@section('container')
<div class="container mb-2">
  <div class="row mt-3">
    <div class="col-lg">
      <a href="{{route('admin.tambahPeminjam')}}" class="btn btn-success">Tambah Peminjam</a>
      <a href="{{route('admin.cetakPeminjam')}}" class="btn btn-primary">Cetak Peminjam</a>
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
      <div class="d-flex justify-content-center">
        {!! $chart->container() !!}
        </div>
      <form action="/admin/peminjaman" method="GET">
        <div class="input-group mb-3">
          @csrf
          <input type="text" class="form-control" placeholder="Cari Peminjam" name="search">
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
          <th scope="col">No</th>
          <th scope="col">Nomor Anggota</th>
          <th scope="col">Kode Buku</th>
          <th scope="col">Tanggal Peminjaman</th>
          <th scope="col">Tanggal Pengembalian</th>
          <th scope="col">Status Peminjaman</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item => $pm)
          <tr>
            <th scope="row">{{$item + $data->firstItem()}}</th>
            <td>{{$pm->id_user}}</td>
            <td>{{$pm->id_buku}}</td>
            <td>{{$pm->tanggal_pinjam}}</td>
            <td>{{$pm->tanggal_kembali}}</td>
            <td><span
              class="{{ $pm->status === 'Sudah Dikembalikan' ? 'fw-semibold text-success' : 'fw-semibold text-danger'
              }}">
              {{ $pm->status }}
              </span></td>
            <td>
              <a class="btn btn-outline-primary" href="/admin/detailPeminjaman/{{$pm->id }}/{{ $pm->id_user }}/{{ $pm->id_buku}}">Detail</a>
              <a class="btn btn-outline-warning" href="/admin/editPeminjaman/{{ $pm->id }}">Edit</a>
              <a class="btn btn-outline-danger"
              href="/admin/deletePeminjaman/{{
              $pm->id }}">Delete</a>
              </td>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection