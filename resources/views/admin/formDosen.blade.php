@extends('layouts.mainLayouts')
@section('container')
    <div class="container">
      <div class="row mt-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Tambah Dosen</h5>
            <div class="container mt-3">
              @if (Session::get('failed'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{ Session::get('failed') }}</strong> 
              <button type="button" class="btn-close" data-bs-dismiss="alert" arialabel="Close"></button>
              </div>
              @endif
               @if (Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show"
              role="alert">
              <strong>{{ Session::get('success') }}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" arialabel="Close"></button>
              </div>
              @endif
            </div>
            <form action="/admin/postDosen" method="post">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <input type="text" class="form-control" name="nip" placeholder="NIP">
                </div>
                <div class="col-lg-6">
                  <input type="text" class="form-control" name="nama" placeholder="Nama">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-6">
                  <input type="text" class="form-control" name="nidn" placeholder="NIDN">
                </div>
                <div class="col-lg-6">
                  <input type="text" class="form-control" name="program_study" placeholder="Program Study">
                </div>
              </div>
              <div class="col-lg-3 mt-3">
                <button class="btn btn-success">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection