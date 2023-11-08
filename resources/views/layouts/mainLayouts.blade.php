<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav"> 
            @if (Auth::user()->level == 'user')
              <li class="nav-item"> 
                <a class="nav-link <?= ($judul === 'home' ? 'active' : '') ?>" href="{{route('user.home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($judul === 'beritaksi' ? 'active' : '') ?>" href="{{route('beritKsi')}}">Berita</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($judul === 'profilekelulusan' ? 'active' : '') ?>" href="{{route('profileKelulusan')}}">Profile Kelulusan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($judul === 'profileDosen' ? 'active' : '') ?>" href="{{route('profileDosen')}}">Profile Dosen</a>
              </li>
            @elseif (Auth::user()->level == 'admin')
            <li class="nav-item"> 
              <a class="nav-link <?= ($judul === 'home' ? 'active' : '') ?>" href="{{route('admin.home')}}">Home</a>
            </li>
              <li class="nav-item">
                <a class="nav-link <?= ($judul === 'formBerita' ? 'active' : '') ?>" href="{{route('admin.formBerita')}}">Input Berita</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($judul === 'formDosen' ? 'active' : '') ?>" href="{{route('admin.formDosen')}}">Input Dosen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($judul === 'buku' ? 'active' : '') ?>" href="{{route('admin.buku')}}">Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?= ($judul === 'peminjaman' ? 'active' : '') ?>" href="{{route('admin.peminjaman')}}">Peminjaman</a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    @yield('container')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>