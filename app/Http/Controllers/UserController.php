<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku;

class UserController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $data = [
            'judul' => 'home',
            'username' => Auth::user()->name,
            'data' => Buku::where(function($query) use ($search) {
                $query->where('judul_buku', 'LIKE', '%' . $search . '%');
            })
            ->paginate(5)
        ];
        return view('user.home', $data);
    }
}
