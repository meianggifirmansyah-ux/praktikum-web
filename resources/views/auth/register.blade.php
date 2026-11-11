
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registrasi - SIM-Surat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f1f5f9;
            font-family: Arial, sans-serif;
        }

        .register-card {
            max-width: 560px;
            margin: 40px auto;
            padding: 40px 45px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }

        .brand {
            color: #0d6efd;
            font-size: 36px;
            font-weight: bold;
            text-align: center;
        }

        .form-control {
            padding: 13px;
            border-radius: 10px;
        }

        .btn-primary {
            padding: 13px;
            border-radius: 10px;
            font-weight: bold;
        }

        @media(max-width:576px) {
            .register-card {
                margin: 15px;
                padding: 25px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="register-card">

        <div class="text-center mb-4">

            <div class="mb-3">
                <span style="font-size:55px;color:#0d6efd;">
                    ✉
                </span>
            </div>

            <div class="brand">SIM-SURAT</div>

            <p class="text-secondary">
                Sistem Informasi Manajemen Surat
            </p>

        </div>

        <h4 class="fw-bold">Buat Akun Baru</h4>

        <p class="text-secondary">
            Silakan lengkapi formulir pendaftaran berikut.
        </p>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.submit') }}"
              method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">
                    Nama Lengkap
                </label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name') }}"
                       placeholder="Masukkan nama lengkap"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email') }}"
                       placeholder="Masukkan email"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Minimal 8 karakter"
                       required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">
                    Konfirmasi Password
                </label>

                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       placeholder="Ulangi password"
                       required>
            </div>

            <div class="alert alert-info">
                <strong>Informasi Akun</strong>
                <br>
                Pendaftaran ini otomatis mendapatkan
                hak akses sebagai Pembaca.
            </div>

            <button type="submit"
                    class="btn btn-primary w-100">
                Daftar Sekarang
            </button>

        </form>

        <div class="text-center mt-4">

            <span class="text-secondary">
                Sudah memiliki akun?
            </span>

            <a href="{{ route('login') }}"
               class="text-primary text-decoration-none fw-bold">
                Login di sini
            </a>

        </div>

        <div class="text-center mt-4 text-secondary">
            <small>
                SIM-SURAT © 2026
                <br>
                Sistem Pengelolaan Arsip Surat
            </small>
        </div>

    </div>

</div>

</body>
</html>
