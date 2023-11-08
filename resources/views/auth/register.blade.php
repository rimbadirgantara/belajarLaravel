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
    <title>Register</title>
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
          <h3 class="card-title text-center">Register</h3>
          <div class="container mt-3">
            @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Registrasi Gagal!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" arialabel="Close"></button>
            </div>
            @endif
            </div>
            
          <form action="/postRegister" method="post">
            @csrf
            <div class="form-group mt-4">
              <label class="text-secondary">Nama Anda</label>
              <input
                type="text" name="name"
                class="form-control border border-secondary form-control-lg" required value="{{old('name')}}"
              />
              <span class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
                </span>                
              <br />
            </div>
            <div class="form-group mt-1">
              <label class="text-secondary">Email Anda</label>
              <input
                type="email" name="email" required value="{{ old('email') }}"
                class="form-control border border-secondary form-control-lg"
              />
              <span class="text-danger">
                @error('email')
                {{ $message }}
                @enderror
                </span>
              <br />
              <div class="form-group mt-1">
                <label class="text-secondary">Pilih Jenis Kelamin</label><br />
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="jenisKelamin"
                    value="Laki-laki"
                  />
                  <label class="form-check-label" for="inlineRadio1"
                    >Laki-laki</label
                  >
                </div>
                <div class="form-check form-check-inline">
                  <input
                    class="form-check-input"
                    type="radio"
                    name="jenisKelamin"
                    value="Perempuan"
                  />
                  <label class="form-check-label" for="inlineRadio2"
                    >Perempuan</label
                  >
                </div>
              </div>
              <br />
            </div>
            <div class="form-group mt-1">
              <label class="text-secondary">Password Anda</label>
              <input
                type="password"
                class="form-control border border-secondary form-control-lg"
                name="password"
              />
            </div>
            <span class="text-danger">
              @error('password')
              {{ $message }}
              @enderror
              </span>
              
            <br />
            <div class="form-group mt-1">
              <label class="text-secondary">Konfirmasi Password Anda</label>
              <input
                type="password"
                class="form-control border border-secondary form-control-lg"
                name="password_confirmation"
                required
              />
              <span class="text-danger">
                @error('password_confirmation')
                {{ $message }}
                @enderror
                </span>                
            </div>
            <button type="submit" class="form-control btn btnprimary mt-5">
              Register
            </button>
          </form>
          <p class="mt-2 text-center">
            Sudah punya akun?
          <a href="{{route('auth.login')}}" style="text-decoration: none">Ayo masuk!</a>
          </p>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bund
le.min.js"></script>
  </body>
</html>
