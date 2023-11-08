<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{

    public function index() {
        $data = [
            'judul' => 'home'
        ];
        return view('home', $data);
    }
    public function beritaKsi() {
        $data = [
            'judul' => 'beritaksi'
        ];
        return view('mainpage.berita-ksi', $data);
    }

    public function profileKelulusan() {
        $data = [
            'judul' => 'profilekelulusan'
        ];
        return view('mainpage.profile-kelulusan', $data);
    }

    public function profileDosen() {
        $data = [
            'judul' => 'profileDosen'
        ];
        return view('mainpage.profile-dosen', $data);
    }
}
