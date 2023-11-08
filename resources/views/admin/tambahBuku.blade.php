@extends('layouts.mainLayouts')
@section('container')
    <div class="container">
      <div class="row mt-3">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Form Tambah Buku</h5>
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
              <form action="/admin/tambahBuku" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-lg">
                    <div class="mb-2">
                      <input type="text" class="form-control" name="judulBuku" placeholder="Judul Buku">
                        <span class="text-danger">
                          @error('judulBuku')
                            {{ $message }}
                          @enderror
                        </span>                        
                    </div>  
                    <div class="mb-2">
                      <input type="text" class="form-control" name="penulis" placeholder="Penulis">
                      <span class="text-danger">
                        @error('penulis')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>   
                    <div class="mb-2">
                      <input type="text" class="form-control" name="kategori" placeholder="Kategori">
                      <span class="text-danger">
                        @error('kategori')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>  
                    <div class="form-floating mb-2">
                      <textarea class="form-control" placeholder="Leave a comment here" name="deskripsi"></textarea>
                      <label for="floatingTextarea">Deskripsi</label>
                      <span class="text-danger">
                        @error('deskripsi')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>
                    <div class="mb-2">
                      <input type="text" class="form-control" name="penerbit" placeholder="Penerbit">
                      <span class="text-danger">
                        @error('penerbit')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>
                    <div class="mb-2">
                      <input type="date" class="form-control" name="tahunTerbit" placeholder="Tahun Terbit">
                      <span class="text-danger">
                        @error('tahunTerbit')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>   
                    <div class="mb-2">
                      <input type="text" class="form-control" name="kodeBuku" placeholder="Kode Buku">
                      <span class="text-danger">
                        @error('kodeBuku')
                          {{ $message }}
                        @enderror
                      </span>  
                    </div>   
                    <div class="input-group mb-2">
                      <input type="file" class="form-control" id="inputGroupFile02" name="gambar">
                      <label class="input-group-text" for="inputGroupFile02">Gambar</label>
                      <span class="text-danger">
                        @error('gambar')
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