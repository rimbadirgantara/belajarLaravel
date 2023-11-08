@extends('layouts.mainLayouts')

@section('container')
<div class="container">
  <div class="row mt-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Form Tambah Admin</h5>
        <div class="container mt-3">
          @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{ Session::get('failed') }}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ Session::get('success') }}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
        </div>
        <form action="/admin/postEditAdmin/{{$data->id}}" method="post">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <input type="text" class="form-control" name="name" placeholder="Nama Admin" value="{{ $data->name }}">
              <span class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-6">
              <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $data->email }}">
              <span class="text-danger">
                @error('email')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-6">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="laki" value="Laki-laki" <?= ($data->jenis_kelamin == 'Laki-Laki') ? 'checked' : '' ?>>
                <label class="form-check-label" for="laki">
                  Laki-laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenisKelamin" id="perempuan" value="Perempuan" <?= ($data->jenis_kelamin == 'Perempuan') ? 'checked' : '' ?>>
                <label class="form-check-label" for="perempuan">
                  Perempuan
                </label>
              </div>
            </div>
            <div class="col-lg-6">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <span class="text-danger">
                @error('password')
                {{ $message }}
                @enderror
              </span>
            </div>
            <div class="col-lg-6">
              <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
              <span class="text-danger">
                @error('password_confirmation')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>
          <div class="col-lg-3 mt-3">
            <button class="btn btn-success">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
