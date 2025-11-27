<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Panel Admin - Reisya Majalah')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>

@include('partials.header')

<main>
    <div class="admin-area" style="padding: 60px 0; background: var(--white); min-height: 80vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="admin-sidebar" style="background: var(--white); border-radius: var(--border-radius); box-shadow: var(--shadow-lg); padding: 30px; position: sticky; top: 100px;">
                        <h4 class="mb-4" style="color: var(--primary-color); font-weight: 700;"><i class="fas fa-tachometer-alt me-2"></i>Panel Admin</h4>
                        <ul class="list-unstyled admin-menu">
                            <li class="mb-2"><a href="{{ route('admin.dashboard') }}" class="admin-link"><i class="fas fa-home me-2"></i>Dashboard</a></li>
                            <li class="mb-2"><a href="{{ route('admin.articles') }}" class="admin-link"><i class="fas fa-newspaper me-2"></i>Artikel</a></li>
                            <li class="mb-2"><a href="{{ route('admin.categories') }}" class="admin-link"><i class="fas fa-tags me-2"></i>Kategori</a></li>
                            <li class="mb-2"><a href="{{ route('admin.users') }}" class="admin-link"><i class="fas fa-users me-2"></i>Pengguna</a></li>
                            <li class="mb-2"><a href="{{ route('admin.contacts') }}" class="admin-link"><i class="fas fa-envelope me-2"></i>Kontak</a></li>
                            <li class="mb-2"><a href="{{ route('home') }}" class="admin-link"><i class="fas fa-globe me-2"></i>Lihat Website</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="admin-content" style="background: var(--white); border-radius: var(--border-radius); box-shadow: var(--shadow-lg); padding: 40px;">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('partials.footer')

<!-- JS here -->
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>