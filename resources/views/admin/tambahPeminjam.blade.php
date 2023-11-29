@extends('layouts.mainLayouts')
@section('container')
    <div class="container">
      <div class="row mt-3">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Tambah Peminjaman</h5>
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
              <form action="/admin/tambahPeminjam" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-lg">
                    <div class="mb-2">
                      <input type="text" class="form-control" name="idUser" placeholder="Nomor anggota" value="{{old('idUser')}}">
                        <span class="text-danger">
                          @error('idUser')
                            {{ $message }}
                          @enderror
                        </span>                        
                    </div>  
                    <div class="mb-2">
                      <input type="text" class="form-control" name="kodeBuku" placeholder="Kode Buku" value="{{old('kodeBuku')}}">
                      <span class="text-danger">
                        @error('kodeBuku')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>   
                    <div class="mb-2">
                      <label for="">Tanggal Peminjam</label>
                      <input type="date" class="form-control" name="tanggalPeminjaman" placeholder="Tanggal Peminjaman" value={{old('tanggalPeminjaman')}}>
                      <span class="text-danger">
                        @error('tanggalPeminjaman')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>  
                    <div class="mb-2">
                      <label for="">Tanggal Pengembalian</label>
                      <input type="date" class="form-control" name="tanggalPengembalian" placeholder="Tanggal Pengembalian" value="{{old('tanggalPengembalian')}}">
                      <span class="text-danger">
                        @error('tanggalPengembalian')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>          
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
    </div>
@endsection