
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login SIM-Surat</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f3f6fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        }

        .login-icon {
            width: 65px;
            height: 65px;
            background: #e7f0ff;
            color: #0d6efd;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin: 0 auto 15px;
        }

        .form-control {
            padding: 11px;
            border-radius: 8px;
        }

        .btn-login {
            padding: 11px;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container px-3">

        <div class="card login-card mx-auto">

            <div class="card-body p-4 p-md-5">

                <!-- Logo dan Judul -->
                <div class="text-center mb-4">

                    <div class="login-icon">
                        <i class="bi bi-envelope-paper"></i>
                    </div>

                    <h3 class="fw-bold text-primary">
                        SIM-SURAT
                    </h3>

                    <p class="text-secondary mb-0">
                        Sistem Informasi Manajemen Surat
                    </p>

                </div>

                <!-- Informasi Login -->
                <h5 class="fw-bold mb-1">
                    Selamat Datang!
                </h5>

                <p class="text-secondary small mb-4">
                    Silakan masuk menggunakan akun Anda.
                </p>

                <!-- Pesan Error -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- Form Login -->
                <form method="POST" action="{{ route('login.submit') }}">

                    @csrf

                    <!-- Email -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Masukkan email Anda"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        >

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <!-- Password -->
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password Anda"
                            required
                        >

                    </div>

                    <!-- Tombol Masuk -->
                    <button type="submit"
                            class="btn btn-primary btn-login w-100">

                        Masuk

                    </button>

                </form>

                <div class="text-center mt-4">

    <span class="text-secondary">
        Belum memiliki akun?
    </span>

    <a href="{{ route('register') }}"
       class="text-primary text-decoration-none fw-bold">
        Daftar Sekarang
    </a>

</div>

                <!-- Footer -->
                <div class="text-center mt-4">

                    <small class="text-secondary">
                        SIM-SURAT &copy; 2026
                    </small>

                    <br>

                    <small class="text-secondary">
                        Sistem Pengelolaan Arsip Surat
                    </small>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</body>
</html>
