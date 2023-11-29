<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Berita;
use App\Models\Dosen;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;


class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'judul' => 'home',
            'data' => User::where('level', 'admin')->paginate(5)
        ];
        return view('admin.home', $data);
    }

    public function searchSomeAdmin(Request $request) {
        $search = $request->input('search');

        $data = [
            'judul' => 'home',
            'data' => User::where('level', 'admin')
            ->where(function($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->paginate(5)
        ];
        return view('admin.home', $data);
    }

    public function tambahAdmin() {
        $data = [
            'judul' => 'home'
        ];
        return view('admin.tambah', $data);
    }

    public function tambahAdminPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'jenisKelamin' => 'required', 
            'password' => 'required|min:8|max:20|confirmed'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = 'admin';
        $user->jenis_kelamin = $request->jenisKelamin;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return back()->with('success', 'Admin Berhasil Ditambahkan');
        } else {
            return back()->with('failed', 'Admin Gagal Ditambahkan');
        }
    }

    public function editAdmin($id){
        $data = [
            'judul' => 'home', 
            'data' => User::find($id)
        ]; 
        return view('admin.edit', $data);
    }

    public function postEditAdmin(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'jenisKelamin' => 'required', 
            'password' => 'required|min:8|max:20|confirmed'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = 'admin';
        $user->jenis_kelamin = $request->jenisKelamin;
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return back()->with('success', 'Admin Berhasil Di Update');
        } else {
            return back()->with('failed', 'Admin Gagal Di Update');
        }
    }

    public function deleteAdmin($id) {
        $data = User::find($id);
        if ($data->delete()) {
            return back()->with('success', 'Admin Berhasil Di Hapus');
        } else {
            return back()->with('failed', 'Admin Gagal Di Hapus');
        }
    }

    public function formBerita()
    {
        $data = [
            'judul' => 'formBerita',
            'username' => 'admin'
        ];

        return view('admin.formBerita', $data);
    }

    public function postBerita(Request $request)
    {
        if ($request->validate(
            [
                'judul' => 'required',
                'isi' => 'required',
            ]
        )) {
            $berita = new Berita;
            $berita->judul = $request->judul;
            $berita->isi = $request->isi;
            $berita->foto = "https://thumb.tvonenews.com/thumbnail/2023/10/03/651bc01549984-kejagung-geledah-kantor-kemendag-terkait-dugaan-kasus-korupsi-impor-gula-periode-2021-2023_375_211.jpg";

            if ($berita->save()) {
                return redirect('/admin/tambah-berita')->with('success', 'Berita Berhasil Dibuat');
            } else {
                return back()->with('failed', 'Maaf, Terjadi Kesalahan, Coba Kembali');
            }
        }
    }

    public function formDosen()
    {
        $data = [
            'judul' => 'formDosen',
            'username' => 'admin'
        ];

        return view('admin.formDosen', $data);
    }

    public function postDosen(Request $request)
    {
        if ($request->validate(
            [
                'nip' => 'required|numeric',
                'nama' => 'required',
                'nidn' => 'required|numeric',
                'program_study' => 'required',
                ]
                )) {
            $dosen = new Dosen;
            $dosen->nip = $request->nip;
            $dosen->nama = $request->nama;
            $dosen->nidn = $request->nidn;
            $dosen->program_study = $request->program_study;

            if ($dosen->save()) {
                return redirect('/admin/tambah-dosen')->with('success', 'Dosen Berhasil Dibuat');
            } else {
                return back()->with('failed', 'Maaf, Terjadi Kesalahan, Coba Kembali');
            }
        }
    }

    public function buku() {
        $data = [
            'judul' => 'buku',
            'data' => Buku::select("*")->paginate(5)
        ];
        return view('admin.buku', $data);
    }

    public function searchBuku(Request $request) {
        $search = $request->input('search');

        $data = [
            'judul' => 'buku',
            'data' => Buku::where(function($query) use ($search) {
                $query->where('judul_buku', 'LIKE', '%' . $search . '%');
            })
            ->paginate(5)
        ];

        return view('admin.buku', $data);
    }
    
    public function hapusBuku($id) {
        $data = Buku::find($id);
        if ($data->delete()) {
            return back()->with('success', 'Buku Berhasil Di Hapus');
        } else {
            return back()->with('failed', 'Buku Gagal Di Hapus');
        }
    }

    public function tambahBuku() {
        $data = [
            'judul' => 'buku'
        ];
        return view('admin.tambahBuku', $data);
    }

    public function postTambahData(Request $request) {
        $request->validate([
            'kodeBuku' => 'required',
            'judulBuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required|date',
            'gambar' => 'required|image|max:5120',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);
        $buku = new Buku;
        $buku->kode_buku = $request->kodeBuku;
        $buku->judul_buku = $request->judulBuku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahunTerbit;
        $buku->deskripsi = $request-> deskripsi;
        $buku->kategori = $request-> kategori;

        if($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
            $buku->gambar = $filename;
        }   
        if($buku->save()) {
            return back()->with('success', 'Buku baru berhasil ditambahkan!');
        } else{
            return back()->with('failed', 'Data gagal ditambahkan!');
        }
    }

    public function editBuku(Request $request, $id) {
        $data = [
            'judul' => 'buku', 
            'data' => Buku::find($id)
        ]; 
        return view('admin.editBuku', $data);
    }

    public function postEditBuku(Request $request, $id) {
        $request->validate([
            'kodeBuku' => 'required',
            'judulBuku' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunTerbit' => 'required|date',
            'gambar' => 'image|max:5120',
            'deskripsi' => 'required',
            'kategori' => 'required',
        ]);
        $buku = Buku::find($id);
        $buku->kode_buku = $request->kodeBuku;
        $buku->judul_buku = $request->judulBuku;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahunTerbit;
        $buku->deskripsi = $request-> deskripsi;
        $buku->kategori = $request-> kategori;

        if($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('images/', $filename);
            $buku->gambar = $filename;
        }   
        if($buku->save()) {
            return back()->with('success', 'Buku baru berhasil di update!');
        } else{
            return back()->with('failed', 'Data gagal di update!');
        }
    }

    public function peminjaman() {
        $data = [
            'judul' => 'peminjaman',
            'data' => Peminjaman::select("*")->paginate(5)
        ];
        return view('admin.peminjaman', $data); 
    }

    public function tambahPeminjaman() {
        $data = [
            'judul' => 'Peminjaman',
        ];
        return view('admin.tambahPeminjam', $data);
    }

    public function postTambahPeminjaman(Request $request) {
        $request->validate([
            'idUser' => 'required',
            'kodeBuku' => 'required',
            'tanggalPeminjaman' => 'required',
            'tanggalPengembalian' => 'required',
        ]);

        $pm = new Peminjaman;
        $pm->id_user = $request->idUser;
        $pm->id_buku = $request->kodeBuku;
        $pm->tanggal_pinjam = $request->tanggalPeminjaman;
        $pm->tanggal_kembali = $request->tanggalPengembalian;
        $pm->status = 'Belum Dikembalikan';
        if($pm->save()) {
            return back()->with('success', 'Peminjam baru berhasil ditambahkan!');
        } else{
            return back()->with('failed', 'Peminjam gagal ditambahkan!');
        }
    }

    public function hapusPeminjam($id) {
        $data = Peminjaman::find($id);
        if ($data->delete()) {
            return back()->with('success', 'Peminjam Berhasil Di Hapus');
        } else {
            return back()->with('failed', 'Peminjam Gagal Di Hapus');
        }
    }

    public function editPeminjam($id) {
        $data = [
            'judul' => 'peminjaman',
            'data' => Peminjaman::find($id)
        ];
        return view('admin.editPeminjam', $data);
    }

    public function postEditPeminjaman(Request $request, $id) {
        $request->validate([
            'idUser' => 'required',
            'kodeBuku' => 'required',
            'tanggalPeminjaman' => 'required',
            'tanggalPengembalian' => 'required',
        ]);

        $pm = Peminjaman::find($id);
        $pm->id_user = $request->idUser;
        $pm->id_buku = $request->kodeBuku;
        $pm->tanggal_pinjam = $request->tanggalPeminjaman;
        $pm->tanggal_kembali = $request->tanggalPengembalian;
        $pm->status = $request->status;
        if($pm->save()) {
            return back()->with('success', 'Peminjam baru berhasil ditambahkan!');
        } else{
            return back()->with('failed', 'Peminjam gagal ditambahkan!');
        }
    }

    public function detailPeminjaman($id_peminjaman, $id_user, $id_buku) {
        $data = [
            'judul' => 'peminjaman',
            'detailPeminjaman' => Peminjaman::select('peminjaman.*', 'buku.*', 'users.*')
                                    ->join('buku','peminjaman.id_buku', '=', 'buku.id')
                                    ->join('users', 'peminjaman.id_user', '=', 'users.id')
                                    ->where('peminjaman.id', $id_peminjaman)
                                    ->where('buku.id', $id_buku)
                                    ->where('users.id', $id_user)->first()
        ];
        if (!$data['detailPeminjaman']) {
            abort(404, 'Data tidak ditemukan !');
        }
        return view('admin.detailPeminjaman', $data); 
    }
}