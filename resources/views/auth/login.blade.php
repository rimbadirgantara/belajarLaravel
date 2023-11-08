<!-- all user pw: admin123456-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.mi
n.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.10.5/font/bootstrap-icons.css"
    />
    <title>Login</title>
  </head>
  <body>
    <div class="container">
      <a href="/">
        <i class="bi-arrow-left h1"></i>
      </a>
    </div>
    <div
      class="container d-flex justify-content-center align-itemscenter"
      style="margin-top: 60px"
    >
      <div class="card" style="width: 35%">
        <div class="card-body p-4">
          <h3 class="card-title text-center">Login</h3>
          <div class="container mt-3">
            @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Gagal!</strong> {{ Session::get('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arialabel="Close"></button>
            </div>
            @endif
             @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show"
            role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arialabel="Close"></button>
            </div>
            @endif
          </div>
          <form action="/postLogin" method="post">
            @csrf
            <div class="form-group mt-4">
              <label class="text-secondary">Email Anda</label>
              <input
                type="text" name="email"
                class="form-control border bordersecondary form-control-lg @error('email') is-invalid @enderror"
                autofocus required
              />
              @error('email')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
              <br />
            </div>
            <div class="form-group mt-1">
              <label class="text-secondary">Password Anda</label>
              <input
                type="password" name="password"
                class="form-control border border-secondary form-control-lg"
              />
            </div>
            <button type="submit" class="form-control btn btn-primary mt-5">
              Login
            </button>
          </form>
          <p class="mt-2 text-center">
            Belum punya akun?
            <a href="{{route('auth.register')}}" style="text-decoration: none">Ayo buat akun!</a>
          </p>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bund
le.min.js"></script>
  </body>
</html>
