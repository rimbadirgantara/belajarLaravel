<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminCOntroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainPageController::class, 'index'])->name('home');

// auth
Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');

// login n register
Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');
Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');

// logout
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

// middleware
Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/tambah-berita', [AdminController::class, 'formBerita'])->name('admin.formBerita');
    Route::post('/admin/postBerita', [AdminController::class, 'postBerita'])->name('admin.postBerita');

    Route::get('/admin/tambah-dosen', [AdminController::class, 'formDosen'])->name('admin.formDosen');
    Route::post('/admin/postDosen', [AdminController::class, 'postDosen'])->name('admin.postDosen');

    Route::get('/admin/tambah-admin', [AdminCOntroller::class, 'tambahAdmin'])->name('admin.tambah');
    Route::post('/admin/tambah-admin', [AdminCOntroller::class, 'tambahAdminPost']);
    Route::post('/admin/searchAdmin', [AdminCOntroller::class, 'searchSomeAdmin']);

    Route::get('/admin/editAdmin/{id}', [AdminCOntroller::class, 'editAdmin'])->name('admin.editAdmin');
    Route::post('/admin/postEditAdmin/', [AdminCOntroller::class, 'postEditAdmin'])->name('admin.editAdmin');
    Route::get('/admin/deleteAdmin/{id}', [AdminCOntroller::class, 'deleteAdmin'])->name('admin.deleteAdmin');

    Route::get('/admin/buku', [AdminController::class, 'buku'])->name('admin.buku');
    Route::get('/admin/tambahBuku', [AdminController::class, 'tambahBuku'])->name('admin.tambahBuku');
    Route::post('/admin/tambahBuku', [AdminController::class, 'postTambahData'])->name('admin.postTambahData');
    Route::get('/admin/hapusBuku/{id}', [AdminController::class, 'hapusBuku'])->name('admin.hapusBuku');
    Route::post('/admin/searchBuku', [AdminController::class, 'searchBuku'])->name('admin.searchBuku');
    Route::get('/admin/editBuku/{id}', [AdminController::class, 'editBuku'])->name('admin.editBuku');
    Route::post('/admin/postEditBuku/{id}', [AdminController::class, 'postEditBuku'])->name('admin.editBuku');

    Route::get('/admin/peminjaman', [AdminController::class, 'peminjaman'])->name('admin.peminjaman');
    Route::get('/admin/tambah-peminjaman', [AdminController::class, 'tambahPeminjaman'])->name('admin.tambahPeminjam');
    Route::post('/admin/tambahPeminjam', [AdminController::class, 'postTambahPeminjaman']);
    Route::get('/admin/deletePeminjaman/{id}', [AdminController::class, 'hapusPeminjam'])->name('admin.hapusPeminjam');
    Route::get('/admin/editPeminjaman/{id}', [AdminController::class, 'editPeminjam'])->name('admin.editPeminjam');
    Route::post('/admin/postEditPeminjam/{id}', [AdminController::class, 'postEditPeminjaman']);
    Route::get('/admin/detailPeminjaman/{id_peminjam}/{id_user}/{id_buku}', [AdminController::class, 'detailPeminjaman'])->name('admin.detailPeminjaman');
    Route::get('/admin/cetakPeminjam', [AdminController::class, 'cetakPeminjaman'])->name('admin.cetakPeminjam');

});
Route::group(['middleware' => ['auth', 'checklevel:user']], function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.home');
    Route::get('/berita-ksi', [MainPageController::class, 'beritaKsi'])->name('beritKsi');
    Route::get('/profile-kelulusan', [MainPageController::class, 'profileKelulusan'])->name('profileKelulusan');
    Route::get('/profile-dosen', [MainPageController::class, 'profileDosen'])->name('profileDosen');
});
