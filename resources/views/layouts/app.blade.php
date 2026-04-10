<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pengaduan Sarana Sekolah')</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @stack('styles')
    <style>
        body {
            background: #e9f0fb;
            color: #1a263b;
            min-height: 100vh;
        }
        .app-shell {
            min-height: calc(100vh - 70px);
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .custom-card {
            border: none;
            border-radius: 1.3rem;
            box-shadow: 0 24px 60px rgba(38,69,121,0.12);
            overflow: hidden;
        }
        .page-card-header {
            background: #1f62d0;
            color: #ffffff;
            padding: 1.25rem 1.5rem;
            font-weight: 700;
            letter-spacing: 0.01em;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }
        .btn-primary {
            background-color: #1f62d0;
            border-color: #1f62d0;
        }
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #174cb2;
            border-color: #174cb2;
        }
        .form-control,
        .form-select,
        textarea {
            border-radius: 0.85rem;
            border: 1px solid #ced4da;
            padding: 1rem 0.95rem;
        }
        .form-control:focus,
        .form-select:focus,
        textarea:focus {
            border-color: #1f62d0;
            box-shadow: 0 0 0 0.15rem rgba(31,98,208,0.18);
        }
        .card-login {
            max-width: 420px;
            margin: auto;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 26px 70px rgba(38,69,121,0.18);
        }
        .login-header {
            background: #1f62d0;
            color: #ffffff;
            padding: 2.25rem 1.75rem;
            text-align: center;
        }
        .login-header h4 {
            font-size: 1.45rem;
            margin-bottom: 0.5rem;
        }
        .login-header p {
            margin-bottom: 0;
            color: rgba(255,255,255,0.85);
        }
        .sidebar-panel {
            background: #1f62d0;
            border-radius: 1.5rem;
            color: #ffffff;
            min-height: 100%;
            padding: 1.75rem 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .sidebar-panel .list-group-item {
            background: transparent;
            color: #ffffff;
            border: none;
            padding: 0.85rem 0;
            font-weight: 500;
        }
        .sidebar-panel .list-group-item:hover,
        .sidebar-panel .list-group-item.active {
            background: rgba(255,255,255,0.12);
            color: #ffffff;
        }
        .sidebar-brand-icon {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: rgba(255,255,255,0.18);
            margin-right: 0.75rem;
        }
        .badge-status-pending {
            background: #0d6efd;
        }
        .badge-status-proses {
            background: #ffc107;
            color: #1d2124;
        }
        .badge-status-selesai {
            background: #198754;
        }
        .table thead th {
            background: rgba(31,98,208,0.08);
            border-bottom: none;
        }
        .table tbody tr {
            background: #ffffff;
        }
        .table-responsive {
            border-radius: 1rem;
            overflow-x: auto;
        }
        .table-responsive table {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    @if(!request()->is('login'))
        @include('partials.navbar')
    @endif

    <main class="app-shell">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>
</html>