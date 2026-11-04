
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - SIM Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: #f1f5f9;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 245px;
            min-height: 100vh;
            background: #12345a;
            position: fixed;
            color: white;
            padding: 25px 15px;
        }
        .sidebar a {
            display: block;
            color: #dbeafe;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            margin-top: 8px;
        }
        .sidebar a:hover {
            background: #2563eb;
            color: white;
        }
        .main {
            margin-left: 245px;
            padding: 30px;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000b;
        }
        @media(max-width:768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }
            .main {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4 class="mb-4">
        <i class="bi bi-envelope-paper"></i> SIM-Surat
    </h4>

    <small class="text-white-50">MENU UTAMA</small>

    <a href="{{ route('surat-masuk.index') }}">
        <i class="bi bi-inbox"></i> Surat Masuk
    </a>

    <a href="{{ route('surat-masuk.create') }}">
        <i class="bi bi-plus-circle"></i> Tambah Surat
    </a>
    
    <a href="{{ route('surat-keluar.index') }}">
    <i class="bi bi-send"></i> Surat Keluar
</a>

<a href="{{ route('surat-keluar.create') }}">
    <i class="bi bi-plus-circle"></i> Tambah Surat Keluar
</a>
</div>

<div class="main">
    <div class="d-flex justify-content-between mb-4">
        <div>
            <h4>@yield('heading')</h4>
            <small class="text-secondary">
                Sistem Informasi Manajemen Surat
            </small>
        </div>
        <span class="badge bg-primary p-2">
            <i class="bi bi-person-circle"></i> Administrator
        </span>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
