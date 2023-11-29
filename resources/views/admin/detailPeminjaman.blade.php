@extends('layouts.mainLayouts')
@section('container')
    <div class="container">
      <div class="row mt-3">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Edit Peminjaman</h5>
              <div class="text-center">
                <img class="rounded mt-5 mb-5" style="width:
                200px"
                src="{{ asset('images/' .
                $detailPeminjaman->gambar) }}" alt="cover buku">
                </div>
                <div class="row text-center">
                <div class="col"></div>
                <div class="col-12">
                <input class="form-control mb-3 textcenter" type="text"
                value="ID Peminjaman : {{
                $detailPeminjaman->id }}" disabled readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="Tanggal Peminjaman : {{
                $detailPeminjaman->tanggal_pinjam }}" disabled
                readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="Tanggal Pengembalian : {{
                $detailPeminjaman->tanggal_kembali }}" disabled
                readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="Status Pengembalian : {{
                $detailPeminjaman->status }}" disabled readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="ID Anggota : {{
                $detailPeminjaman->id_user }}" disabled readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="Nama Anggota : {{
                $detailPeminjaman->name }}" disabled readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="Email Anggota : {{
                $detailPeminjaman->email }}" disabled readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="ID Buku : {{
                $detailPeminjaman->id_buku }}" disabled readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="Kode Buku : {{
                $detailPeminjaman->kode_buku }}" disabled readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="Judul Buku : {{
                $detailPeminjaman->judul_buku }}" disabled readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="Penulis : {{
                $detailPeminjaman->penulis }}" disabled readonly>
                <input class="form-control mb-3 textcenter" type="text"
                value="Penerbit : {{
                $detailPeminjaman->penerbit }}" disabled readonly>
                <input class="form-control text-center"
                type="text"
                value="Tahun Terbit : {{
                $detailPeminjaman->tahun_terbit }}" disabled readonly>
                </div>
                <div class="col"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection