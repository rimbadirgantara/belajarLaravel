@extends('layouts.mainLayouts')
@section('container')
    <div class="container">
      <div class="row mt-3">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Edit Peminjaman</h5>
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
              <form action="/admin/postEditPeminjam/{{$data->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-lg">
                    <div class="mb-2">
                      <input type="text" class="form-control" name="idUser" placeholder="Nomor anggota" value="{{$data->id_user}}">
                        <span class="text-danger">
                          @error('idUser')
                            {{ $message }}
                          @enderror
                        </span>                        
                    </div>  
                    <div class="mb-2">
                      <input type="text" class="form-control" name="kodeBuku" placeholder="Kode Buku" value="{{$data->id_buku}}">
                      <span class="text-danger">
                        @error('kodeBuku')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>   
                    <div class="mb-2">
                      <label for="">Tanggal Peminjam</label>
                      <input type="date" class="form-control" name="tanggalPeminjaman" placeholder="Tanggal Peminjaman" value={{$data->tanggal_pinjam}}>
                      <span class="text-danger">
                        @error('tanggalPeminjaman')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>  
                    <div class="mb-2">
                      <label for="">Tanggal Pengembalian</label>
                      <input type="date" class="form-control" name="tanggalPengembalian" placeholder="Tanggal Pengembalian" value="{{$data->tanggal_kembali}}">
                      <span class="text-danger">
                        @error('tanggalPengembalian')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>
                    <div class="mb-2">
                      <input class="form-check-input" type="radio" name="status" value="Belum Dikembalikan" @if ($data->status == 'Belum Dikembalikan') checked @endif>
                      <label class="form-check-label" for="inlineRadio1">Belum Dikembalikan</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="status" value="Sudah Dikembalikan" @if ($data->status == 'Sudah Dikembalikan') checked @endif>
                    <label class="form-check-label" for="inlineRadio2">Sudah Dikembalikan</label>                       
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