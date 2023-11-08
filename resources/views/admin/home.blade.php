@extends('layouts.mainLayouts')
@section('container')
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

<div class="container">
  <div class="row">
    <div class="col-lg">
      <form action="/admin/searchAdmin" method="POST">
        <div class="input-group mb-3">
          @csrf
          <input type="text" class="form-control" placeholder="Search Some Admin">
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
    <div class="col-lg">
      <a href="{{route('admin.tambah')}}" class="btn btn-success mb-2">Tambah Admin</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $index => $userAdmin)
<tr>
<td>{{ $index + $data->firstItem() }}</td>
<td scope="row">{{ $userAdmin->name }}</td>
<td>{{ $userAdmin->email }}</td>
 <td>{{ $userAdmin->jenis_kelamin }}</td>
<td>{{ $userAdmin->level }}</td>
<td>
<a class="btn btn-outline-warning"
href="/admin/editAdmin/{{ $userAdmin->id }}">Edit</a>
<a class="btn btn-outline-danger"
href="/admin/deleteAdmin/{{ $userAdmin->id }}">Delete</a>
</td>
</tr>
@endforeach

        </tbody>
      </table>
      {{$data->links()}}
    </div>
  </div>
</div>
@endsection