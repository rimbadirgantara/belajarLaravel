<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $data = [
            'judul' => 'home',
            'username' => Auth::user()->name
        ];
        return view('user.home', $data);
    }
}
